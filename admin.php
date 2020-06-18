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
    <div class="row">
        <h5>Your TOs</h5>
        <a href="../newTourOperator.php"><button class="btn blue">Add a Tour Operator</button></a><br>
        <?php foreach($admins as $admin){?>
          <div class="card">
            <div class="card-content">
              <h5 class="float left"><?= $admin['name'] ?></h5><p class="float right">Grade : <?= $admin['grade'] ?>/5</p><br>
              <br><button class="btn green right">Edit</button>
              <a class="btn red modal-trigger right" href="#modal1">Delete</a><br>
              
                        
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>Warning!</h4><br>
                  <p>Do you really want to delete this destination ?</p>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close btn red waves-effect white-text waves-red btn-flat">Confirm</a>
                  <a href="#!" class="modal-close btn blue waves-effect white-text waves-blue btn-flat">Cancel</a>
                </div>
              </div><br>
            </div>
          </div>
        <?php } ?>
     </div>
</div>

<?php
include './partials/footer.php';