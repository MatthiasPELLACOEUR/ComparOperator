<?php
     include './classes/Manager.php';
     include './classes/Review.php';
     include './partials/header.php';
     include './partials/nav.php';
     $review = new Review();
?>

<div class="container">
    <h4><?=ucfirst($_GET['name'])?></h4>
    <div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Grade : </p>
    <p>Comm : </p>
    <?= $review->getMessage()?>
</div>
</div>