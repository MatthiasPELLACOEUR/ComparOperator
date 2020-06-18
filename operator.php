<?php
session_start();
include './partials/header.php';
     include './classes/Review.php';
     include './classes/TourOperator.php';
     if(isset($_SESSION['id_admin'])){
      include './partials/nav_connect_admin.php';
    }elseif(isset($_SESSION['id_to'])){
      include './partials/nav_connect_to.php';
    }
    else{
      include './partials/nav_disconnet.php';
    }
     $manager = new Manager();
     $tourOp = new TourOperator();
     $review = new Review();
     $manager->createReview(); 

     ?>

<div class="container">
    <h4><?=ucfirst($_GET['name'])?></h4>
    <?php $tourOp->getIsPremium(); ?>

    <div class="row">
       <?php $destinationByOps = $manager->getDestinationByOperatorId();

       foreach ($destinationByOps as $destination) {?>
    
        <div class="col s12 m7">
        <h5 class="header"> <?= ucfirst($destination["location"])?> <span> <?= $destination['id_tour_operator']?></span> <span class="right"><?=$destination['price']?>€</span></h5>
        <div class="card horizontal">
          <div class="card-image test">
          <img src="./assets/IMG/<?=$destination['photos']?>">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>
       <?php }?>
    </div>
    <div>
        
    <h5>Reviews</h5>
        <ul>
            <?= $review->getMessage() ?>
        </ul>
    </div>
    <h5>Add a review</h5>
    <div class="row">
      <form action="" method="post" class="form-review">
        <input type="text" class="col s5" name="author" placeholder="Your name">
        <input type="text" name="message" placeholder="Your message">
        <button class="btn waves-effect waves-light red" type="submit" name="formAction">Submit
                <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
</div>
<?php


include './partials/footer.php';