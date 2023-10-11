<template>
  <form class="p-5">
    <h2 class="mb-5 text-center">Profil adatok</h2>
    <div class="simple">
      <div class="mb-3">
        <label for="name" class="form-label main">Név</label>
        <input
          type="text"
          class="form-control"
          id="name"
          v-model="felhasznaloData.nev"
          :disabled="isDisabled"
        />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label main">Email cím</label>
        <input
          type="email"
          class="form-control"
          id="email"
          v-model="felhasznaloData.emailCim"
          :disabled="isDisabled"
        />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label main">Jelszó</label>
        <input
          type="password"
          class="form-control"
          id="password"
          v-model="felhasznaloData.jelszo"
          :disabled="isDisabled"
        />
      </div>
      <div class="mb-3">
        <label class="form-label main">Geo lokáció</label>
        <input
          type="text"
          placeholder="Szélesség"
          class="form-control mb-2"
          id="latitude"
          v-model="felhasznaloData.latitude"
          :disabled="isDisabled"
        />
        <input
          type="text"
          placeholder="Hosszúság"
          class="form-control mt-2"
          id="longitude"
          v-model="felhasznaloData.longitude"
          :disabled="isDisabled"
        />
      </div>
    </div>
    <div class="btn-container">
      <button type="button" class="btn btn-primary me-3" @click="edit()">
        Adatok szerkesztése
      </button>
      <button
        type="button"
        class="btn btn-primary ms-3"
        @click="save()"
        :disabled="isDisabled"
      >
        Mentés
      </button>
    </div>
  </form>
</template>

<script setup>
import { ref } from "vue";
let isDisabled = ref(true);
let error = ref(false);
let felhasznaloData = ref({
  nev: "Dávid",
  emailCim: "asd@gmail.com",
  jelszo: "Jelszo123",
  longitude: 47.0001,
  latitude: 18.6661,
});

function edit() {
  isDisabled.value = false;
}

function save() {
  if (
    felhasznaloData.value.nev &&
    felhasznaloData.value.latitude &&
    felhasznaloData.value.longitude
  ) {
    console.log(felhasznaloData);

    Axios.patch("/user-modify/1", felhasznaloData.value)
      .then(() => {
        error.value = false;
        isDisabled = true;
        console.log("frissítve");
        alert("Fiókadatok sikeresen frissültek!");
      })
      .catch(() => {
        error.value = true;
        console.log("hiba");
      });
    console.log(felhasznaloData);
  } else {
    isDisabled = false;
    error.value = true;
    alert("Hiba! Hiányos profil adatok!");
  }
}
</script>

<style lang="css" scoped>
.btn-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
}
form {
  min-width: 300px;
  width: 40%;
  max-width: 800px;
}
.grid {
  display: grid;
  grid-template-columns: repeat(3, 100px);
}
.main,
legend {
  font-size: 20px;
}
</style>
