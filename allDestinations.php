<?php
session_start();
include './classes/Manager.php';
include './partials/header.php';
if(isset($_SESSION['id_admin'])){
    include './partials/nav_connect_admin.php';
  }elseif(isset($_SESSION['id_to'])){
    include './partials/nav_connect_to.php';
  }
  else{
    include './partials/nav_disconnet.php';
  }
  $manager = new Manager();
?>

<div class="container">
    <div class="row">
        <?php $allDestinations = $manager->getAllDestinations();
            foreach ($allDestinations as $destination) {?>
                <div class="col s4">
                    <div class="card">
                        <div class="card-content">
                            <?= ucfirst($destination['location'])?>
                        </div>
                        <div class="card-action">
                            <a class="blue-text" href="./classes/Destination.php?location=<?= $destination['location'] ?>">Voir les tours opérators</a>
                        </div>
                    </div>
                </div>
            <?php }
        ?>
    </div>
</div>