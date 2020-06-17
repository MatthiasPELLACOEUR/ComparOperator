<?php
class Review
{

    private $id,
            $message,
            $author,
            $id_tour_operator;


 
  public function __construct()
  {
    $this->bdd = new PDO(
      'mysql:host=127.0.0.1;dbname=ComparOperator;charset=utf8',
      'root',
      '',
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    $this->id_tour_operator = $_GET['id'];
  }

    public function getId()
    {

    }

    public function getMessage()
    { 
      $reqMessageAll = $this->bdd->prepare('SELECT message FROM reviews INNER JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE reviews.id_tour_operator = ?');
      $reqMessageAll->execute(array($this->id_tour_operator));
      $messages = $reqMessageAll->fetchAll(PDO::FETCH_ASSOC); 
      foreach ($messages as $this->message) {
        echo '
        <li class="comm">
          '.$this->message['message']; $this->getAuthor().'
        </li>'
        ;
    }
  }

  
    

    public function getAuthor()
    {
      $reqAuthorAll = $this->bdd->prepare('SELECT author FROM reviews  WHERE reviews.id_tour_operator = ? AND reviews.message = ? ');
      $reqAuthorAll->execute(array($this->id_tour_operator, $this->message['message']));
      $authors = $reqAuthorAll->fetchAll(PDO::FETCH_ASSOC); 

      foreach($authors as $this->author){
        echo '
        <div class="right">
        '. $this->author['author'] .'
        </div>'
        ;
      }
    }

    public function getId_tour_operator()
    {
        
    }
}