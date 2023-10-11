<template>
  <div class="signup-grid">
    <FoodAdvertiserSignupComponent />
  </div>
</template>

<script setup>
import FoodSaverSignupComponent from "../components/FoodSaverSignupComponent.vue";
import FoodAdvertiserSignupComponent from "../components/foodadvertisersignupcomponent.vue";
</script>

<style lang="css" scoped>
.signup-grid {
  display: flex;
  justify-content: center;
}
</style>
