<?php

if (file_exists("config/config.php")) {
    require_once "config/config.php";
} else {
    require_once "config/config.default.php";
}

if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

$url = [];
$controller = "home";
$action = "index";
$params = [];

if (isset($_GET['url']) && !empty($_GET['url'])) {
    $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
}

if (isset($url[0])) {
    $controller = $url[0];
    unset($url[0]);
}

if (!file_exists("config/config.php")) {
    $controller = "install";
}

if (!file_exists("controllers/".$controller.".php")) {
    require_once "controllers/error.php";

    $controller = new ErrorController();
    $controller->index();

    exit();
}

require_once "controllers/".$controller.".php";

$controller = ucfirst(strtolower($controller))."Controller";
$controller = new $controller();

if (isset($url[1])) {
    if (method_exists($controller, $url[1])) {
        $action = $url[1];
        unset($url[1]);
    }
}

$params = $url ? $url : [];

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $params[] = $value;
    }
}

call_user_func_array([$controller, $action], $params);
