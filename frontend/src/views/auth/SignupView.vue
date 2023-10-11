<template>
  <div class="signup-container">
    <form class="shadow p-5">
      <h2 class="mb-4 text-center">Regisztráció</h2>
      <div class="mb-3">
        <label for="name" class="form-label">Név</label>
        <input type="text" class="form-control" id="name" v-model="signupData.name" />
      </div>
      <div class="mb-3">
        <label for="companyName" class="form-label">Felhasználó típus</label>
        <select
          class="form-select"
          aria-label="Default select example"
          v-model="signupData.userType"
          id="companyName"
        >
          <option selected value="1">Ételmentő</option>
          <option value="2">Jótékonysági szervezet</option>
          <option value="3">Étel felajánló (cég)</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email cím</label>
        <input type="email" class="form-control" id="email" v-model="signupData.email" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Jelszó</label>
        <input
          type="password"
          class="form-control"
          id="password"
          v-model="signupData.password"
        />
      </div>
      <div class="mb-3">
        <label class="form-label main">Geo lokáció</label>
        <input
          type="number"
          placeholder="Szélesség"
          class="form-control mb-2"
          id="latitude"
          v-model="signupData.latitude"
        />
        <input
          type="number"
          placeholder="Hosszúság"
          class="form-control mt-2"
          id="longitude"
          v-model="signupData.longitude"
        />
      </div>
      <div>
        <p class="text-center text-danger" :class="error ? '' : ' no-error'">
          Kérem töltsön ki minden mezőt!
        </p>
      </div>
      <div class="btn-container">
        <button type="button" @click="trySignUp()" class="btn btn-primary">Tovább</button>
      </div>
    </form>
  </div>
  <div class="more-data-grid">
    <FoodSaverProfileComponent v-if="signupData.userType == 1" :data="signupData" />
    <!-- <FoodAdvertiserSignupComponent v-if="signupData.userType == 2" /> -->
    <FoodAdvertiserSignupComponent v-if="signupData.userType == 3" :data="signupData" />
  </div>
</template>

<script setup>
import FoodSaverProfileComponent from "../../components/FoodSaverSignupComponent.vue";
import FoodAdvertiserSignupComponent from "../../components/FoodAdvertiserSignupComponent.vue";
import { ref } from "vue";
import Axios from "../../stores/dataService";

let error = ref(false);

let signupData = ref({
  //   name: "",
  //   userType: 1,
  //   email: "",
  //   password: "",
  //   geoLocation: {
  //     latitude: 0,
  //     longitude: 0,
  //   },
  userType: 1,
  name: "a",
  email: "a",
  password: "a",
  latitude: 10,
  longitude: 10,
});

function trySignUp() {
  if (
    signupData.value.name &&
    signupData.value.userType &&
    signupData.value.email &&
    signupData.value.latitude &&
    signupData.value.longitude
  ) {
    error.value = false;
    Axios.post("/user-signup", signupData.value)
      .then(() => {
        error.value = false;
        console.log("belép");
      })
      .catch(() => {
        error.value = true;
        console.log("hiba");
      });
    document.getElementsByClassName("more-data-grid")[0].scrollIntoView();
    console.log(signupData.value);
  } else {
    error.value = true;
  }
}
</script>

<style lang="css" scoped>
.signup-container {
  min-height: calc(100vh - 100px);
  display: grid;
  place-items: center;
  margin: 20px 0;
}
form {
  min-width: 300px;
  width: 50%;
  max-width: 1000px;
}
.btn-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
}
.no-error {
  visibility: hidden;
}

.more-data-grid {
  display: flex;
  justify-content: center;
}
</style>
