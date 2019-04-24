<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?=$title?></title>

		<base href="<?="/". WEB_ROOT ."/"?>">

		<meta charset="utf-8">
		<meta name="description" content="<?=WEB_DESCRIPTION?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="layout/assets/img/favicon.ico">

		<link rel="stylesheet" href="layout/libs/css/w3.css">
		<link rel="stylesheet" href="layout/libs/css/fontawesome-all.min.css">
		<link rel="stylesheet" href="layout/assets/css/dist/style.min.css">

		<script type="text/javascript" src="layout/libs/js/jquery.min.js"></script>
	</head>

	<body>
		<div class="w3-display-container" style="width:100vw;height:100vh;">
			<div class="w3-display-middle w3-center w3-card">
				<h1 class="w3-xxlarge"><i class="fas fa-user"></i> Connexion</h1>
				<div class="w3-container">
					<form id="login_form">
						<input class="w3-input w3-border w3-section" type="text" name="username" id="username" maxlength="20" autofocus="autofocus" placeholder="Nom d'utilisateur" required="required">
						<input class="w3-input w3-border w3-section" type="password" name="password" id="password" maxlength="20" placeholder="Mot de passe" required="required">
						<button type="submit" class="w3-button"><i class="fas fa-sign-in"></i> Se connecter</button>
					</form>

					<div class="w3-container w3-margin">
						Pas de compte? <a href="users/index/register" class="w3-bar-item w3-button">Inscrivez-vous ici</a>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="layout/assets/js/dist/script.min.js"></script>
	</body>
</html>
