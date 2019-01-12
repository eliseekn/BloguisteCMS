<?php 
require_once "app/core/config.php"; 
require_once "app/libs/session.php";
?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?=$this->view_data['title']?></title>
		
		<base href="<?="/". WEB_ROOT."/"?>">
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<link rel="icon" href="public/assets/img/favicon.ico">

		<link rel="stylesheet" href="public/libs/css/w3.css">
		<link rel="stylesheet" href="public/libs/css/fontawesome.min.css">
		<link rel="stylesheet" href="public/assets/css/dist/style.min.css">
		
		<script type="text/javascript" src="public/libs/js/jquery.min.js"></script>
	</head>
	
	<body>
		<!--barre de navigation-->
		<div class="w3-bar w3-top w3-blue-grey menu_bar">
			<span class="w3-left w3-bar-item"><?=WEB_TITLE?></span>
			<span class="w3-right">
				<a href="home/index" class="w3-bar-item"><i class="fa fa-home"></i> Accueil</a>
				<?php 
					SESSION::start();
					if (SESSION::item_exists("user")) {
						$user = SESSION::get_item("user");
				?>
				<?php if ($user->privileges == "admin") { ?>
				<a href="dashboard/posts" class="w3-bar-item"><i class="fa fa-cogs"></i> Tableau de bord</a>
				<?php } ?>
				<a href="users/logout" class="w3-bar-item"><i class="fa fa-sign-out"></i> Déconnexion</a>
				<?php } else { ?>
				<a href="users/index" class="w3-bar-item"><i class="fa fa-sign-in"></i> Connexion</a>
				<?php } ?>
			</span>
		</div>
		
		<div class="w3-content">		
			<div class="w3-container w3-center w3-padding-64">
				<h1 class="w3-xxxlarge"><span class="w3-tag"><?=WEB_TITLE?></span></h1>
			</div>
