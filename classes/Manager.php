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
    $reqDestinations = $this->bdd->query('SELECT * FROM destinations GROUP BY location ORDER BY location');

    return $reqDestinations->fetchAll(PDO::FETCH_ASSOC);

  }


  public function getDestinationsLimit()
  {
    $reqDestinations = $this->bdd->query('SELECT * FROM destinations GROUP BY location LIMIT 4');

    return $reqDestinations->fetchAll(PDO::FETCH_ASSOC);

  }

  public function OperatorByDestination()
  {
    $reqOpByDestination = $this->bdd->prepare('SELECT * FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator = tour_operators.id WHERE destinations.location = ?');
    $reqOpByDestination->execute(array($_GET['location']));

    return $reqOpByDestination->fetchAll(PDO::FETCH_ASSOC);
    
  }

  


  public function createReview()
  {
  }

  public function getDestinationByOperatorId()
  {
    $reqDestinationByOp = $this->bdd->prepare('SELECT * FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator = tour_operators.id WHERE tour_operators.id = ?');
    $reqDestinationByOp->execute(array($_GET['id']));

  return $reqDestinationByOp->fetchAll(PDO::FETCH_ASSOC);
    
  }
  public function getAllOperator()
  {
    $reqGetOperator = $this->bdd->query('SELECT * FROM tour_operators');


    return $reqGetOperator()->fetchAll();
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
