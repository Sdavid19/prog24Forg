<template>
  <form class="p-5 shadow">
    <h2 class="text-center my-5">Adjon meg még pár adatot:</h2>
    <div class="spec">
      <fieldset class="mb-3">
        <legend>Konyha jellege:</legend>
        <div class="grid">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen1" value="1" />
            <label class="form-check-label" for="kitchen1">Olasz</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen2" value="2" />
            <label class="form-check-label" for="kitchen2">Görög</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen3" value="3" />
            <label class="form-check-label" for="kitchen3">Amerikai</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen4" value="4" />
            <label class="form-check-label" for="kitchen4">Mexikói</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen5" value="5" />
            <label class="form-check-label" for="kitchen5">Magyar</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="kitchen6" value="6" />
            <label class="form-check-label" for="kitchen6">Japán</label>
          </div>
        </div>
      </fieldset>
      <div class="mb-3">
        <label for="name main" class="form-label main">Létesítmény fajtája</label>
        <input type="text" class="form-control" id="instType" />
      </div>
    </div>
    <div class="btn-container">
      <button type="submit" class="btn btn-primary">Regisztráció</button>
    </div>
  </form>
</template>

<script setup></script>

<style lang="css" scoped>
.btn-container {
  margin-top: 30px;
  display: flex;
  justify-content: center;
}
.grid {
  display: grid;
  grid-template-columns: repeat(3, 100px);
}
fieldset {
  padding: 10px 30px !important;
  border: 2px solid rgba(0, 0, 0, 0.1) !important;
  border-radius: 5px;
}
.main,
legend {
  font-size: 20px;
}
.spec {
  display: grid;
  place-content: center;
}
</style>
