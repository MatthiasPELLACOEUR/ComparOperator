<?php

class Manager
{

  private $bdd;
  public $erreur;

  public function __construct()
  {
    $this->bdd = new PDO(
      'mysql:host=127.0.0.1;dbname=ComparOperator;charset=utf8',
      'root',
      '',
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
  }


  public function getAllDestinations()
  {
    $reqDestinations = $this->bdd->query('SELECT * FROM destinations GROUP BY location');

    $destinations = $reqDestinations->fetchAll(PDO::FETCH_ASSOC);

    foreach ($destinations as $destination) {
      echo '
            <div class="carousel-item">
              <div class="card">
                <div class="card-image">
                  <img src="./assets/IMG/' . $destination['photos'] . '">
                </div>
                <div class="card-content">
                  ' . ucfirst($destination["location"]) . '
                </div>
                <div class="card-action">
                  <a class="blue-text" href="./classes/Destination.php?location=' . $destination['location'] . '">Voir les tours opérators</a>
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

    foreach ($OperatorsByDestination as $operator) {
      if ($operator['is_premium'] == true) {
      echo
        '<div class="col s10 m6">
            <div class="card white to_by_destination">
              <div class="card-content black-text">
                <span class="card-title"><a class="blue-text" href="../operator.php?id=' . $operator['id_tour_operator'] . '&amp;name='. $operator['name'].'">' . $operator["name"] . '</a></span>
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="' . $operator['link'] . '">Notre site</a>
              </div>
            </div>
          </div>';
      }
      elseif ($operator['is_premium'] == false){
        echo '
        <div class="col s12 m6">
          <div class="card white">
            <div class="card-content black-text">
              <span class="card-title"><a class="blue-text" href="../operator.php?id=' . $operator['id_tour_operator'] . '&amp;name='. $operator['name'].'">' . $operator["name"] . '</a></span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
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
    if (isset($_POST['action'])) {
      $toName = htmlspecialchars($_POST['TO-name']);
      $toLink = $_POST['TO-link'];
      // $selectPremium = $_POST['select-premium'];
      // verification all fields are completed
      if (!empty($_POST['TO-name']) && !empty($_POST['TO-link'])) {
        // verification only 1 nickname in the database
        $reqNickname = $this->bdd->prepare('SELECT * FROM tour_operators WHERE name = ?');
        $reqNickname->execute(array($toName));
        $toNameExist = $reqNickname->rowCount();
        if ($toNameExist == 0) {
          //verification length nickname
          $toNameLen = strlen($toName);
          if ($toNameLen <= 255) {
            $reqLink = $this->bdd->prepare('SELECT * FROM tour_operators WHERE link = ?');
            $reqLink->execute(array($toLink));
            $toLinkExist = $reqLink->rowCount();
            if ($toLinkExist == 0) {
              $insertTo = $this->bdd->prepare('INSERT INTO tour_operators(name, link) VALUES (?, ?)');
              $insertTo->execute(array($toName, $toLink));
              echo "<font color='red'>Your Tour Opérator has been successfully created.</font>";
              // header('Location: index.php');
            } else {
              echo '<font color="red">Your link is already used.</font>';
            }
          }
        } else {
          echo '<div class="container row"><div class="col s8 offset-s3"><font color="red">This name is already used.</font></div></div>';
        }
      } else {
        echo '<font color="red">All fields must be completed.</font>';
      }
    }
  }

  public function createDestination()
  {
  }
}
