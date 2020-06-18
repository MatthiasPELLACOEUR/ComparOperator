<?php
session_start();
include './classes/Manager.php';
$manager = new Manager();

$manager->createTourOperator();
include './partials/header.php';

if(isset($_SESSION['id_admin'])){
    include './partials/nav_connect_admin.php';
  }elseif(isset($_SESSION['id_to'])){
    include './partials/nav_connect_to.php';
  }
  else{
    include './partials/nav_disconnet.php';
  }
?>

<div class="container row form-register">
    <div class="col s8 offset-s3">
        <form method="POST" action="">
            <div class="row">
                <div class="input-field col s8">
                <input type="text" name="TO-name" class="validate">
                <label class="active" for="TO-name">Nom du Tour Operator</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                <input type="text" name="TO-link" class="validate">
                <label class="active" for="TO-link">Lien du site Web</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light red right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>

<?php
// include './partials/footer.php';