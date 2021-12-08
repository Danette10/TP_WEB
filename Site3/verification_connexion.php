<?php

 include ('includes/db.php');
 if (isset($_POST['submit']) && !empty($_POST['submit'])) {
   $pseudo = $_POST['pseudo'];

   $query = $db->prepare("SELECT pseudo,email,password FROM users WHERE id");
   $query->execute();
   $result = $query->fetchAll();

   foreach($result as $select){
     $password = password_verify($_POST['password'], $select['password']);
     if (isset($select['pseudo']) && !empty($select['pseudo']) && $pseudo == $select['pseudo'] && $password) {
         session_start();
         $_SESSION['pseudo'] = $pseudo;
         setcookie('username',$pseudo,time() + 24*3600);
         header('location: index.php?message=Vous etes connecté !');

       }else {
         header('location: connexion.php?message=identifiants incorrects');

       }
     }
   }else {
     header('location: connexion.php?message=Remplir les deux champs !');
   }

  ?>
