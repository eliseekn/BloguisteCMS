<!DOCTYPE html>

<html lang="fr">
	<head>
		<title><?=$title?></title>

		<meta charset="utf-8">
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
				<h1 class="w3-xxlarge"><i class="fas fa-cogs"></i> Installation</h1>
                <div class="w3-container">
                    <form id="install_form">
                        <div class="w3-bar w3-blue-grey menu_bar" style="border-radius:12px;">
                            <a class="w3-bar-item w3-button" id="blog_button">Blog</a>
                            <a class="w3-bar-item w3-button" id="admin_button">Administration</a>
                            <a class="w3-bar-item w3-button" id="database_button">Base de données</a>
                        </div>

                        <div id="blog" class="w3-container w3-padding">
                            <label>Titre du blog</label>
                            <input class="w3-input w3-border w3-section" type="text" name="web_title" id="web_title" maxlength="255" autofocus="autofocus" required="required" value="Mon Blog">
							<label>Nom du dossier racine</label>
                            <input class="w3-input w3-border w3-section" type="text" name="web_root" id="web_root" maxlength="255" required="required" value="bloguistecms">
                            <label>Description du blog</label>
                            <textarea class="w3-input w3-border w3-section" name="web_description" id="web_description" maxlength="255" required="required" cols="6" rows="4">Description de mon blog</textarea>
                        </div>

                        <div id="admin" class="w3-container w3-padding" style="display:none">
                            <label>Nom d'utilisateur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="admin_username" id="admin_username" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="admin_password" id="admin_password" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Confirmer le mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="admin_password_true" id="admin_password_true" maxlength="255" autofocus="autofocus" required="required" value="admin">
                            <label>Adresse e-mail</label>
                            <input class="w3-input w3-border w3-section" type="email" name="admin_email" id="admin_email" maxlength="255" autofocus="autofocus" required="required" value="admin@mail.com">
                        </div>

                        <div id="database" class="w3-container w3-padding" style="display:none">
                            <label>Adresse du serveur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_host" id="db_host" maxlength="255" autofocus="autofocus" required="required" value="localhost">
                            <label>Nom d'utilisateur</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_username" id="db_username" maxlength="255" required="required" value="root">
                            <label>Mot de passe</label>
                            <input class="w3-input w3-border w3-section" type="password" name="db_password" id="db_password" maxlength="255" value="">
                            <label>Nom de la base données</label>
                            <input class="w3-input w3-border w3-section" type="text" name="db_name" id="db_name" maxlength="255" autofocus="autofocus" required="required" value="bloguistecms">
                        </div>

                        <input type="submit" class="w3-button w3-margin-bottom" id="install_button" value="Procéder à l'installation">
                    </form>
                </div>
			</div>
		</div>

		<script type="text/javascript" src="layout/assets/js/dist/script.min.js"></script>
	</body>
</html>
