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
		<nav class="w3-bar w3-top w3-blue-grey menu_bar">
			<span class="w3-left w3-bar-item"><?=WEB_TITLE?></span>
			<span class="w3-right">
				<a href="home/index" class="w3-bar-item">
					<i class="fas fa-home"></i> Accueil
				</a>
				<?php
					SESSION::start();
					if (SESSION::exists("user")) {
						$user = SESSION::get("user");
				?>
				<?php if ($user->privileges == "admin") { ?>
				<a href="dashboard/posts" class="w3-bar-item">
					<i class="fas fa-cogs"></i> Tableau de bord
				</a>
				<?php } ?>
				<a href="users/logout" class="w3-bar-item">
					<i class="fas fa-sign-out-alt"></i> Déconnexion
				</a>
				<?php } else { ?>
				<a href="users/index" class="w3-bar-item">
					<i class="fas fa-sign-in-alt"></i> Connexion
				</a>
				<?php } ?>
			</span>
		</nav>

		<div class="w3-content">
			<div class="w3-center" style="padding:128px 16px">
				<h1 class="w3-xxxlarge">
					<span class="w3-tag"><?=WEB_TITLE?></span>
				</h1>

				<h4><?=WEB_DESCRIPTION?></h4>
			</div>
