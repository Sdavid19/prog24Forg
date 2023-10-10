<template>
  <form class="p-5">
    <h1 class="my-5 text-center">Adjon meg még pár adatot:</h1>
    <div class="spec">
      <div class="mb-3">
        <label for="companyName" class="form-label main">Cukorbetegség</label>
        <select class="form-select" aria-label="Default select example" id="diabetes">
          <option value="0" selected>Nem vagyok cukorbeteg</option>
          <option value="1">1-es típusú</option>
          <option value="2">2-es típusú</option>
        </select>
      </div>
      <fieldset class="mb-3">
        <legend>Étel allergia:</legend>
        <div class="grid">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie1"
              name="mogyoro"
              value="1"
            />
            <label class="form-check-label" for="allergie1">Mogyoró</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie2"
              name="hal"
              value="2"
            />
            <label class="form-check-label" for="allergie2">Hal</label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="allergie3"
              name="tojas"
              value="3"
            />
            <label class="form-check-label" for="allergie3">Tojás</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="mb-3">
        <legend>Étel</legend>
        <div class="grid">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" />
            <label class="form-check-label" for="defaultCheck1">Laktóz</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="2" />
            <label class="form-check-label" for="defaultCheck2">Glutén</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="mb-3">
        <legend>Preferált konyha:</legend>
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
      <fieldset class="mb-3">
        <legend>Étrend:</legend>
        <div class="grid">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="diet1" value="1" />
            <label class="form-check-label" for="diet1">Szimpla</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="diet2" value="2" />
            <label class="form-check-label" for="diet2">Vegán</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="diet3" value="3" />
            <label class="form-check-label" for="diet3">Vegetáriánus</label>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="btn-container">
      <button type="submit" class="btn btn-primary">Tovább</button>
    </div>
  </form>
</template>

<script setup></script>

<style lang="css" scoped>
form {
  min-width: 300px;
  max-width: 800px;
}
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
</style>
