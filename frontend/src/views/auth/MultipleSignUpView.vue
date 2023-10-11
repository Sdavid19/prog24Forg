<template>
  <h2 class="my-5">Felhasználó felvitel fájlból</h2>
  <div class="my-5">
    <label for="formFile" class="form-label">Válasszon ki egy fájlt</label>
    <input
      class="form-control"
      type="file"
      id="formFile"
      @change="readFile"
      accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
    />
  </div>
  <p class="text-danger" v-if="error">Hiba a fájl beolvasása közben!</p>
  <div v-if="foodsavers.length && !error">
    <h2 class="my-3">Előnézet:</h2>
    <table class="table main">
      <thead>
        <tr>
          <th scope="col">Név</th>
          <th scope="col">Születési hely</th>
          <th scope="col">Születési idő</th>
          <th scope="col">Cukorbetegség</th>
          <th scope="col">Allergia</th>
          <th scope="col">Intolerancia</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="foodSaver in foodsavers">
          <td>{{ foodSaver.name }}</td>
          <td>{{ foodSaver.birthPlace }}</td>
          <td>{{ foodSaver.birthDate }}</td>
          <td>{{ foodSaver.diabetes }}</td>
          <td>
            <span v-for="allergy in foodSaver.allergies">{{ allergy }}&nbsp;</span>
          </td>
          <td>
            <span v-for="intolarence in foodSaver.intolarences"
              >{{ intolarence }}&nbsp;</span
            >
          </td>
        </tr>
      </tbody>
    </table>

    <div class="buttons my-5">
      <button class="btn btn-primary me-4" @click="trySendData()">Küldés</button>
      <button
        class="btn btn-warning me-4 ms-4"
        data-bs-toggle="modal"
        data-bs-target="#legend"
      >
        Jelmagyarázat
      </button>
      <button class="btn btn-danger ms-4" @click="resetFileValue()">Törlés</button>
    </div>
  </div>

  <div
    class="modal fade"
    id="legend"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Jelmagyarázat</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <table class="table modal-table">
            <tr>
              <th>Cukorbetegség</th>
              <th>Allergia</th>
              <th>Intolerancia</th>
            </tr>
            <tr>
              <td>0: Nincs</td>
              <td>1: Mogyoró</td>
              <td>1: Laktóz</td>
            </tr>
            <tr>
              <td>1: 1. típusú</td>
              <td>2: Hal</td>
              <td>2: Glutén</td>
            </tr>
            <tr>
              <td>2: 2. típusú</td>
              <td>3: Szója</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>4: Tojás</td>
              <td></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Bezárás
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

let foodSaverData = ref({
  name: "",
  birthPlace: "",
  birthDate: "",
  diabetes: 0,
  allergies: [],
  intolarences: [],
});

let foodsavers = ref([]);
let error = ref(false);

//Fájlbeolvasás
function readFile(e) {
  let file = e.target.files[0];
  const reader = new FileReader();
  reader.readAsText(file);
  reader.onload = () => {
    const csvContent = reader.result;
    formatCsv(csvContent);
  };
  reset();
}

//Csv fájl mentése JSON formátumba
function formatCsv(content) {
  let rows = content.split(/\r?\n/);

  rows.splice(0, 2);

  rows.forEach((foodSaver) => {
    if (foodSaver) {
      let data = foodSaver.split(";");
      let dataName = data[0];
      let dataPlace = data[1];
      let dataDate = data[2];
      let dataDiabetes = data[3];
      let dataAllergies = [];
      for (let index = 4; index <= 7; index++) {
        dataAllergies.push(data[index]);
      }
      let dataIntolerances = [data[8], data[9]];
      if (dataName && dataPlace && dataDate) {
        foodSaverData.value = {
          name: dataName,
          birthPlace: dataPlace,
          birthDate: dataDate,
          diabetes: Number(dataDiabetes),
          allergies: format(dataAllergies),
          intolarences: format(dataIntolerances),
        };
      } else {
        error.value = true;
      }
      foodsavers.value.push(foodSaverData.value);
    }
  });
}

//Intolerancia és Allergia megformázása
function format(array) {
  array = array.filter((str) => str != "");

  for (let index = 0; index < array.length; index++) {
    if (array[index] === "X") {
      array[index] = index + 1;
    }
  }
  return array;
}

function resetFileValue() {
  document.getElementById("formFile").value = "";
  reset();
}

function reset() {
  foodsavers.value = [];
  error.value = false;
}

function trySendData() {
  if (foodsavers.value != 0) {
    console.log(foodsavers);
  } else {
    alert("Hiba! Az adatokat nem sikerült beolvasni és elküldeni!");
  }
}
</script>

<style lang="css" scoped>
table {
  text-align: center;
}
.buttons {
  display: flex;
  justify-content: center;
}
.btn {
  font-size: 20px;
}
</style>
