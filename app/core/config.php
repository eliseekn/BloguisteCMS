<?php
//mode développement
define("DEBUG", false);

//configuration du compte administrateur
define("ADMIN_USERNAME", "admin");
define("ADMIN_PASSWORD", "admin"); //le mot de passe sera encrypté dans la base de données
define("ADMIN_EMAIL", "admin@mail.com");

//configuration du blog
define("WEB_ROOT", "/bloguistecms");
define("WEB_TITLE", "Mon blog");

//configuration de la base de données
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bloguistecms");
		
//configuration par défault du MVC
define("DEFAULT_CONTROLLER", "home");
define("DEFAULT_ACTION", "index");
