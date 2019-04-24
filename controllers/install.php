<?php

if (file_exists("config/config.php")) {
    require_once "config/config.php";
}

require_once "core/controller.php";
require_once "models/install.php";

 class InstallController extends Controller {

	public function __construct() {
		parent::__construct();
    }

    public function index() {
        $data = [];
        $data['title'] = "BloguisteCMS - Installation";
        $this->view->render("install", $data);
    }

    public function install($admin_username, $admin_password, $admin_email, $web_title, $web_root,
        $web_description, $db_host, $db_username, $db_password, $db_name) {
        if (file_exists("config/config.php")) {
            unlink("config/config.php");
        }

        $config_file = fopen("config/config.default.php", "r");
        $config_data = "";

        while (!feof($config_file)) {
            $config_data .= fgets($config_file);
        }

        $config_data = str_replace("DEFAULT_ADMIN_USERNAME", $admin_username, $config_data);
        $config_data = str_replace("DEFAULT_ADMIN_PASSWORD", $admin_password, $config_data);
        $config_data = str_replace("DEFAULT_ADMIN_EMAIL", $admin_email, $config_data);

        $config_data = str_replace("DEFAULT_WEB_TITLE", $web_title, $config_data);
        $config_data = str_replace("DEFAULT_WEB_ROOT", $web_root, $config_data);
        $config_data = str_replace("DEFAULT_WEB_DESCRIPTION", $web_description, $config_data);

        $config_data = str_replace("DEFAULT_DB_HOST", $db_host, $config_data);
        $config_data = str_replace("DEFAULT_DB_USERNAME", $db_username, $config_data);
        $config_data = str_replace("DEFAULT_DB_PASSWORD", $db_password, $config_data);
        $config_data = str_replace("DEFAULT_DB_NAME", $db_name, $config_data);

        fclose($config_file);

        $config_file = fopen("config/config.php", "w");
        fwrite($config_file, $config_data);
        fclose($config_file);

        InstallModel::install($db_host, $db_username, $db_password, $db_name, $admin_username, $admin_password, $admin_email);
    }

    public function update($admin_username, $admin_password, $admin_email, $web_title, $web_root, $web_description) {
        $config_file = fopen("config/config.php", "r");

        unlink("config/config.php");

        $config_data = "";

        while (!feof($config_file)) {
            $config_data .= fgets($config_file);
        }

        $config_data = str_replace(ADMIN_USERNAME, $admin_username, $config_data);
        $config_data = str_replace(ADMIN_PASSWORD, $admin_password, $config_data);
        $config_data = str_replace(ADMIN_EMAIL, $admin_email, $config_data);

        $config_data = str_replace(WEB_TITLE, $web_title, $config_data);
        $config_data = str_replace(WEB_ROOT, $web_root, $config_data);
        $config_data = str_replace(WEB_DESCRIPTION, $web_description, $config_data);

        fclose($config_file);

        $config_file = fopen("config/config.php", "w");
        fwrite($config_file, $config_data);
        fclose($config_file);

        InstallModel::update($admin_username, $admin_password, $admin_email);
    }
 }
