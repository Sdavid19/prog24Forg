<template>
  <img
    class="w-100"
    src="https://newellbrands.scene7.com/is/image/NewellRubbermaid/FoodSaver%20Homepage_FreshBucks%20Banner_Desktop?fmt=jpeg&wid=2880"
    alt=""
  />
  <h1 class="text-center my-3 display-1">Ételmentés</h1>
  <p>
    Alkalmazásunk segítségével <b>megmentjük</b> az amúgy elpocsékolás sorsára jutó
    ételetek. Az ételfelajánlás bárkitől érkezhet, ne maradj le te se!
  </p>

  <p>
    A környezettudatosság és a körforgásos gadasági szemlélet jegyében készítettük
    weboldalunkat.
  </p>

  Oldalunk külön hangsúlyt fektet a rászorulók élelmeztetésére, várjuk jótékonysági
  szervezetek jelentkezését is!
</template>

<script setup></script>

<style scoped>
.grid {
  place-items: center;
  grid-template-columns: 1fr 1fr;
  height: calc(100vh);
}
.left {
  height: calc(100vh);
  width: 50vw;
  padding: 50px;
}
.right {
  grid-template-rows: 1fr 1fr;
  height: calc(100vh);
}
div {
  display: grid;
  place-items: center;
  text-align: center;
}

.bottom,
.top {
  height: 50vh;
  padding: 50px;
}

h1 {
  background-color: rgb(39, 39, 39, 0.6);
  color: azure;
  padding: 10px;
}
</style>
