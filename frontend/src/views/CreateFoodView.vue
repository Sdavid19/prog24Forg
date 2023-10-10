<template>
  <h1 class="text-center">Étel felajánlás</h1>

  <div class="card">
    <DataTable
      :value="foods"
      paginator
      :rows="5"
      :rowsPerPageOptions="[5, 10, 20, 50]"
      tableStyle="min-width: 50rem"
    >
      <Column field="name" header="Name" style="width: 25%"></Column>
    </DataTable>
  </div>
</template>

<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";

const foods = ref([{ name: "asd" }, { name: "asdad" }]);
</script>

<style lang="css" scoped></style>
