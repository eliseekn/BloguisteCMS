<?php
require_once "app/core/controller.php";

//classe de gestion des erreurs HTTP
//only 404 HTTP error is handle atm (eliseekn)
class ErrorController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function error404() {
		$this->view->render("404", ["title" => "Error 404"]);
	}
}
