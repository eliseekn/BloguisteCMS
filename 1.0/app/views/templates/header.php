<?php 
require_once "app/core/config.php"; 
require_once "app/libs/session.php";
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<title><?=$this->view_data['title']?></title>
		
		<base href="<?=WEB_ROOT."/"?>" />
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,inital-scale=1" />

		<link rel="shortcut icon" href="layout/assets/img/favicon.ico" type="image/x-icon">
		
		<link rel="stylesheet" href="layout/libs/css/w3.css" />
		<link rel="stylesheet" href="layout/libs/css/fontawesome.css" />

		<link rel="stylesheet" href="layout/assets/css/dist/style.min.css" />
	</head>
	
	<body>
		<!--barre de navigation-->
		<div class="w3-bar w3-top w3-blue-grey menu_bar">
			<span class="w3-left w3-bar-item"><?=WEB_TITLE?></span>
			<?php 
			SESSION::start();
			if (SESSION::item_exists("user")) {
				$user = SESSION::get_item("user");
			?>
			<a href="users/logout" class="w3-right w3-bar-item">Déconnexion</a>
				<?php if ($user->privileges == "admin") { ?>
				<a href="dashboard/posts" class="w3-right w3-bar-item">Tableau de bord</a>
				<?php } ?>
			<?php } else { ?>
				<a href="users/index" class="w3-right w3-bar-item">Connexion</a>
			<?php } ?>
			<a href="home/index" class="w3-right w3-bar-item">Accueil</a>
		</div>
		
		<div class="w3-content">		
			<div class="w3-container w3-center w3-padding-64">
				<h1 class="w3-xxxlarge"><span class="w3-tag"><?=WEB_TITLE?></span></h1>
			</div>
