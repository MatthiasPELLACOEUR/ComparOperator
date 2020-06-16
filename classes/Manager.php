<?php

class Manager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=ComparOperator;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }


    public function getAllDestinations()
    {
      $reqDestinations = $this->bdd->query('SELECT * FROM destinations GROUP BY location');
        
        $destinations = $reqDestinations->fetchAll(PDO::FETCH_ASSOC);

        foreach($destinations as $destination){   
            echo '
            <div class="carousel-item">
              <div class="card">
                <div class="card-image">
                  <img src="./assets/IMG/'.$destination['photos'].'">
                </div>
                <div class="card-content">
                  '.ucfirst($destination["location"]).'
                </div>
                <div class="card-action">
                  <a class="blue-text" href="./classes/Destination.php?location='.$destination['location'].'">Voit les tours opérators</a>
                </div>
              </div>
           </div>';
        }
      }
    
    public function OperatorByDestination()
    {
      $reqOpByDestination = $this->bdd->prepare('SELECT * FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator = tour_operators.id WHERE destinations.location = ?');
      $reqOpByDestination->execute(array($_GET['location']));

      $OperatorsByDestination = $reqOpByDestination->fetchAll(PDO::FETCH_ASSOC);

      foreach($OperatorsByDestination as $operator) {
        echo 
        '<div class="col s12 m6">
            <div class="card white">
              <div class="card-content black-text">
                <span class="card-title">'. $operator["name"].'</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>';
               
        if($operator['is_premium'] == true) {
          echo '
              <div class="card-action">
                <a href="'.$operator['link'].'">Notre site</a>
              </div>
              </div>
            </div>';
        }
      }

    }

    public function createReview()
    {

    }

    public function getReviewByOperatorId()
    {

    }

    public function getAllOperator()
    {

    }

    public function updateOperatorToPremium()
    {
    
    }

    public function createTourOperator()
    {

    }

    public function createDestination()
    {
        
    }
}



