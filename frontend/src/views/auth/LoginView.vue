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
          A mezők kitöltése kötelező
        </p>
      </div>
      <div class="btn-container">
        <button type="button" class="btn btn-primary" @click="tryLogin()">
          Bejelentkezés
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
const error = ref(false);
const loginData = ref({
  email: "",
  password: "",
});

function tryLogin() {
  console.log(loginData);
  if (loginData.value.email && loginData.value.password) {
    error.value = false;
    //send request
  } else {
    error.value = true;
  }
}
</script>

<style lang="css" scoped>
.login-container {
  min-height: calc(100vh - 70px);
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
</style>
