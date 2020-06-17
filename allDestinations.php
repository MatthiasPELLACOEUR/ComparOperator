<?php
include './classes/Manager.php';
include './partials/header.php';
include './partials/nav.php';
$manager = new Manager();
?>

<div class="container">
    <div class="row">
        <div class="col s10 m6">
            <?php $destinations = $manager->getAllDestinations();
                foreach ($destinations as $destination) {?>
                    <div class="card">
                        <div class="card-content">
                            <?= ucfirst($destination["location"])?>
                        </div>
                    <div class="card-action">
                        <a class="blue-text" href="./classes/Destination.php?location=<?= $destination['location'] ?>">Voir les tours opérators</a>
                    </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>