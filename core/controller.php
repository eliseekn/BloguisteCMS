<?php

if (file_exists("config/config.php")) {
	require_once "config/config.php";
}

require_once "view.php";

class Controller {

	public function __construct() {
		$this->view = new View();
	}

	public function redirect($location) {
        header("Location: /". WEB_ROOT ."/".$location);
	}
}
