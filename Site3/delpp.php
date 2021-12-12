<?php
session_start();
include ('includes/db.php');
$id = $_SESSION['id'];
$delCurrentImage = $db->prepare('UPDATE users SET images = NULL WHERE id = :id');
$delCurrentImage->execute([
  'id' => $id
]);
header('location: myprofile.php');
exit;


 ?>
