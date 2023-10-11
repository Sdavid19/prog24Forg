<template>
  <div class="login-container">
    <form class="shadow p-5">
      <h2 class="mb-5 text-center">Bejelentkezés</h2>
      <div class="mb-3">
        <label for="email" class="form-label">Email cím</label>
        <input type="email" class="form-control" id="email" v-model="loginData.email" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Jelszó</label>
        <input
          type="password"
          class="form-control"
          id="password"
          v-model="loginData.password"
        />
      </div>

      <div>
        <p class="text-center text-danger" :class="error ? '' : ' no-error'">
          Kérem töltsön ki minden mezőt helyesen!
        </p>
      </div>
      <div class="btn-container">
        <button type="button" class="btn btn-primary" @click="tryLogin()">
          Bejelentkezés
        </button>
      </div>
      <div>
        <p class="text-center text-success" :class="loggedIn ? '' : 'not-logged-in'">
          Sikeres bejelentkezés
        </p>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Axios from "../../stores/dataService";
let error = ref(false);
let loggedIn= ref(false);
let loginData = ref({
    email: "",
    password: "",
});

function tryLogin() {
  console.log(loginData);
  if (loginData.value.email && loginData.value.password) {
    error.value = false;
    //POST
    Axios.post("/user-login", loginData.value)
      .then(() => {
        error.value = false;
        console.log("belép");
      })
      .catch(() => {
        error.value = true;
        console.log("hiba");
      });
  } else {
    error.value = true;
  }
}
</script>

<style lang="css" scoped>
.login-container {
  min-height: calc(100vh - 100px);
  display: grid;
  place-items: center;
}
form {
  min-width: 300px;
  width: 40%;
  max-width: 800px;
}
.btn-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
}
.no-error {
  visibility: hidden;
}
.not-logged-in {
  visibility: hidden;
}
</style>
