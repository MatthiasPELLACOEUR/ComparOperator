<?php
session_start();
include './partials/header.php';
include './partials/nav_connect_to.php';
include './classes/Manager.php';
include './classes/Review.php';
$manager = new Manager();
$review = new Review();


?>
<div class="container">
    <h4>Destinations : </h4>
    
    <a href="../newDestination.php"><button class="btn blue">Add a destination</button></a><br>


    <div class="row">
       <?php $destinationByOps = $manager->getDestinationByToId();

       foreach ($destinationByOps as $destination) {?>
    
        <div class="col s6 offset-s1">
        <h5 class="header"> <?= ucfirst($destination["location"])?></h5>
        <div class="card horizontal">
          <div class="card-image test">
          <img src="./assets/IMG/<?=$destination['photos']?>">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <br><br>
              <h5 class="right"><?=$destination['price']?>€</h5>
            </div>
          </div>
        </div>
      </div>
       <?php }?>
    </div>

    <h4>Your comments : </h4>
    <ul>
            <?= $review->getMessage() ?>
        </ul>
</div>


