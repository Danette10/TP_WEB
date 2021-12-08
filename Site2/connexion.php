<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <form class="" action="verification.php" method="post">
      <input type="email" name="email" placeholder="Entrer votre email"><br>

      <input type="password" name="password" placeholder="Entrer votre mot de passe"><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if(isset($_GET['message']) && $_GET['message'] == 'identifiants incorrects'){
      echo "<div class='alert alert-danger' role='alert'>". $_GET['message'] . "</div>";
    }


    ?>


    <?php include('includes/footer.php'); ?>
  </body>
</html>
