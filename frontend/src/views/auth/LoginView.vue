<template>
    <div class="login-container">
        <form class="shadow p-5">
        <h2 class="mb-5 text-center">Bejelentkezés</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email cím</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div>
            <p class="text-center text-danger error">Error!</p>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        </div>
    </form>
    </div>
</template>

<script setup>

</script>

<style lang="css" scoped>
    .login-container{
        height: calc(100vh - 70px);
        display: grid;
        place-items: center;
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