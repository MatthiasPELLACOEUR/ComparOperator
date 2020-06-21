<?php
session_start();
include '../classes/Manager.php';
$manager = new Manager();

include '../partials/header.php';
include '../partials/nav_connect_to.php';
?>

<div class="container row form-register">
    <div class="col s8 offset-s3">
        <form method="POST" action="../Tour_Operator/toPage.php?id_to=<?=$_SESSION['id_to'] ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s8">
                <input type="text" name="location" class="validate">
                <label class="active" for="location">Location</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                <input type="text" name="price" class="validate">
                <label class="active" for="price">Price</label>
                </div>
            </div>
            <p>
                Add a picture :<br />
                <input type="file" name="monfichier" />
        </p>

            <button class="btn waves-effect waves-light red right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../assets/JS/script.js"></script>