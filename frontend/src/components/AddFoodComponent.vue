<template>
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="addFoodModal">Új étel felajánlása</h1>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
      ></button>
    </div>
    <div class="modal-body">
      <div class="mb-3">
        <input
          type="text"
          class="form-control"
          id="name"
          placeholder="Étel neve"
          v-model="foodData.name"
        />
      </div>
      <div class="mb-3">
        <select class="form-select" v-model="foodData.type">
          <option value="0" disabled>Válassz típust</option>
          <option value="1">Melegítendő</option>
          <option value="2">Hideg</option>
          <option value="3">Rövidlejáratú</option>
          <option value="4">Pékáru</option>
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
              v-model="foodData.mogyoroAllergia"
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
              v-model="foodData.halAllergia"
            />
            <label class="form-check-label" for="allergie2">Hal</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie3"
              name="szoja"
              value="3"
              v-model="foodData.szojaAllergia"
            />
            <label class="form-check-label" for="allergie3">Szója</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie4"
              name="tojas"
              value="4"
              v-model="foodData.tojasAllergia"
            />
            <label class="form-check-label" for="allergie4">Tojás</label>
          </div>
        </div>
      </fieldset>
      <div class="mb-3">
        <input
          type="date"
          title="Lejárati dátum"
          class="form-control"
          v-model="foodData.expirationDate"
        />
      </div>
      <div class="mb-3">
        <select
          class="form-select"
          aria-label="Default select example"
          v-model="foodData.consumption"
        >
          <option value="2" disabled>Válassz fogyasztsi módot</option>
          <option value="1">helyben fogyasztható</option>
          <option value="0">elvitelre</option>
        </select>
      </div>
      <div class="mb-3">
        <select
          class="form-select"
          aria-label="Default select example"
          v-model="foodData.cousine"
        >
          <option value="0" disabled>Válassz konyha típust</option>
          <option value="Mexikói">Mexikói</option>
          <option value="Magyar">Magyar</option>
          <option value="Olasz">Olasz</option>
          <option value="Japán">Japán</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Mégse</button>
      <button type="button" class="btn btn-primary" @click="tryAdddingFood()">
        Felajánlás
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Axios from "../stores/dataService";
let error = ref(false);

const foodData = ref({
  name: "",
  type: 0,
  mogyoroAllergia: false,
  halAllergia: false,
  tojasAllergia: false,
  szojaAllergia: false,
  expirationDate: "",
  consumption: 0,
  cousine: 0,
});

function tryAdddingFood() {
  if (
    foodData.value.name &&
    foodData.value.expirationDate &&
    foodData.value.consumption != 2 &&
    foodData.value.cousine
  ) {
    console.log(foodData.value);
    //POST
    Axios.post("/create-food", foodData.value)
      .then(() => {
        error.value = false;
        console.log("ok");
      })
      .catch(() => {
        error.value = true;
        console.log("hiba");
      });
  } else {
    error.value = true;
    alert("Tölts ki minden mezőt az étel felajánlásához!");
  }
}
</script>

<style lang="css" scoped>
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
</style>
