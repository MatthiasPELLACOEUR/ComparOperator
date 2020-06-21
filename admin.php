<?php
session_start();
// include './classes/Manager.php';
include './classes/TourOperator.php';
$TourOp = new TourOperator();
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
        <a href="../Tour_Operator/newTourOperator.php"><button class="btn blue">Add a Tour Operator</button></a><br>
        <?php foreach($admins as $admin){?>
          <div class="card">
            <div class="card-content">
              <h5 class="float left"><?= $admin['name']?></h5><p class="float right">Grade : <?= $admin['grade'] ?>/5</p><br>
              <br>

              <form action="./Tour_Operator/editTO.php?id_to=<?=$admin['id_to']?>" class="float right form-editTO" method="post">
                <input type="hidden" name="id_to" value="<?=$admin['id_to']?>">
                <a href=""><button class="btn green waves-effect white-text waves-green btn-flat right" name="submitTOedit" type="submit">Edit</button></a>
              </form>

              <form action="./delete.php" method="post">
                <input type="hidden" name="id_to" value="<?=$admin['id_to']?>">
                <button class="btn waves-effect white-text waves-red btn-flat red right " name="submitTO" type="submit">Delete</button><br>
              </form>

            </div>
          </div>
        <?php } ?>
     </div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../assets/JS/script.js"></script>