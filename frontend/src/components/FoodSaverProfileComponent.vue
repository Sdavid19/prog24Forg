<template>
    <div class="signup-container">
    <form class="p-5">
    <h2 class="mb-4 text-center">Profil</h2>
    <p class="text-center text-danger">Hiányos profil!</p>
    <div class="profile-grid">
        <div class="simple">
            <div class="mb-3">
                <label for="name main" class="form-label main">Név</label>
                <input type="text" class="form-control" id="companyName">
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label name">Felhasználó típus</label>
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
                        <input class="form-check-input" type="checkbox" id="allergie1" name="mogyoro" value="1" >
                        <label class="form-check-label" for="allergie1">Mogyoró</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="allergie2" name="hal" value="2" >
                        <label class="form-check-label" for="allergie2">Hal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="allergie3" name="tojas" value="3" >
                        <label class="form-check-label" for="allergie3">Tojás</label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="mb-3">
                <legend>Étel</legend>
                <div class="grid">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1">
                        <label class="form-check-label" for="defaultCheck1">Laktóz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" >
                        <label class="form-check-label" for="defaultCheck2">Glutén</label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="mb-3">
                <legend>Preferált konyha: </legend>
                <div class="grid">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen1" value="1" >
                    <label class="form-check-label" for="kitchen1">Olasz</label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen2" value="2" >
                    <label class="form-check-label" for="kitchen2">Görög</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen3" value="3"  >
                    <label class="form-check-label" for="kitchen3">Amerikai</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen4" value="4">
                    <label class="form-check-label" for="kitchen4">Mexikói</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen5" value="5" >
                    <label class="form-check-label" for="kitchen5">Magyar</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen6" value="6" >
                    <label class="form-check-label" for="kitchen6">Japán</label>
                </div>
                </div>

            </fieldset>
            <fieldset class="mb-3">
                <legend>Étrend:</legend>
                <div class="grid">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="diet1" value="1" >
                    <label class="form-check-label" for="diet1">Szimpla</label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="diet2" value="2" >
                    <label class="form-check-label" for="diet2">Vegán</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="diet3" value="3"  >
                    <label class="form-check-label" for="diet3">Vegetáriánus</label>
                </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="btn-container">
        <button type="submit" class="btn btn-primary">Frissítés</button>
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
    .btn-container{
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
    .grid{
        display: grid;
        grid-template-columns: repeat(3, 100px);
    }
    .profile-grid{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 100px;
    }
    fieldset{
        padding: 10px 30px !important;
        border: 2px solid rgba(0, 0, 0, 0.1) !important;
        border-radius: 5px;
    }
    .main, legend{
        font-size: 20px;
    }


</style>