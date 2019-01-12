<?php
require_once "app/core/controller.php";
require_once "app/models/install.php";
require_once "app/core/config.php";

//classe gérant l'installation de la base de données
 class InstallController extends Controller {
    
	public function __construct() {
		parent::__construct();
    }
    
    public function index() {
        $this->view->render("install", ["title" => "BloguisteCMS - Installation"]);
    }

    public function install($admin_username, $admin_password, $admin_email, $web_root, $web_title, $db_host, $db_username, $db_password, $db_name) {
        //suppression du fichier de configuration existant
        unlink("app/core/config.php");

        //lecture du fichier de configuration par défaut
        $config_file = fopen("app/core/config.default.php", "r");

        $config_data = "";
        
        while (!feof($config_file)) {
            $config_data .= fgets($config_file);
        }
        
        //mise à jour des données de configuration
        $config_data = str_replace("DEFAULT_ADMIN_USERNAME", $admin_username, $config_data);
        $config_data = str_replace("DEFAULT_ADMIN_PASSWORD", $admin_password, $config_data);
        $config_data = str_replace("DEFAULT_ADMIN_EMAIL", $admin_email, $config_data);
        $config_data = str_replace("DEFAULT_WEB_ROOT", $web_root, $config_data);
        $config_data = str_replace("DEFAULT_WEB_TITLE", $web_title, $config_data);
        $config_data = str_replace("DEFAULT_DB_HOST", $db_host, $config_data);
        $config_data = str_replace("DEFAULT_DB_USERNAME", $db_username, $config_data);
        $config_data = str_replace("DEFAULT_DB_PASSWORD", $db_password, $config_data);
        $config_data = str_replace("DEFAULT_DB_NAME", $db_name, $config_data);

        fclose($config_file);

        //création du fichier de configuration
        $config_file = fopen("app/core/config.php", "w");
        fwrite($config_file, $config_data);
        fclose($config_file);

        //installation de la base données
        InstallModel::install($db_name, $admin_username, $admin_password, $admin_email);
    }

    public function update($admin_username, $admin_password, $admin_email, $web_root, $web_title) {
        //lecture du fichier de configuration par défaut
        $config_file = fopen("app/core/config.php", "r");

        //suppression du fichier de configuration existant
        unlink("app/core/config.php"); 

        $config_data = "";
        
        while (!feof($config_file)) {
            $config_data .= fgets($config_file);
        }
        
        //mise à jour des données de configuration
        $config_data = str_replace(ADMIN_USERNAME, $admin_username, $config_data);
        $config_data = str_replace(ADMIN_PASSWORD, $admin_password, $config_data);
        $config_data = str_replace(ADMIN_EMAIL, $admin_email, $config_data);
        $config_data = str_replace(WEB_ROOT, $web_root, $config_data);
        $config_data = str_replace(WEB_TITLE, $web_title, $config_data);

        fclose($config_file);

        //création du fichier de configuration
        $config_file = fopen("app/core/config.php", "w");
        fwrite($config_file, $config_data);
        fclose($config_file);

        //mise à jour de la base données
        InstallModel::update($admin_username, $admin_password, $admin_email);
    }
 }