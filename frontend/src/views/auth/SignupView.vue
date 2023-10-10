<template>
    <div class="signup-container">
        <form class="shadow p-5">
        <h2 class="mb-4 text-center">Regisztráció</h2>
        <div class="mb-3">
            <label for="companyName" class="form-label">Név</label>
            <input type="text" class="form-control" id="companyName">
        </div>
        <div class="mb-3">
            <label for="companyName" class="form-label">Felhasználó típus</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value="1">Ételmentő</option>
                <option value="2">Jótékonysági szervezet</option>
                <option value="3">Étel felajánló (cég)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email cím</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div>
            <p class="text-center text-danger error">Hiba!</p>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Regisztráció</button>
        </div>
    </form>
    </div>
</template>

<script setup>

</script>

<style lang="css" scoped>
    .signup-container{
        min-height: calc(100vh - 100px);
        display: grid;
        place-items: center;
        margin: 20px;
    }
    form{
        min-width: 300px;
        width: 40%;
        max-width: 800px;
    }
    .btn-container{
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
    .error{
        visibility: hidden;
    }

</style>