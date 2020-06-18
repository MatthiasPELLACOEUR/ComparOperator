<?php
session_start();
include './partials/header.php';
if(isset($_SESSION['id_admin'])){
    include './partials/nav_connect_admin.php';
  }elseif(isset($_SESSION['id_to'])){
    include './partials/nav_connect_to.php';
  }
  else{
    include './partials/nav_disconnet.php';
  }
  include './classes/TourOperator.php';
$manager = new Manager();
?>

<div class="container">
    <div class="row">
        <div class="col s10 m6">
            <?php $allTO = $manager->getAllOperator();
                foreach ($allTO as $tour_operator) {?>
                    <div class="card">
                        <div class="card-content">
                            <?php echo ucfirst($tour_operator["name"]);?>

                            <a class="white-text" href="./operator.php?id=<?= $tour_operator['id'] ?>&name=<?= $tour_operator['name'] ?>"><button class="right btn">Nos voyages</button></a>
                                
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>