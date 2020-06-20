<?php
session_start();
// include './classes/Manager.php';
include './classes/TourOperator.php';
$TourOp = new TourOperator();
$manager = new Manager();

$adminWTO = $manager->bdd->prepare('SELECT * FROM tour_operators WHERE id = ?');
$adminWTO->execute(array($_GET['id_to']));
$admins = $adminWTO->fetchAll(PDO::FETCH_ASSOC);

include './partials/nav_connect_admin.php';
include './partials/header.php';

foreach($admins as $admin){
    echo 
    '<form action="./edit.php" method="POST" class="formEditTo">
        <input type="hidden" name="id_to" value="'.$_GET['id_to'].'">
        Change your name : 
        <input name="name" value="'.$admin['name'].'">
        Change your link : 
        <input name="link" value="'.$admin['link'].'">
        Change admin code : 
        <input name="admin" value="'.$admin['id_admin'].'">
        <a href=""><button class="btn green right" name="submitTOedit" type="submit">Enregistrer les modifications</button></a>
    </form>
    ';
}



?>
