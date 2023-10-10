<template>
  <div class="grid">
    <div class="btn-container">
      <button
        class="btn btn-primary modal-btn"
        data-bs-toggle="modal"
        data-bs-target="#addFoodModal"
      >
        Új étel felajánlása
      </button>
    </div>

    <div>
      <h2 class="mb-5">Eddigi felajánlásaid:</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Név</th>
            <th scope="col">Típus</th>
            <th scope="col">Allergének</th>
            <th scope="col">Lejárati dátum</th>
            <th scope="col">Fogyasztás</th>
            <th scope="col">Konyha típus</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="food in foods">
            <td>{{ food.name }}</td>
            <td>{{ food.type }}</td>
            <td>
              <span v-for="allergy in food.allergies">{{ allergy }}&nbsp;</span>
            </td>
            <td>{{ food.expirationDate }}</td>
            <td>{{ food.consumption }}</td>
            <td>{{ food.cousine }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div
    class="modal fade"
    id="addFoodModal"
    tabindex="-1"
    aria-labelledby="addFoodModal"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <AddFoodComponent />
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import AddFoodComponent from "../components/AddFoodComponent.vue";

const foods = ref([
  {
    name: "kakaós csiga",
    type: "hideg",
    allergies: ["laktóz"],
    expirationDate: "2022-12-12",
    consumption: false,
    cousine: "olasz",
  },
  {
    name: "mogyorós párna",
    type: "meleg",
    allergies: ["mogyoró", "laktóz"],
    expirationDate: "2020-12-12",
    consumption: false,
    cousine: "mexikói",
  },
]);
</script>

<style lang="css" scoped>
table {
  text-align: center;
}
.btn-container {
  display: flex;
  justify-content: center;
}

.modal-btn {
  font-size: 20px;
  height: 50px;
  width: 250px;
}

.grid {
  padding: 50px;
  display: grid;
  gap: 50px;
}
</style>
