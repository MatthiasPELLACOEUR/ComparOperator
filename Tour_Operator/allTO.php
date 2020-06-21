<?php
session_start();
include '../partials/header.php';
if(isset($_SESSION['id_admin'])){
    include '../partials/nav_connect_admin.php';
  }elseif(isset($_SESSION['id_to'])){
    include '../partials/nav_connect_to.php';
  }
  else{
    include '../partials/nav_disconnet.php';
  }
  include '../classes/TourOperator.php';
$manager = new Manager();
?>

<div class="container">
    <div class="row">
        <?php $allTO = $manager->getAllOperator();
            foreach ($allTO as $tour_operator) {?>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content">
                            <?php echo ucfirst($tour_operator["name"]);?>

                            <a class="white-text right" href="./operator.php?id_to=<?= $tour_operator['id'] ?>&name=<?= $tour_operator['name'] ?>"><button class="float right btn">Nos voyages</button></a>
                                
                        </div>
                    </div>
                </div>
            <?php }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../assets/JS/script.js"></script>