<?php
session_start();
include ('includes/db.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consultation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style media="screen">
    @import url('https://fonts.googleapis.com/css2?family=Inconsolata&display=swap');
    *{
      font-family: 'Inconsolata', monospace;
    }
    .monProfile{
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    li{
      list-style: none;
      padding-right: 15px;
      padding-top: 10px;
    }
    ul{
      display: flex;
      flex-direction: row;

    }
    nav{
      display: flex;
      flex-direction: row;
      justify-content: center;
      background-color: lightgrey;

    }
    nav a{
      text-decoration: none;
      color: black;

    }
    nav a:hover{
      border-bottom: 3px solid purple;
      color: black;
      animation: fade 0.2s linear;
    }
    .active{
      border-bottom: 3px solid purple;
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
    <div class="monProfile">


    <?php
    $query = $db->prepare("SELECT pseudo,email,password, images FROM users WHERE id = :id");
    $query->execute([
      'id' => $_GET['id']
    ]);
    $result = $query->fetchAll();

    foreach($result as $select){

      echo '<p>Email: ' . $select['email'] . '</p>';
      echo '<p>Pseudo: ' . $select['pseudo'] . '</p>';
      if ($select['images'] == NULL || $select['images'] == " ") {
        echo '<img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/2048px-OOjs_UI_icon_userAvatar.svg.png" alt="avatar" height="300" style="width: 300px !important;margin-left: 15px;">';
      }else{
      echo '<img class="card-img-top" src="uploads/' . $select['images'] . '" alt="avatar" height="300" style="width: 500px !important;margin-left: 15px;">';
    }


    }

     ?>
     </div>

    <?php include('includes/footer.php'); ?>
  </body>
</html>
