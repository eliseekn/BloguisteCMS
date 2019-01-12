<?php
require_once "config.php";
require_once "view.php";

//classe du controlleur de base
class Controller {
	
	//create new view instance
	public function __construct() {
		$this->view = new View();
	}
	
	//redirection de lien
	public function redirect($location) {
		header("Location: /".WEB_ROOT."/".$location);
	}
}
