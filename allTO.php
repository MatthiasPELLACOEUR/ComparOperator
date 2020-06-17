<?php
include './classes/Manager.php';
include './partials/header.php';
include './partials/nav.php';
$manager = new Manager();
?>

<div class="container">
    <div class="row">
        <div class="col s10 m6">
            <?php $allTO = $manager->getAllOperator();
                foreach ($allTO as $tour_operator) {?>
                    <div class="card">
                        <div class="card-content">
                            <?= ucfirst($tour_operator["name"])?>
                        </div>
                    <div class="card-action">
                        <a class="blue-text" href="./classes/Destination.php?location=<?= $tour_operator['id'] ?>">Voir les tours opérators</a>
                    </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>