<?php
session_start();
include './classes/Manager.php';
$manager = new Manager();

$adminWTO = $manager->bdd->prepare('SELECT * FROM admin INNER JOIN tour_operators ON admin.id = tour_operators.id_admin WHERE admin.id = ?');
$adminWTO->execute(array($_SESSION['id_admin']));
$admins = $adminWTO->fetchAll(PDO::FETCH_ASSOC);

include './partials/nav_connect.php';
include './partials/header.php';
?>

<div class="container">
    <h4>Admin</h4>
    <div class="row">
        <h5>Your TOs</h5>
        <a href="../register.php"><button class="btn blue">Add a Tour Operator</button></a><br>
        <?php foreach($admins as $admin){
            echo $admin['name'].' grade : '; 
            echo $admin['grade'].'/5 ';
            echo '<a class="waves-effect waves-light btn red modal-trigger" href="#modal1">Delete</a>';
            echo '<button class="btn red">Edit</button><br>';
        }

        ?>
          <!-- Modal Trigger -->
 

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Confirm delete ?</h4>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Confirm</a>
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
  </div>
</div>

    </div>
</div>

<?php

include './partials/footer.php';