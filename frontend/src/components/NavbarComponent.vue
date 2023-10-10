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
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/"
              :class="route.path == '/' ? ' my-active' : ''"
              >Kezdőlap</RouterLink
            >
          </li>
          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/foods"
              :class="route.path == '/foods' ? ' my-active' : ''"
              >Ételek</RouterLink
            >
          </li>
          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/create-food"
              :class="route.path == '/create-food' ? ' my-active' : ''"
              >Felajánlásaid</RouterLink
            >
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/login"
              :class="route.path == '/login' ? ' my-active' : ''"
              >Bejelentkezés</RouterLink
            >
          </li>
          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/signup"
              :class="route.path == '/signup' ? ' my-active' : ''"
              >Regisztráció</RouterLink
            >
          </li>

          <li class="my-nav-item">
            <RouterLink
              class="nav-link"
              to="/profile"
              :class="route.path == '/profile' ? ' my-active' : ''"
              >Profil</RouterLink
            >
          </li>
        </ul>
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
  background-color: #caf0f8 !important;
}

.my-nav-item {
  margin: auto;
  color: white;
  font-size: 20px;
  cursor: pointer;
  padding: 0.7rem;
}

.my-nav-item:after {
  display: block;
  content: "";
  border-bottom: solid 2px #749ab1;
  transform: scaleX(0);
  transition: transform 300ms ease-in-out;
  font-size: 20px;
}

.my-nav-item:hover:after {
  transform: scaleX(1);
}

.my-nav-item a {
  text-decoration: none;
  color: #272727;
}

.my-active {
  color: #0e476b !important;
  font-weight: bold;
}
</style>
