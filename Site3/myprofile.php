<?php
session_start();

include ('includes/db.php');



?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mon profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <?php include('includes/header.php'); ?>
  <body>

    <?php

    $query = $db->prepare("SELECT pseudo,email,password, images FROM users WHERE id");
    $query->execute();
    $result = $query->fetchAll();
    foreach($result as $select){
      echo '<p>Votre email: ' . $select['email'] . '</p>';
      echo '<p>Votre pseudo: ' . $select['pseudo'] . '</p>';
      echo '<img class="card-img-top profile" src="uploads/' . $select['images'] . '" alt="avatar" height="300" style="width: 500px !important;margin-left: 15px;">';

    }
    ?>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
