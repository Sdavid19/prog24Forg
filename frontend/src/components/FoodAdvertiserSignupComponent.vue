<template>
  <form class="p-5 shadow">
    <h2 class="text-center my-5">Adjon meg még pár adatot:</h2>
    <div class="spec">
      <fieldset class="mb-3">
        <legend>Konyha jellege:</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference1"
              value="1"
              v-model="registData.olaszKonyha"
            />
            <label class="form-check-label" for="cuisinePreference1">Olasz</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference2"
              value="2"
              v-model="registData.gorogKonyha"
            />
            <label class="form-check-label" for="cuisinePreference2">Görög</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference3"
              value="3"
              v-model="registData.amerikaiKonyha"
            />
            <label class="form-check-label" for="cuisinePreference3">Amerikai</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference4"
              value="4"
              v-model="registData.mexikoiKonyha"
            />
            <label class="form-check-label" for="cuisinePreference4">Mexikói</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference5"
              value="5"
              v-model="registData.magyarKonyha"
            />
            <label class="form-check-label" for="cuisinePreference5">Magyar</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference6"
              value="6"
              v-model="registData.japaKonyha"
            />
            <label class="form-check-label" for="cuisinePreference6">Japán</label>
          </div>
        </div>
      </fieldset>
      <div class="mb-3">
        <label for="instType" class="form-label main">Létesítmény fajtája</label>
        <input type="text" class="form-control" id="instType" />
      </div>
    </div>
    <div class="btn-container">
      <button type="button" class="btn btn-primary" @click="tryRegistrate()">
        Regisztráció
      </button>
    </div>
  </form>
</template>

<script setup>
import { ref } from "vue";
import Axios from "../stores/dataService";
let error = ref(false);

const props = defineProps(["data"]);
// console.log(props.data);

const moreData = ref({
  diabetes: 0,
  allergies: [],
  foodIntolerance: [],
  cuisinePreference: [],
  diet: [],
});

let registData = ref({
  name: props.data.name,
  email: props.data.email,
  password: props.data.password,
  diabetes: 0,
  longitude: 0,
  latitude: 0,

  letesitmenyFajta: "",
  olaszKonyha: false,
  gorogKonyha: false,
  amerikaiKonyha: false,
  mexikoiKonyha: false,
  magyarKonyha: false,
  japaKonyha: false,
});

function tryRegistrate() {
  if (props.data.name != "" && props.data.email != "" && props.data.password != "") {
    console.log(registData);
    //POST
    Axios.post("/advertiser-signup", registData)
      .then(() => {
        error.value = false;
        console.log("ok");
      })
      .catch(() => {
        error.value = true;
        console.log("hiba :c");
      });
  } else {
    error.value = true;
    console.log("Üres :c");
  }
  console.log(registData);
}
</script>

<style lang="css" scoped>
.btn-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
}
.grid {
  display: grid;
  grid-template-columns: repeat(3, 100px);
}
fieldset {
  padding: 10px 30px !important;
  border: 2px solid rgba(0, 0, 0, 0.1) !important;
  border-radius: 5px;
}
.main,
legend {
  font-size: 20px;
}
.spec {
  display: grid;
  place-content: center;
}

@media only screen and (max-width: 1000px) {
  .grid {
    grid-template-columns: 100px;
  }
}
</style>
