<?php require_once "app/core/config.php"; ?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?=$this->view_data['title']?></title>
		
		<base href="<?=WEB_ROOT."/"?>">
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,inital-scale=1">
	</head>
	
	<body>
		<h1 style="text-align:center;font-size:40px">Error 404: <i>Page not found</i></h1>
		<br>
		<hr style="width:200px">
		<p style="text-align:center">La page que vous avez demandez est introuvable sur le serveur.</p>
		<p style="text-align:center"><a href="home">Revenir à l'accueil</a></p>
	</body>
</html>
