<?php
session_start();

include './classes/Manager.php';
$manager = new Manager();


if(isset($_POST['formConnect'])){
    $mailConnect = $_POST['mailConnect'];
    $passwordConnect = $_POST['passwordConnect'];
    if(!empty($mailConnect) && !empty($passwordConnect)) {
        $reqAdmin = $manager->bdd->prepare('SELECT * FROM admin WHERE mail = ? AND password = ?');
        $reqAdmin->execute(array($mailConnect, $passwordConnect));
        $adminExist = $reqAdmin->rowCount();
        if($adminExist == 1){
            $adminInfo = $reqAdmin->fetch();
            $_SESSION['id_admin'] = $adminInfo['id'];
            header('Location:  /admin.php?id_admin='. $_SESSION['id_admin']);
        }else{
            $erreur = 'Wrong mail or password';
        }
    }else {
        $erreur = 'All fields must be completed.';
    }
    
};

include './partials/header.php';
include './partials/nav_disconnet.php'
?>

<body>

    <section class="container row register">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h1 class="appname white-text">Login</h1>
            <br><br><br>
            <form action="" method="post">
                <label for="mailConnect">Mail :</label>
                <input type="email" name="mailConnect" value="<?php if(isset($mailConnect)) { echo $mailConnect; }?>"><br>
                <label for="password">Password :</label>
                <input type="password" name="passwordConnect"><br>
                <label for="register">Haven't an account ? </label>
                    <a href="/register.php">Register!</a>
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
