<nav>
    <div class="nav-wrapper to">
      <a href="../index.php" class="brand-logo">ComparOperator</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../Tour_Operator/allTO.php">Tour Operators</a></li>
        <li><a href="../Destination/allDestinations.php">Destinations</a></li>
        <li><a href="../admin.php?id_admin=<?=$_SESSION['id_admin']?>">Admin</a></li>
        <li><a href="../logout.php">Disconnect</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
        <li><a href="../Tour_Operator/allTO.php">Tour Operators</a></li>
        <li><a href="../Destination/allDestinations.php">Destinations</a></li>
        <li><a href="../admin.php?id_admin=<?=$_SESSION['id_admin']?>">Admin</a></li>
        <li><a href="../logout.php"><button class="btn red">Disconnect</button></a></li>
  </ul>