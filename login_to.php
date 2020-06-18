<?php
session_start();

include './classes/Manager.php';
$manager = new Manager();


if(isset($_POST['formConnect'])){
    $toNameConnect = $_POST['toName'];
    if(!empty($toNameConnect)) {
        $reqTO = $manager->bdd->prepare('SELECT * FROM tour_operators WHERE name = ?');
        $reqTO->execute(array($toNameConnect));
        $TOexist = $reqTO->rowCount();
        if($TOexist == 1){
            $TOinfo = $reqTO->fetch();
            $_SESSION['id_to'] = $TOinfo['id'];
            $_SESSION['name'] = $toNameConnect;
            header('Location:  /toPage.php?id_to='. $_SESSION['id_to']);
        }else{
            $erreur = 'Wrong name of Tour Operator';
        }
    }else {
        $erreur = 'All fields must be completed';
    }
    
};

include './partials/header.php';
include './partials/nav_disconnet.php'
?>

<body>

    <section class="container row register">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h1 class="black-text">Login</h1>
            <br><br><br>
            <form action="" method="post">
                <label for="toName">Name Tour Operator :</label>
                <input type="text" name="toName" value="<?php if(isset($toNameConnect)) { echo $toNameConnect; }?>"><br>
                <label>Please contact admin to register ! </label>
                <button class="btn waves-effect waves-light red right" type="submit" name="formConnect">Login
                    <i class="material-icons right">chevron_right</i>
                </button>
            </form>
            <?php

                if(isset($erreur)){
                    echo '<font color="red">'.$erreur.'</font>';
                }
            ?>
        </div>
    </section>
