<template>
  <h1 class="text-center">Ételmentés</h1>
  <p>
    Alkalmazásunk segítségével megmentjük az amúgy elpocsékolás sorsára jutó ételetek. Az
    ételfelajánlás bárkitől érkezhet, ne maradj le te se!
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
</style>
