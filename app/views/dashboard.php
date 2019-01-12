<?php require_once "app/core/config.php"; ?>

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
		<script type="text/javascript" src="public/libs/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="public/libs/ckeditor/translations/fr.js"></script>
	</head>
	
	<body>
		<div class="w3-sidebar w3-bar-block w3-container w3-card" style="width:20%;border-radius:0px">
			<h3><span class="w3-tag"><?= WEB_TITLE ?></span></h3>
			
			<div class="w3-container">
				<a href="dashboard/posts" class="w3-bar-item w3-button"><i class="fa fa-clone"></i> Articles</a>
				<a href="dashboard/comments" class="w3-bar-item w3-button"><i class="fa fa-comments"></i> Commentaires</a>
				<a href="dashboard/tags" class="w3-bar-item w3-button"><i class="fa fa-bookmark"></i> Tags</a>
				<a href="dashboard/users" class="w3-bar-item w3-button"><i class="fa fa-users"></i> Utilisateurs</a>
				<a href="dashboard/settings" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> Réglages</a>
				<hr>
				<a href="home/index" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-eye"></i> Voir le blog</a>
				<hr>
				<a href="users/logout" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Déconnexion</a>
			</div>
		</div>
		
		<div style="margin-left:20%">
			<div class="w3-display-container w3-center w3-padding-64">
				<h1 class="w3-xxxlarge"><span class="w3-tag"><i class="fa fa-cogs"></i> Tableau de bord</span></h1>
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
				} else if ($this->view_data['action'] == "settings") {
					include_once "templates/settings.php";
				}
				?>
		</div>

		<script type="text/javascript" src="public/assets/js/dist/script.min.js"></script>

		<!-- paramétrage de l'éditeur de texte -->
		<script>
			ClassicEditor
				.create(document.querySelector("#editor"), {
					language: "fr",
					toolbar: ["heading", "|", "bold", "italic", "blockQuote", "bulletedList", "numberedList", "link", "|", "undo", "redo"]
				})
				.then(editor => {
					window.editor = editor;
				})
				.catch(error => {
					console.log(error);
				});
		</script>
	</body>
</html>
