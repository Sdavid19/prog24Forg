<template>
  <form class="p-5 shadow">
    <h1 class="my-5 text-center">Adjon meg még pár adatot:</h1>
    <div class="spec">
      <div class="mb-3">
        <label for="companyName" class="form-label main">Cukorbetegség</label>
        <select class="form-select" aria-label="Default select example" id="diabetes">
          <option value="0" selected>Nem vagyok cukorbeteg</option>
          <option value="1">1-es típusú</option>
          <option value="2">2-es típusú</option>
        </select>
      </div>
      <fieldset class="mb-3">
        <legend>Étel allergia:</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie1"
              name="mogyoro"
              value="1"
              v-model="moreData.allergies"
            />
            <label class="form-check-label" for="allergie1">Mogyoró</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie2"
              name="hal"
              value="2"
              v-model="moreData.allergies"
            />
            <label class="form-check-label" for="allergie2">Hal</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie3"
              name="tojas"
              value="3"
              v-model="moreData.allergies"
            />
            <label class="form-check-label" for="allergie3">Tojás</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="mb-3">
        <legend>Étel</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="1"
              v-model="moreData.foodIntolerance"
            />
            <label class="form-check-label" for="defaultCheck1">Laktóz</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="2"
              v-model="moreData.foodIntolerance"
            />
            <label class="form-check-label" for="defaultCheck2">Glutén</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="mb-3">
        <legend>Preferált konyha:</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference1"
              value="1"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference1">Olasz</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference2"
              value="2"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference2">Görög</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference3"
              value="3"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference3">Amerikai</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference4"
              value="4"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference4">Mexikói</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference5"
              value="5"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference5">Magyar</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="cuisinePreference6"
              value="6"
              v-model="moreData.cuisinePreference"
            />
            <label class="form-check-label" for="cuisinePreference6">Japán</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="mb-3">
        <legend>Étrend:</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="diet1"
              value="1"
              v-model="moreData.diet"
            />
            <label class="form-check-label" for="diet1">Szimpla</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="diet2"
              value="2"
              v-model="moreData.diet"
            />
            <label class="form-check-label" for="diet2">Vegán</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="diet3"
              value="3"
              v-model="moreData.diet"
            />
            <label class="form-check-label" for="diet3">Vegetáriánus</label>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="btn-container">
      <button type="button" class="btn btn-primary" @click="tryRegistrate()">
        Tovább
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

function tryRegistrate() {
  let registData = Object.assign(props.data, moreData.value);
  if (
    registData.name != "" &&
    registData.email != "" &&
    registData.password != "" &&
    registData.geolocation != "" &&
    registData.diabetes !== "" &&
    registData.allergies != "" &&
    registData.intolerances != "" &&
    registData.cuisinePreference != "" &&
    registData.diet != ""
  ) {
    //POST
    Axios.post("/user-signup", registData.value)
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
@media only screen and (max-width: 1000px) {
  .grid {
    grid-template-columns: 100px;
  }
}
</style>
