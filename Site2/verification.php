<?php
  date_default_timezone_set('Europe/Paris');
  $email = $_POST['email'];
  $password = $_POST['password'];


  $date = date("Y-m-d H:i:s");

  if(empty($email) || empty($password)){
    header('location: connexion.php?message=Vous devez remplir les 2 champs');
  }

  if(!empty($email)){
    setcookie(time() - 3600);
  }
  if($email == 'admin@site.com' && $password == 'php123'){
    session_start();
    $log_succes = fopen('log_succes.txt', 'a+');
    fputs($log_succes, "Connexion reussi le ");
    fputs($log_succes, $date);
    fputs($log_succes, "\n");
    fclose($log_succes);
    $_SESSION['email'] = $email;
    header('location: index.php');

  }else{
    $log_errors = fopen('log_errors.txt', 'a+');
    fputs($log_errors, "Tentative de connexion le ");
    fputs($log_errors, $date);
    fputs($log_errors, "\n");
    fclose($log_errors);
    header('location: connexion.php?message=identifiants incorrects');
  }

 ?>
