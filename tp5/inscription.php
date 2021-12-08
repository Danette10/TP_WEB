<?php
  $username = $_GET['username'];
  $password = $_GET['password'];
  if ($username == 'admin' && $password == 'PHP') {
    echo "<p>Bonjour vous etes connecté !</p>";
  }else{
    echo "
    <div class='alert alert-warning' role='alert'>
      Identifiants inconnus !
    </div>

    ";
    header('Refresh: 5;url=index.php');
  }
 ?>
