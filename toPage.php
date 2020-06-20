<?php
session_start();
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
include './partials/header.php';
include './partials/nav_connect_to.php';
?>
<div class="container">
  <div class="row">
    <div class="card">
      <div class="card-content">
          <?php 
            $infoTourOp = $TourOp->getInfos();
          ?>
          <div class="col s4">

            <h4><?=$infoTourOp['name']?></h4>

          </div>

          <div class="col s4 center">
            <span>your status</span>
            <?php if($infoTourOp['is_premium'] == "1"){?>
                <h4>Premium</h4>
            <?php }else if($infoTourOp['is_premium'] == "0"){?>
                <h4>Standard</h4>
            <?php }?>
     

          </div>
          <div class="col s4 right-align">

              <span>your grade</span>
          <h4><?=$infoTourOp['grade']?>/5</h4>

          </div>
          
          <br><br><br><br>

      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col s4">
    <h4>Destinations : </h4>
    <a href="../newDestination.php"><button class="btn blue">Add a destination</button></a><br>


    <?php $manager->createDestination();?>

    </div>
      <form method="post" class="col s3 float right form-premium">
      
        <select name="main">
            <?php if($infoTourOp['is_premium'] == "1"){?>
                <option value="1" selected>Premium</option>
                <option value="0">Standard</option>
            <?php }else if($infoTourOp['is_premium'] == "0"){?>
                <option value="1">Premium</option>
                <option value="0" selected>Standard</option>
            <?php }else if(!isset($infoTourOp['is_premium'])){?>
                <option value="0">Standard</option>
                <option value="1">Premium</option>
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
              
              <form action="./delete.php" method="post">
                <input type="hidden" name="id_destination" value="<?=$destination['id_destination']?>">
                <button class="btn waves-effect white-text waves-red btn-flat red right " name="submitDest" type="submit">Delete</button><br>
              </form>

              <h5 class="right"><?=$destination['price']?>€</h5>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
  </div>

    <h4>Comments : </h4>
    <ul>
            <?= $review->getMessage() ?>
        </ul>
</div>
<?php

include './partials/footer.php';
