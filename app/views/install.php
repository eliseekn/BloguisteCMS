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
	</head>
	
	<body>
		<div class="w3-display-container" style="margin-top:200px">			
			<div class="w3-display-topmiddle w3-center menu_bar">
				<h1 class="w3-xxlarge"><i class="fa fa-cogs"></i> Installation</h1>
                <div class=" w3-card w3-container w3-padding">
                    <form id="install_form">
                        <div class="w3-bar w3-blue-grey" style="border-radius: 12px;">
                            <a class="w3-bar-item w3-button" id="blog_button">Blog</a>
                            <a class="w3-bar-item w3-button" id="admin_button">Administration</a>
                            <a class="w3-bar-item w3-button" id="database_button">Base de données</a>
                        </div>

                        <div id="blog" class="config w3-container w3-section">
                            <label>Titre du blog</label>
                            <input class="w3-input w3-border w3-section" type="text" name="web_title" id="web_title" maxlength="255" autofocus="autofocus" required="required" value="Mon Blog">
                            <label>Nom du dossier racine</label>
                            <input class="w3-input w3-border w3-section" type="text" name="web_root" id="web_root" maxlength="255" autofocus="autofocus" required="required" value="bloguistecms">
                        </div>

                        <div id="admin" class="config w3-container w3-section" style="display:none">
                            <label>Nom d'utilisateur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="admin_username" id="admin_username" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="admin_password" id="admin_password" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Confirmer le mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="admin_password_true" id="admin_password_true" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Adresse email</label>
                            <input class="w3-input w3-border w3-section" type="email" name="admin_email" id="admin_email" maxlength="255" autofocus="autofocus" required="required" value="admin@mail.com">
                        </div>

                        <div id="database" class="config w3-container w3-section" style="display:none">
                            <label>Adresse du serveur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_host" id="db_host" maxlength="255" autofocus="autofocus" required="required" value="localhost">
                            <label>Nom d'utilisateur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_username" id="db_username" maxlength="255" required="required" value="root">
                            <label>Mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="db_password" id="db_password" maxlength="255" value="">
                            <label>Nom de la base données</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_name" id="db_name" maxlength="255" autofocus="autofocus" required="required" value="bloguistecms">
                        </div>

                        <input type="submit" class="w3-button w3-section" id="install_button" value="Procéder à l'installation">
                    </form>
                </div>
			</div>
		</div>

		<script type="text/javascript" src="public/assets/js/dist/script.min.js"></script>
	</body>
</html>
