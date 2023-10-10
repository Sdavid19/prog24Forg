<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <li class="nav-item">
            <RouterLink
              class="nav-link"
              to="/"
              :class="route.path == '/' ? ' active' : ''"
              >Kezdőlap</RouterLink
            >
          </li>
          <li class="nav-item">
            <RouterLink
              class="nav-link"
              to="/login"
              :class="route.path == '/login' ? ' active' : ''"
              >Bejelentkezés</RouterLink
            >
          </li>
          <li class="nav-item">
            <RouterLink
              class="nav-link"
              to="/signup"
              :class="route.path == '/signup' ? ' active' : ''"
              >Regisztráció</RouterLink
            >
          </li>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { RouterLink } from "vue-router";
import { useRoute } from "vue-router";

const route = useRoute();
</script>

<style scoped>
.navbar {
  min-height: 70px;
}
</style>
