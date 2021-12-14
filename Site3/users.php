<?php
session_start();
include ('includes/db.php');

if (isset($_SESSION['pseudo'])) {


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
      margin: 1em;
      text-align: center;
    }
    table{
      width: 100%;
      border: 2px;
    }
    th{
      background-color: lightgrey;
    }
    a{
      text-decoration: none;
      color: black;
    }
    a:hover{
      color: black;
      border-bottom: 2px solid purple;
      animation: fade 0.2s linear;
    }
    @keyframes fade {
      from{
        opacity: 0;
      }
      to{
        opacity: 1;
      }
    }
    </style>
  </head>
  <body>
    <?php include('includes/header.php'); ?>

    <table class="table table-bordered border-dark">
      <tr>
        <th>Id</th>
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
        <td><?= $select['id'] ?></td>
        <td><?= $select['pseudo'] ?></td>
        <td><?= $select['email'] ?></td>
        <td>
          <a href="read.php?id=<?= $select['id'] ?>" target="_blank">Consulter</a><br>
          <a href="update.php?id=<?= $select['id'] ?>" target="_blank">Modifier</a><br>
          <a href="delete.php?id=<?= $select['id'] ?>" target="_blank">Supprimer</a>
        </td>
      </tr>
    <?php } ?>
    </table>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
<?php }else {
  header('location: index.php');
  exit;
} ?>
