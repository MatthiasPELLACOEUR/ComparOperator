<?php
session_start();
include './partials/header.php';
include './partials/nav_connect_to.php';
// include './classes/Manager.php';
include './classes/Review.php';
include './classes/TourOperator.php';
$manager = new Manager();
$review = new Review();
$TourOp = new TourOperator();

if(isset($_POST['submit'])){
  $_SESSION['isPremium'] = $_POST['main'];//Retrieve the Option Value;
  $TourOp->setIsPremium();
}
?>
<div class="container">
    <h4>Destinations : </h4>
    
    <a href="../newDestination.php"><button class="btn blue">Add a destination</button></a><br><br><br>

    <div class="row">
      <form method="post" class="col s3">
      
        <select name="main">
            <?php if($_SESSION['isPremium'] == "1"){?>
                <option value="1" selected>Premium</option>
                <option value="0">Standard</option>
            <?php }else if($_SESSION['isPremium'] == "0"){?>
                <option value="1">Premium</option>
                <option value="0" selected>Standard</option>
            <?php }else if(!isset($_SESSION['isPremium'])){?>
                <option value="1">Premium</option>
                <option value="0">Standard</option>
            <?php } ?> 
            
        </select>
        <input type="submit" class="btn green float right" name="submit" value="Validate">
    </form>
  </div>


  <div class="row">
      <?php $destinationByOps = $manager->getDestinationByToId();

      foreach ($destinationByOps as $destination) {?>
  
      <div class="col s6">
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
<?php

include './partials/footer.php';
