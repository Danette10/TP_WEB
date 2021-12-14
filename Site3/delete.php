<?php
session_start();
include ('includes/db.php');


$deleteuser = $db->prepare("DELETE FROM users WHERE id = :id");
$deleteuser->execute([
  'id' => htmlspecialchars($_GET['id'])
]);

header('location: users.php');
 ?>
