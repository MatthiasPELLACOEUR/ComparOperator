<?php
session_start();
include './classes/Manager.php';
$manager = new Manager();

$manager->createDestination();
include './partials/header.php';
include './partials/nav_connect_to.php';

?>

<div class="container row form-register">
    <div class="col s8 offset-s3">
        <form method="POST" action="">
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
            <button class="btn waves-effect waves-light red right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>

<?php
// include './partials/footer.php';