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
				<h1 class="w3-xxlarge"><i class="fa fa-user"></i> Inscription</h1>
				
				<form action="users/register" method="post">
					<input class="w3-input w3-border w3-section" type="text" name="username" maxlength="20" autofocus="autofocus" placeholder="Nom d'utilisateur" required="required" />
					<input class="w3-input w3-border w3-section" type="email" name="email" maxlength="255" placeholder="Email" required="required" />
					<input class="w3-input w3-border w3-section" type="password" name="password" maxlength="10" placeholder="Mot de passe" required="required" />
					<button type="submit" class="w3-button">S'inscrire</button>
				</form>
			</div>
		</div>
	</body>
</html>
