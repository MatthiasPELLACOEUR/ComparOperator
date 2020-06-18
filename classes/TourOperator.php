<?php
include 'Manager.php';

class TourOperator
{
    private $id,
    $name,
    $grade,
    $link,
    $is_premium;
    
    public function __construct()
    {
        
    }
    
    public function getId()
    {

    }

    public function getName()
    {

    }

    public function delete()
    {
        $manager = new Manager();
        $manager->bdd->exec('DELETE FROM tour_operators WHERE tour_operators.id =  '. $_GET['id']);

    }

    public function getLink()
    {
        $manager = new Manager();
        $reqLinks = $manager->bdd->query('SELECT link FROM tour_operators WHERE id = '. $_GET['id_to']);

        $links = $reqLinks->fetchAll(PDO::FETCH_ASSOC);

        foreach($links as $link){
        
            echo '<a href="'.$link['link'].'"> lien vers le site </a><br>';
        }
    
    }

    public function getIsPremium()
    {
        
        $manager = new Manager();
        $reqIsPremium = $manager->bdd->query('SELECT is_premium FROM tour_operators WHERE id ='. $_GET['id_to']);

        $isPremiums = $reqIsPremium->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($isPremiums);
        foreach($isPremiums as $isPremium){
            if($isPremium["is_premium"] == 1){
                echo $this->getLink();
            }
            elseif($isPremium['is_premium'] == 0){
                // echo 'au revoir';
            }
        }
    }
}