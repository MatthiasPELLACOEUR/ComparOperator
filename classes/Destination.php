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
    <?php $OperatorsByDestination = $manager->OperatorByDestination();
    foreach ($OperatorsByDestination as $operator) {
      if ($operator['is_premium'] == true) {?>
        <div class="col s10 m6">
            <div class="card white to_by_destination">
              <div class="card-content black-text">
                <span class="card-title"><a class="blue-text" href="../operator.php?id=<?= $operator['id_tour_operator'] ?>&amp;name=<?= $operator['name'] ?>"> <?=$operator["name"]?> </a></span>
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="<?= $operator['link'] ?>">Notre site</a>
              </div>
            </div>
          </div>
     <?php }
      elseif ($operator['is_premium'] == false){?>
        
        <div class="col s12 m6">
          <div class="card white">
            <div class="card-content black-text">
              <span class="card-title"><a class="blue-text" href="../operator.php?id=<?= $operator['id_tour_operator'] ?>&amp;name=<?= $operator['name']?>"><?= $operator["name"] ?></a></span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
          </div>
        </div>
    <?php  }
    }?>

    </div>
</div>

<?php
// include '../partials/footer.php';