<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <?php include('includes/header.php'); ?>
  <body>
    <form action="verification_connexion.php" method="post">
      <input type="text" name="pseudo" class="form-control" placeholder="Saisir votre pseudo" value="<?= isset($_COOKIE['username'])? $_COOKIE['username']: ""; ?>"><br>
      <input type="password" name="password" class="form-control" placeholder="Saisir votre mot de passe"><br>
      <input type="submit" class="btn btn-secondary" name="submit" value="Connexion">
    </form>

    <?php
    if (isset($_GET['message']) && !empty($_GET['message'])) {
      echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }
     ?>
  </body>
  <?php include('includes/footer.php'); ?>
</html>
