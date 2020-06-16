<?php
      include './partials/header.php';

      include './partials/nav.php';
?>

<div class="container row">
    <div class="col s12 offset-s3">
        <form method="POST" action="">
        <div class="row">
            <div class="input-field col s6">
            <input id="first_name2" type="text" class="validate">
            <label class="active" for="first_name2">Nom du Tour Operator</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input id="first_name2" type="text" class="validate">
            <label class="active" for="first_name2">Lien du site Web</label>
            </div>
        </div>
        <div class="input-field col s6 row">
            <select>
                <label>Compte Premium ?</label>
                <option value="" disabled selected>Choose your option</option>
                <option value="">Standard</option>
                <option value="premium">Premium</option>
            </select>
        </div>
        <div class="input-field col s6 row">
            <input type="submit">
        </div>
        </form>
    </div>
</div>

<?php
include './partials/footer.php';