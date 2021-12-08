<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="inscription.php">Inscription</a></li>
      <?php
        if(isset($_SESSION['pseudo'])){
          echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
          echo '<li><a href="myprofile.php">Mon Profile</a></li>';
        }else{
       ?>
      <li><a href="connexion.php">Connexion</a></li>
    <?php } ?>
    </ul>
  </nav>
</header>
