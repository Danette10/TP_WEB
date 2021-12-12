<?php
session_start();
include ('includes/db.php');
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style media="screen">
    th, td{
      border: solid 1px black;
      margin: 1em;
      text-align: center;
    }
    table{
      width: 100%;
      border: 2px;
      border-collapse: collapse;
    }
    th{
      background-color: lightgrey;
    }
    </style>
  </head>
  <body>
    <?php include('includes/header.php'); ?>

    <table>
      <tr>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
      <?php
      $query = $db->prepare('SELECT * FROM users WHERE pseudo != "admin"');
      $query->execute();
      $result = $query->fetchAll();
      foreach($result as $select){
       ?>
      <tr>
        <td><?= $select['pseudo'] ?></td>
        <td><?= $select['email'] ?></td>
        <td><a href="read.php" target="_blank">Consulter</a><br><a href="update.php" target="_blank">Modifier</a><br><a href="delete.php" target="_blank">Supprimer</a></td>
      </tr>
    <?php } ?>
    </table>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
