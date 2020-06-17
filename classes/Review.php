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
            }

    public function getId()
    {

    }

    public function getMessage()
    { 
      $reqMessageAll = $this->bdd->prepare('SELECT message FROM reviews INNER JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE reviews.id_tour_operator = ?');
      $reqMessageAll->execute(array($_GET['id']));
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
      $reqAuthorAll->execute(array($_GET['id'], $this->message['message']));
      $authors = $reqAuthorAll->fetchAll(PDO::FETCH_ASSOC); 

      foreach($authors as $author){
        echo '
        <div class="right">
        '. $author['author'] .'
        </div>'
        ;
      }
    }

    public function getId_tour_operator()
    {
        
    }
}