<?php
class Manager
{

  public $bdd;
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
    $reqDestinations = $this->bdd->query('SELECT location FROM destinations GROUP BY location ORDER BY location');

    return $reqDestinations->fetchAll(PDO::FETCH_ASSOC);

  }


  public function getDestinationsLimit()
  {
    $reqDestinations = $this->bdd->query('SELECT location, photos FROM destinations GROUP BY location, photos LIMIT 4');

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
    if (isset($_POST['formAction'])) {
      $toAuthor = htmlspecialchars($_POST['author']);
      $toMessage = htmlspecialchars($_POST['message']);
      if (!empty($_POST['author']) && !empty($_POST['message'])) {
        $reqAuthor = $this->bdd->prepare('SELECT * FROM reviews WHERE author = ?');
        $reqAuthor->execute(array($toAuthor));
        $toAuthorExist = $reqAuthor->rowCount();
        if ($toAuthorExist == 0) {
          $toAuthorLen = strlen($toAuthor);
          if ($toAuthorLen <= 255) {
            $reqMessage = $this->bdd->prepare('SELECT * FROM reviews WHERE message = ?');
            $reqMessage->execute(array($toMessage));
            $toMessageExist = $reqMessage->rowCount();
            if ($toMessageExist == 0) {
              $insertMessage = $this->bdd->prepare('INSERT INTO reviews(author, message, id_tour_operator) VALUES (?, ?, ?)');
              $insertMessage->execute(array($toAuthor, $toMessage, $_GET['id_to']));

              echo "<font color='green'>Your Message has been posted.</font>";
            } else {
              echo '<font color="red">Your message is not accepted.</font>';
            }
          }
        } else {
          echo '<div class="container row"><div class="col s8 offset-s3"><font color="red">This author name is already used.</font></div></div>';
        }
      } else {
        echo '<font color="red">All fields must be completed.</font>';
      }
    } 
  }

  public function getDestinationByOperatorId()
  {
    $reqDestinationByOp = $this->bdd->prepare('SELECT *, tour_operators.id as id FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator = tour_operators.id WHERE tour_operators.id = ?');
    $reqDestinationByOp->execute(array($_GET['id_to']));

    return $reqDestinationByOp->fetchAll(PDO::FETCH_ASSOC);
    
  }

  public function getDestinationByToId()
  {
    $reqDestinationByOp = $this->bdd->prepare('SELECT *, tour_operators.id as id, destinations.id as id_destination FROM tour_operators INNER JOIN destinations ON destinations.id_tour_operator = tour_operators.id WHERE tour_operators.id = ?');
    $reqDestinationByOp->execute(array($_GET['id_to']));

    return $reqDestinationByOp->fetchAll(PDO::FETCH_ASSOC);
    
  }


  public function getAllOperator()
  {
    $reqGetOperator = $this->bdd->prepare('SELECT * FROM tour_operators');
    $reqGetOperator->execute();

    return $reqGetOperator->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateOperatorToPremium()
  {
  }

  public function createTourOperator()
  {
    if (isset($_POST['action'])) {
      $toName = htmlspecialchars($_POST['TO-name']);
      $toLink = $_POST['TO-link'];
      if (!empty($_POST['TO-name']) && !empty($_POST['TO-link'])) {
        $reqName = $this->bdd->prepare('SELECT * FROM tour_operators WHERE name = ?');
        $reqName->execute(array($toName));
        $toNameExist = $reqName->rowCount();
        if ($toNameExist == 0) {
          $toNameLen = strlen($toName);
          if ($toNameLen <= 255) {
            $reqLink = $this->bdd->prepare('SELECT * FROM tour_operators WHERE link = ?');
            $reqLink->execute(array($toLink));
            $toLinkExist = $reqLink->rowCount();
            if ($toLinkExist == 0) {
              $insertTo = $this->bdd->prepare('INSERT INTO tour_operators(name, link, id_admin) VALUES (?, ?, ?)');
              $insertTo->execute(array($toName, $toLink, $_SESSION['id_admin']));
              header('Location: ../admin.php?id_admin='.$_SESSION['id_admin']);       
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
    if (isset($_POST['action'])) {
      $location = htmlspecialchars($_POST['location']);
      $price = $_POST['price'];
      if (!empty($_POST['location']) && !empty($_POST['price']) && !empty($_SESSION['id_to']) && isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) {
        if ($_FILES['monfichier']['size'] <= 10000000) {
            $infosfichier = pathinfo($_FILES['monfichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            $photosToBdd = basename($_FILES['monfichier']['name']);
            $locationLen = strlen($location);
            if ($locationLen <= 255 && in_array($extension_upload, $extensions_autorisees)) {
              move_uploaded_file($_FILES['monfichier']['tmp_name'], '../assets/IMG/' . basename($_FILES['monfichier']['name']));
              $insertDestination = $this->bdd->prepare('INSERT INTO destinations(location, price, id_tour_operator, photos) VALUES (?, ?, ?, ?)');
              $insertDestination->execute(array($location, $price, $_SESSION['id_to'], $photosToBdd));
     
            }
        } else {
          echo '<div class="container row"><div class="col s8 offset-s3"><font color="red">This image is too heavy.</font></div></div>';
        }
      } else {
        echo '<font color="red">All fields must be completed.</font>';
      }
    }
  }
}
  

