<?php require_once "app/core/config.php"; ?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?=$this->view_data['title']?></title>
		
		<base href="<?=WEB_ROOT."/"?>">
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,inital-scale=1">

		<link rel="shortcut icon" href="layout/assets/img/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="layout/libs/css/w3.css">
		<link rel="stylesheet" href="layout/libs/css/fontawesome.css">
		<link rel="stylesheet" href="layout/assets/css/dist/style.min.css">

		<script type="text/javascript" src="layout/libs/js/jquery.min.js"></script>
	</head>
	
	<body>
		<div class="w3-display-container" style="margin-top:200px">			
			<div class="w3-display-topmiddle w3-center">
				<h1 class="w3-xxlarge"><i class="fa fa-user"></i> Inscription</h1>
				
				<form id="register_form">
					<input class="w3-input w3-border w3-section" type="text" name="username" id="username" maxlength="20" autofocus="autofocus" placeholder="Nom d'utilisateur" required="required">
					<input class="w3-input w3-border w3-section" type="email" name="email" id="email" maxlength="50" placeholder="Email" required="required">
					<input class="w3-input w3-border w3-section" type="password" name="password" id="password" maxlength="20" placeholder="Mot de passe" required="required">
					<button type="submit" class="w3-button"><i class="fa fa-sign-in"></i> S'inscrire</button>
				</form>
			</div>
		</div>

		<script type="text/javascript" src="layout/assets/js/script.js"></script>
	</body>
</html>
