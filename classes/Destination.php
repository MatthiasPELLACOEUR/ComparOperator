<?php

include 'Manager.php';

class Destination
{

    private $id,
            $location,
            $prive,
            $id_tour_operation;

    public function __construct()
    {
        
    }

    public function getId()
    {

    }

    public function getLocation()
    {

    }

    public function getPrice()
    {

    }

    public function getId_tour_operator()
    {
        
    }
}

include '../partials/header.php';
include '../partials/nav.php';

$manager = new Manager();

?>

<div class="container">
    <h2><?=ucfirst($_GET['location'])?></h2>
    <div class="row">
    <?= $manager->OperatorByDestination()?>
    </div>
</div>

<?php
// include '../partials/footer.php';