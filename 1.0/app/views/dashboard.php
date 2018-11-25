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

		<link rel="stylesheet" href="layout/assets/css/dist/style.min.css" />
		
		<script type="text/javascript" src="layout/libs/js/jquery.min.js"></script>
	</head>
	
	<body>
		<div class="w3-sidebar w3-bar-block w3-container w3-card" style="width:15%">
			<h3><span class="w3-tag"><?= WEB_TITLE ?></span></h3>
			
			<div class="w3-container">
				<a href="dashboard/posts" class="w3-bar-item w3-button">Articles</a>
				<a href="dashboard/comments" class="w3-bar-item w3-button">Commentaires</a>
				<a href="dashboard/tags" class="w3-bar-item w3-button">Tags</a>
				<a href="dashboard/users" class="w3-bar-item w3-button">Utilisateurs</a>
				<hr>
				<a href="home/index" class="w3-bar-item w3-button" target="_blank">Voir le blog</a>
				<hr>
				<a href="users/logout" class="w3-bar-item w3-button">Déconnexion</a>
			</div>
		</div>
		
		<div style="margin-left:15%">
			<div class="w3-display-container w3-center w3-padding-64">
				<h1 class="w3-xxxlarge">Tableau de bord</h1>
				<br>
				<?php
				if ($this->view_data['action'] == "posts") {
					include_once "templates/posts.php";
				} else if ($this->view_data['action'] == "comments") {
					include_once "templates/comments.php";
				} else if ($this->view_data['action'] == "tags") {
					include_once "templates/tags.php";
				} else if ($this->view_data['action'] == "users") {
					include_once "templates/users.php";
				} else if ($this->view_data['action'] == "add_post") {
					include_once "templates/add_post.php";
				} else if ($this->view_data['action'] == "edit_post") {
					include_once "templates/edit_post.php";
				}
				?>
		</div>

		<script type="text/javascript" src="layout/assets/js/dist/script.min.js"></script>
	</body>
</html>
