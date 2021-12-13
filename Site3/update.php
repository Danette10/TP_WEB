<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modification</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <form action="verif_update.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
      <input type="text" name="pseudo" class="form-control" placeholder="Modifier votre pseudo"><br>
      <input type="email" name="email" class="form-control" placeholder="Modifier votre email"><br>
      <input type="file" class="form-control" name="image" accept="image/jpeg,image/png"><br>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
    <?php
    if (isset($_GET['message']) && !empty($_GET['message'])) {
      echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }

     ?>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
