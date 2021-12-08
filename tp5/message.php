<?php
  $message = htmlspecialchars($_GET['message']);
  if(isset($message) && !empty($message)){
    echo "<p>Votre message est : $message</p>";
  }else {
    echo "<p>Le champ message est vide !</p>";
  }


 ?>
