<?php
session_start();
include ('includes/db.php');

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$id = htmlspecialchars($_GET['id']);
// Change image
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
  		// Vérifier le type de fichier
  		$acceptable = [
  			'image/jpeg',
  			'image/png',
  		];

  		if(!in_array($_FILES['image']['type'], $acceptable)){
  			// Rediriger vers inscription.php avec un message d'erreur
  			header('location: change_profile.php?message=Type de fichier incorrect.');
  			exit;
  		}


  		// Vérifier le poids du fichier
  		$maxSize = 2 * 1024 * 1024;  //2Mo

  		if($_FILES['image']['size'] > $maxSize){
  			// Rediriger vers inscription.php avec un message d'erreur
  			header('location: change_profile.php?message=Ce fichier est trop lourd.');
  			exit;
  		}


  		$path = 'uploads';

  		if(!file_exists($path)){
  			mkdir($path, 777);
  		}

  		$filename = $_FILES['image']['name'];

  		$array = explode('.', $filename);
  		$ext = end($array);

  		$filename = 'image-' . time() . '.' . $ext;

  		$destination = $path . '/' . $filename;
      move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      $delCurrentImage = $db->prepare('UPDATE users SET images = " " WHERE id = :id');
      $delCurrentImage->execute([
        'id' => $id
      ]);

      $updateImage = $db->prepare("UPDATE users SET images = :images WHERE id = :id");
      $updateImage->execute([
        'images' => $filename,
        'id' => $id
      ]);
        // End change image
  }
  if (isset($pseudo) && !empty($pseudo)) {
      $updateUser = $db->prepare("UPDATE users SET pseudo = :pseudo WHERE id = :id");
      $updateUser->execute([
        'pseudo' => $pseudo,
        'id' => $id
      ]);
    }
  if (isset($email) && !empty($email)) {
      $updateEmail = $db->prepare("UPDATE users SET email = :email WHERE id = :id");
      $updateEmail->execute([
        'email' => $email,
        'id' => $id
      ]);
    }
  header('location: users.php');
  exit;


 ?>
