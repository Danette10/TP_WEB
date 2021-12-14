<?php
session_start();
 include ('includes/db.php');
 date_default_timezone_set('Europe/Paris');
 $date = date("Y-m-d H:i:s");

 if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

if (isset($pseudo) && !empty($pseudo) && isset($password) && !empty($password)) {

  $selectID = $db->prepare('SELECT id FROM users WHERE pseudo = :pseudo');
  $selectID->execute([
    'pseudo' => $pseudo
  ]);
  $result = $selectID->fetchAll();

  foreach($result as $id){
    $_SESSION['id'] = $id['id'];
  }
  if (empty($_SESSION['id'])) {
    header('location: connexion.php?message=Identifiant inconnus !');
    exit;
  }

  $query = $db->prepare("SELECT pseudo,email,password FROM users WHERE id = :id");
  $query->execute([
    'id' => $_SESSION['id']
  ]);
  $result = $query->fetchAll();



  foreach($result as $select){

    $password = password_verify($password, $select['password']);
    if (isset($select['pseudo']) && !empty($select['pseudo']) && $pseudo == $select['pseudo'] && $password) {


        $_SESSION['pseudo'] = $pseudo;
        setcookie('username',$pseudo,time() + 3600);
        $log_succes = fopen('log_succes.txt', 'a+');
        fputs($log_succes, "Connexion reussi le ");
        fputs($log_succes, $date);
        fputs($log_succes, " par ");
        fputs($log_succes, $pseudo);
        fputs($log_succes, "\n");
        fclose($log_succes);
        header('location: index.php?message=Vous etes connecté !');
        exit;

      }else {
        $log_errors = fopen('log_errors.txt', 'a+');
        fputs($log_errors, "Tentative de connexion le ");
        fputs($log_errors, $date);
        fputs($log_errors, "\n");
        fclose($log_errors);
        header('location: connexion.php?message=Identifiant incorrect !');
        exit;
      }
    }
}else {
  header('location: connexion.php?message=Remplir les deux champs !');
  exit;
}
}
  ?>
