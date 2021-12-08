<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
    <link rel="stylesheet" href="css/style.css">
  </head>
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <?php
            if(isset($_SESSION['email'])){
              echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
            }else{
           ?>
          <li><a href="connexion.php">Connexion</a></li>
        <?php } ?>
        </ul>
      </nav>
    </header>
</html>
