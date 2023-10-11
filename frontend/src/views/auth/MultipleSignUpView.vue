<template>
  <h2 class="my-5">Ételmentő felvitel fájlból</h2>
  <div class="my-5">
    <label for="formFile" class="form-label">Válasszon ki egy fájlt</label>
    <input
      class="form-control"
      type="file"
      id="formFile"
      accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
      @change="readFile"
    />
  </div>
  <p class="text-danger" v-if="error">Hiba a fájl beolvasása közben!</p>
  <div class="d-flex justify-content-center">
    <div
      class="spinner-border text-center"
      style="width: 5rem; height: 5rem"
      role="status"
      v-if="loading"
    ></div>
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-if="foodsavers.length && !error && !loading">
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
          <td>{{ foodSaver.nev }}</td>
          <td>{{ foodSaver.szuletesiHely }}</td>
          <td>{{ foodSaver.szuletesiDatum }}</td>
          <td>{{ foodSaver.diabetesz ? foodSaver.diabetesz : 0 }}</td>
          <td>
            <span>{{ foodSaver.mogyoroAllergia ? "Mogyoro" : "" }}&nbsp;</span>
            <span>{{ foodSaver.halAllergia ? "Hal" : "" }}&nbsp;</span>
            <span>{{ foodSaver.szojaAllergia ? "Szója" : "" }}&nbsp;</span>
            <span>{{ foodSaver.tojasAllergia ? "Tojás" : "" }}&nbsp;</span>
          </td>
          <td>
            <span>{{ foodSaver.laktozErzekenyseg ? "Laktóz" : "" }}&nbsp;</span>
            <span>{{ foodSaver.glutenErzekeny ? "Glutén" : "" }}&nbsp;</span>
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
import Axios from "../../stores/dataService";

let foodSaverData = ref({
  nev: "",
  emailCim: "",
  longitude: 0,
  latitude: 0,
  szuletesiDatum: "",
  szuletesiHely: "",
  diabetesz: 0,
  mogyoroAllergia: false,
  halAllergia: false,
  tojasAllergia: false,
  laktozErzekenyseg: false,
  glutenErzekeny: false,
  olaszKonyha: false,
  gorogKonyha: false,
  amerikaiKonyha: false,
  mexikoiKonyha: false,
  magyarKonyha: false,
  japaKonyha: false,
  szimplaEtrend: false,
  vegetarianusEtrend: false,
  veganEtrend: false,
});

let foodsavers = ref([]);
let error = ref(false);
let loading = false;

//Fájlbeolvasás
async function readFile(e) {
  loading = true;
  let file = e.target.files[0];
  const reader = new FileReader();
  reader.readAsText(file);
  reader.onload = async () => {
    const csvContent = reader.result;
    await formatCsv(csvContent);
  };
  reset();
}

//Csv fájl mentése JSON formátumba
async function formatCsv(content) {
  let rows = content.split(/\r?\n/);
  let header = rows[0].split(";");
  console.log();
  if (
    header.includes("Név") &&
    header.includes("Születési idő") &&
    header.includes("Születési hely")
  ) {
    rows.splice(0, 2);
    for (const foodSaver of rows) {
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
        // let geolocation = await getLocation(dataPlace);
        let dataIntolerances = [data[8], data[9]];
        if (dataName && dataPlace && dataDate) {
          foodSaverData.value = {
            nev: dataName,
            emailCim: "",
            jelszo: "",
            // longitude: geolocation.longitude,
            // latitude: geolocation.latitude,
            longitude: 0,
            latitude: 0,
            szuletesiDatum: dataDate,
            szuletesiHely: dataPlace,
            diabetesz: Number(dataDiabetes),
            mogyoroAllergia: dataAllergies[0] === "X",
            halAllergia: dataAllergies[1] === "X",
            szojaAllergia: dataAllergies[2] === "X",
            tojasAllergia: dataAllergies[3] === "X",
            laktozErzekenyseg: dataIntolerances[0] === "X",
            glutenErzekeny: dataIntolerances[1] === "X",
            olaszKonyha: false,
            gorogKonyha: false,
            amerikaiKonyha: false,
            mexikoiKonyha: false,
            magyarKonyha: false,
            japaKonyha: false,
            szimplaEtrend: false,
            vegetarianusEtrend: false,
            veganEtrend: false,
          };
        } else {
          error.value = true;
        }
        foodsavers.value.push(foodSaverData.value);
      }
    }
  } else {
    error.value = true;
  }
  loading = false;
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

async function getLocation(city) {
  let headersList = {
    Accept: "*/*",
    "X-Api-Key": "3Tz3SufsKd7o1KQsjiR6OA==qr5UoIUdEXEIzFr6",
  };

  let reqOptions = {
    url: "https://api.api-ninjas.com/v1/geocoding?city=" + city,
    method: "GET",
    headers: headersList,
  };

  let response = await Axios.request(reqOptions);

  let data = response.data[0];
  console.log(data);
  return data;
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
