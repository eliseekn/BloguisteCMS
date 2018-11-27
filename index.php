<?php
require_once "app/core/app.php";
require_once "app/core/config.php";

//mode débogage
if (DEBUG) {
    ini_set('display_errors', 1);
}

//démarre une nouvelle instance de l'application
$app = new Application();
$app->run();
