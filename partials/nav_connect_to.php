<nav>
    <div class="nav-wrapper">
      <a href="../index.php" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../allTO.php">Tour Operators</a></li>
        <li><a href="../allDestinations.php">Destinations</a></li>
        <li><a href="../toPage.php?id_to=<?=$_SESSION['id_to']?>">Profile</a></li>
        <li><a href="./logout.php">Disconnect<a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
        <li><a href="../allTO.php">Tour Operators</a></li>
        <li><a href="../allDestinations.php">Destinations</a></li>
        <li><a href="../admin.php?id_admin=<?=$_SESSION['id_to']?>"><?=$_SESSION['name']?></a></li>
        <li><a href="./logout.php"><button class="btn red">Disconnect</button></a></li>
  </ul>