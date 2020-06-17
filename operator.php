<?php
     include './classes/Manager.php';
     include './classes/Review.php';
     include './partials/header.php';
     include './partials/nav.php';
     $manager = new Manager();
     $review = new Review();
    //  $review->getAuthor();
     
     ?>

<div class="container">
    <h4><?=ucfirst($_GET['name'])?></h4>
    <div class="row">
       <?php $destinationByOps = $manager->getDestinationByOperatorId();

       foreach ($destinationByOps as $destination) {?>
    
        <div class="col s12 m7">
        <h5 class="header"> <?= ucfirst($destination["location"])?></h5>
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
        
        <p>Commentaires : </p>
        <ul>
            <?= $review->getMessage() ?>
        </ul>
    </div>
</div>