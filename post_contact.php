<?php

$errors = [];

if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
      $errors['name'] = "vous n'avez pas renseigné votre nom";
}

if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "vous n'avez pas renseigné un email valide";
}

if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
      $errors['message'] = "vous n'avez pas renseigné votre message";
}

if(!empty($errors)){
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: index.php');
}else{

  $message = $_POST['message'];
  $headers = 'FROM: fugetsuu@gmail.com';
  mail('carlrousseau1@gmail.com', 'Formulaire de contact', $message, $headers);

}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= isset($title) ? $title : 'PORTFOLIO';?></title>
		<!-- CSS Vendor -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/font-awesome.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" />
		<!-- CSS Perso -->
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/base.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?= WEBROOT; ?>css/style.css" media="all" />

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>

<div class="alert alert-success" role="alert">
  Votre message à été envoyé
</div>

</body>
</html>
