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
		<script type="text/javascript" src="layout/libs/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="layout/libs/ckeditor/translations/fr.js"></script>
	</head>

	<body>
		<div class="w3-sidebar w3-bar-block w3-container w3-card" style="width:20%;border-radius:0px">
			<h3><span class="w3-tag"><?= WEB_TITLE ?></span></h3>

			<div class="w3-container">
				<a href="dashboard/posts" class="w3-bar-item w3-button"><i class="fas fa-clone"></i> Articles</a>
				<a href="dashboard/comments" class="w3-bar-item w3-button"><i class="fas fa-comments"></i> Commentaires</a>
				<a href="dashboard/tags" class="w3-bar-item w3-button"><i class="fas fa-bookmark"></i> Tags</a>
				<a href="dashboard/users" class="w3-bar-item w3-button"><i class="fas fa-users"></i> Utilisateurs</a>
				<a href="dashboard/settings" class="w3-bar-item w3-button"><i class="fas fa-cog"></i> Paramètres</a>
				<hr>
				<a href="home/index" class="w3-bar-item w3-button" target="_blank"><i class="fas fa-eye"></i> Voir le blog</a>
				<hr>
				<a href="users/logout" class="w3-bar-item w3-button"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
			</div>
		</div>

		<div style="margin-left:20%">
			<div class="w3-container w3-center w3-padding-64">
				<h1 class="w3-xxxlarge">
					<span class="w3-tag">Tableau de bord</span>
				</h1>

				<br>

				<?php
					if ($view == "posts") {
						include_once "templates/posts.php";
					} elseif ($view == "comments") {
						include_once "templates/comments.php";
					} elseif ($view == "tags") {
						include_once "templates/tags.php";
					} elseif ($view == "users") {
						include_once "templates/users.php";
					} elseif ($view == "add_post") {
						include_once "templates/add_post.php";
					} elseif ($view == "edit_post") {
						include_once "templates/edit_post.php";
					} elseif ($view == "settings") {
						include_once "templates/settings.php";
					}
				?>
		</div>

		<script type="text/javascript" src="layout/assets/js/dist/script.min.js"></script>
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
