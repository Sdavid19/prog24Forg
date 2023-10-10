<template>
  <div class="card mt-3">
    <DataTable
      v-model:filters="filters"
      :value="foods"
      tableStyle="min-width: 50rem"
      removableSort
      :globalFilterFields="['name', 'foods.name']"
      filterDisplay="row"
    >
      <template #header>
        <div class="flex justify-content-end">
          <span class="p-input-icon-left">
            <i class="pi pi-search" />
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
          </span>
        </div>
      </template>
      <Column field="name" header="Név" style="min-width: 12rem"> </Column>
      <Column field="type" header="Típus" sortable></Column>
      <Column field="allergies" header="Allergének" sortable></Column>
      <Column field="expirationDate" header="Lejárati dátum" sortable></Column>
      <Column field="consumption" header="Fogyasztás" sortable></Column>
      <Column field="cousine" header="Konyha típus" sortable></Column>
    </DataTable>
  </div>
</template>

<script setup>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { ref } from "vue";
import { FilterMatchMode } from "primevue/api";

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

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
});
</script>

<style lang="scss" scoped></style>
