<template>
  <!-- table -->
  <div class="card mt-3">
    <DataTable
      v-model:filters="filters"
      :value="foods"
      tableStyle="min-width: 50rem"
      removableSort
      filterDisplay="row"
    >
      <template #header>
        <div class="header">
          <div class="item">
            <span class="p-input-icon-left">
              <i class="pi pi-search" />
              <InputText v-model="filters['global'].value" placeholder="Keresés" />
            </span>
          </div>
          <div class="divider"></div>
          <div class="item">
            <label for="distanceSlider" class="px-3 py-2 text-muted">Maximum km:</label>
            <div class="w-14rem">
              <InputText v-model.number="filters['distanceInKm'].value" class="w-full" />
              <Slider
                v-model="filters['distanceInKm'].value"
                class="w-full"
                id="distanceSlider"
              />
            </div>
          </div>
        </div>
      </template>
      <Column field="name" header="Név" style="min-width: 12rem" sortable> </Column>
      <Column field="type" header="Típus" sortable></Column>
      <Column field="allergies" header="Allergének" sortable>
        <template #body="slotProps">
          <span v-for="allergy in slotProps.data.allergies">
            <img :src="'/src/assets/img/' + allergy[0] + '-mentes.png'" alt="" />
          </span>
        </template>
      </Column>
      <Column field="expirationDate" header="Lejárati dátum" sortable></Column>
      <Column header="Fogyasztás" sortable>
        <template #body="slotProps">
          {{ slotProps.data.consumption ? "Helyben fogyasztás" : "Elvitelre" }}
        </template>
      </Column>
      <Column field="cousine" header="Konyha típus" sortable></Column>
      <Column field="distanceInKm" header="Távolság (km)" sortable></Column>
    </DataTable>
  </div>
</template>

<script setup>
import Slider from "primevue/slider";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { ref } from "vue";
import { FilterMatchMode } from "primevue/api";
import InputText from "primevue/inputtext";

const foods = ref([
  {
    name: "kakaós csiga",
    type: "hideg",
    allergies: ["laktóz"],
    expirationDate: "2022-12-12",
    consumption: false,
    cousine: "olasz",
    distanceInKm: 5,
  },
  {
    name: "mogyorós párna",
    type: "meleg",
    allergies: ["mogyoró", "laktóz"],
    expirationDate: "2020-12-12",
    consumption: false,
    cousine: "mexikói",
    distanceInKm: 50,
  },
  {
    name: "pizzás csiga",
    type: "meleg",
    allergies: [],
    expirationDate: "2020-12-12",
    consumption: true,
    cousine: "olasz",
    distanceInKm: 6,
  },
  {
    name: "barackos párna",
    type: "meleg",
    allergies: [],
    expirationDate: "2020-12-12",
    consumption: true,
    cousine: "mexikói",
    distanceInKm: 9,
  },
  {
    name: "túrós táska",
    type: "meleg",
    allergies: ["laktóz", "glutén", "tojás", "mogyoró", "hal"],
    expirationDate: "2020-12-12",
    consumption: false,
    cousine: "mexikói",
    distanceInKm: 17,
  },
]);

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  distanceInKm: { value: 15, matchMode: FilterMatchMode.LESS_THAN_OR_EQUAL_TO },
});

console.log(
  "aHR0cHM6Ly93d3cucmVkZGl0LmNvbS9tZWRpYT91cmw9aHR0cHMlM0ElMkYlMkZpLnJlZGQuaXQlMkZiam83aGdpdzVsbjUxLmpwZw=="
);
</script>

<style scoped>
.header {
  display: flex;
  flex-direction: row;
}
.item {
  display: flex;
  flex-shrink: 0;
}
.divider {
  display: flex;
  flex: 1;
}
</style>
