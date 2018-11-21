<?php require_once "app/core/config.php"; ?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title><?=$this->view_data['title']?></title>
		
		<base href="<?=WEB_ROOT."/"?>" />
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,inital-scale=1" />
		
		<link rel="stylesheet" href="layout/libs/css/w3.css" />
		<link rel="stylesheet" href="layout/libs/css/fontawesome.css" />
	</head>
	
	<body>
		<div class="w3-display-container" style="margin-top:200px">			
			<div class="w3-display-topmiddle w3-center">
				<h1 class="w3-xxlarge"><i class="fa fa-user"></i> Connexion</h1>
				
				<form action="users/login" method="post">
					<input class="w3-input w3-border w3-section" type="text" name="username" maxlength="50" autofocus="autofocus" placeholder="Nom d'utilisateur" required="required" />
					<input class="w3-input w3-border w3-section" type="password" name="password" maxlength="10" placeholder="Mot de passe" required="required" />
					<button type="submit" class="w3-button">Se connecter</button>
				</form>

				<div class="w3-container">
					Pas de compte? <a href="users/index/register" class="w3-bar-item w3-button">Inscrivez-vous</a>
				</div>
			</div>
		</div>
	</body>
</html>
