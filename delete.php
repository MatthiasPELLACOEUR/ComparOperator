<?php
session_start();
include './classes/TourOperator.php';
$newTO = new TourOperator();
$newTO->delete();

header('Location: ./admin.php?id_admin'.$_SESSION['id_admin']);