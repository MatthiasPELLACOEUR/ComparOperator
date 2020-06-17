<?php

    include './classes/Manager.php';
    $manager = new Manager();
    include './partials/header.php';
    include './partials/nav.php'

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
          <?= $manager->getAllDestinations() ?>
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
