<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <main>
      <div class="containeur">
      <?php
      if(isset($_SESSION['email'])){
        echo "
        <div class='alert alert-success' role='alert' style='width:100vw;'>Vous etes connectés !</div>
        ";
      }else {
        echo "<p style='color:black;'>Connextez vous</p>";
      }
       ?>
     </div>
    </main>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
