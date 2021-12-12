<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul>
      <?php
      function ActivePage($href) {
        $replace = str_replace('/Site3/','',$_SERVER['REQUEST_URI']);
  if (strpos($replace, $href) === 0) {
    return ' active';
  }else if(!$replace && $href == 'index.php') {
    return ' active';
  }
} ?>
<li><a href="index.php" class="header<?php echo ActivePage('index.php'); ?>">Accueil</a></li>


      <?php
        if(isset($_SESSION['pseudo'])){?>
          <li><a href="deconnexion.php">Déconnexion</a></li>
          <li><a href="myprofile.php" class="header<?php echo ActivePage('myprofile.php'); ?>">Mon Profile</a></li>
        <?php }else{ ?>
      <li><a href="inscription.php" class="header<?php echo ActivePage('inscription.php'); ?>">Inscription</a></li>
      <li><a href="connexion.php" class="header<?php echo ActivePage('connexion.php'); ?>">Connexion</a></li>
    <?php } ?>
    </ul>
  </nav>
</header>
