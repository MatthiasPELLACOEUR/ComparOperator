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
 
    
    { $reqMessageAll = $this->bdd->prepare('SELECT * FROM reviews INNER JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE reviews.id_tour_operator = ?');
      $reqMessageAll->execute(array($_GET['id']));
      $messages = $reqMessageAll->fetchAll(PDO::FETCH_ASSOC); 

    foreach ($messages as $message) {
      echo '
           
            <div class="card">
                <div class="card-content">
                ' . $message['message'] . '
                </div>
            </div>';
    }
  
    }

    public function getAuthor()
    {

    }

    public function getId_tour_operator()
    {
        
    }
}