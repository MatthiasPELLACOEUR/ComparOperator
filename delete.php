<?php
session_start();
include './classes/TourOperator.php';
$newTO = new TourOperator();

if(isset ($_POST['submitTO'])){
$newTO->delete();
header('Location: ./admin.php?id_admin'.$_SESSION['id_admin']);
}

if(isset($_POST['submitDest'])){
$newTO->deleteDestination();
header('Location: ./Tour_Operator/toPage.php?id_to='.$_SESSION['id_to']);
}
