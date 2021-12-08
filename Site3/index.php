<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site 3</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
    <?php include('includes/header.php'); ?>

  <body>
    <?php
    if (isset($_GET['message']) && !empty($_GET['message'])) {
      echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }

     ?>
     <h1>TP: Connexion et inscription dans une bdd</h1>
  </body>

    <?php include('includes/footer.php'); ?>
</html>
