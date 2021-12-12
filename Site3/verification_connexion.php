<?php
session_start();
 include ('includes/db.php');

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
        header('location: index.php?message=Vous etes connecté !');
        exit;

      }else {
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
