<?php
session_start();
include './classes/Manager.php';
$manager = new Manager();

$adminWTO = $manager->bdd->prepare('SELECT *, tour_operators.id as id_to FROM tour_operators INNER JOIN admin  ON admin.id = tour_operators.id_admin WHERE admin.id = ?');
$adminWTO->execute(array($_SESSION['id_admin']));
$admins = $adminWTO->fetchAll(PDO::FETCH_ASSOC);

include './partials/nav_connect_admin.php';
include './partials/header.php';
?>

<div class="container">
    <h4>Admin</h4>
    <a href="./logout.php"><button class="btn red">Disconnect</button></a>
    <div class="row">
        <h5>Your TOs</h5>
        <a href="../newTourOperator.php"><button class="btn blue">Add a Tour Operator</button></a><br>
        <div class="card-content">
        <?php foreach($admins as $admin){
            echo $admin['name'].' grade : '; 
            echo $admin['grade'].'/5 ';
            echo '<button class="btn green right">Edit</button>';
            echo '<a class="btn red modal-trigger right" href="#modal1">Delete</a>
            
                      
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h4>Confirm delete ?</h4>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Confirm</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
              </div>
            </div><br>';
          }

        ?>
        </div>
    </div>
</div>

<?php
include './partials/footer.php';