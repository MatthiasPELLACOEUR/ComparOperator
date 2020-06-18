<?php

    include './classes/Manager.php';
    $manager = new Manager();
    include './partials/header.php';
    if(isset($_SESSION['id_admin'])){
      include './partials/nav_connect.php';
    }
    else{
      include './partials/nav_disconnet.php';
    }
?>

<div class="container-fluid">
<div class="parallax-container">
      <div class="parallax"><img src="./assets/IMG/plage.jpg"></div>
</div> 


    <div class="section white">
      <div class="row container">
        <h2 class="header">Choose your destination</h2>
        <p class="grey-text text-darken-3 lighten-3">Click on the card of your choice.</p>
        <div class="carousel">
            <?php $destinations = $manager->getDestinationsLimit();
            foreach ($destinations as $destination) {?>
                  <div class="carousel-item">
                     <div class="card">
                        <div class="card-image">
                          <img src="./assets/IMG/<?=$destination['photos']?>">
                        </div>
                        <div class="card-content">
                          <?= ucfirst($destination["location"])?>
                        </div>
                        <div class="card-action">
                          <a class="blue-text" href="./classes/Destination.php?location=<?= $destination['location'] ?>">Voir les tours opérators</a>
                        </div>
                      </div>
                  </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="container"> -->

    

    <!-- </div> -->
    <div class="parallax-container">
    <div class="parallax"><img src="./assets/IMG/japon.jpg"></div>
    </div>

  

<?php

include './partials/footer.php';
