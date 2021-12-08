<?php
include ('includes/db.php');
session_start();
$username = $_POST['pseudo'];
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($email) && isset($password) && isset($username) && !empty($email) && !empty($password) && !empty($username)){


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $query = $db->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $result = $query->fetch();
    if ($result) {
      header('location: inscription.php?message=Email déjà utilisé !');
      exit;

    }else {
      if (strlen($password) >= 6 && strlen($password) <= 12) {


  // Vérifier si fichier envoyé
  if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

  		// Vérifier le type de fichier
  		$acceptable = [
  			'image/jpeg',
  			'image/png',
  			'image/gif',
  		];




  		// Vérifier le poids du fichier
  		$maxSize = 2 * 1024 * 1024;  //2Mo



  		// Enregistrer le fichier sur le serveur


  		// Chemin d'enregistrement
  		$path = 'uploads/';

  		// Vérifier que le dossier uploads existe, sinon le créer
  		if(!file_exists($path)){
  			mkdir($path, 777);
  		}

  		$filename = $_FILES['image']['name'];

  		// Créer un nom de fichier à partir de la date (timestamp)
  		// image-1613985411.ext
  		// Attention : deux fichiers uploadés dans la même seconde auront le même nom !!

  		// Récupérer l'extension du fichier
  		$array = explode('.', $filename);
  		$ext = end($array); // extension du fichier

  		$filename = 'image-' . time() . '.' . $ext;


  		// Déplacer le fichier vers son emplacement définitif (le dossier uploads)
  		$destination = $path . '/' . $filename;
  		move_uploaded_file($_FILES['image']['tmp_name'], $destination);

  }
        // Fin traitement image

        $insert = $db->prepare('INSERT INTO users (pseudo,email,password, images) VALUES (:pseudo, :email, :password, :images)');
        $insert->execute([
          'pseudo' => $username,
          'email' => $email,
          'password' => password_hash($password, PASSWORD_DEFAULT),
          'images' => $filename
        ]);



        header('location: index.php?message=Compte créé avec succès');
        exit;
      }else {
        header('location: inscription.php?message=Le mot de passe n\'est pas compris entre 6 et 12 caractères !');
        exit;
      }
    }
   }else{
     header('location: inscription.php?message=L\'adresse e-mail n\'est pas valide');
     exit;
 }
}else {
  header('location: inscription.php?message=Erreur dans l\'inscription');
  exit;
}


?>
