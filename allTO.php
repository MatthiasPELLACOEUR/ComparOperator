<?php
include './partials/header.php';
include './partials/nav.php';
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

                            <button class="right btn"><a class="white-text" href="./operator.php?id=<?= $tour_operator['id'] ?>&name=<?= $tour_operator['name'] ?>"> Nos voyages</a></button>
                                
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>