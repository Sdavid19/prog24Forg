<template>
    <form class="p-5">
    <h2 class="mb-5 text-center">Adjon meg még pár adatot:</h2>
        <div class="simple">
            <div class="mb-3">
                <label for="name main" class="form-label main">Név</label>
                <input type="text" class="form-control" id="companyName">
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label main">Felhasználó típus</label>
                <select class="form-select" aria-label="Default select">
                    <option selected value="1">Ételmentő</option>
                    <option value="2">Jótékonysági szervezet</option>
                    <option value="3">Étel felajánló (cég)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label main">Email cím</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label main">Jelszó</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label class="form-label main">Geo lokáció</label>
                <input type="text" placeholder="Szélesség" class="form-control mb-2" id="latitude">
                <input type="text" placeholder="Hosszúság" class="form-control mt-2" id="longitude">
            </div>
        </div>
    <div class="btn-container">
        <button type="submit" class="btn btn-primary">Frissítés</button>
    </div>
</form>
</template>

<script setup>

</script>

<style lang="css" scoped>

    .btn-container{
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
    form{
        min-width: 300px;
        width: 40%;
        max-width: 800px;
    }
    .grid{
        display: grid;
        grid-template-columns: repeat(3, 100px);
    }
    .main, legend{
        font-size: 20px;
    }


</style>