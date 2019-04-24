<?php

require_once "config/config.php";
require_once "core/controller.php";

class ErrorController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = [];
		$data['title'] = "Error 404";

		$this->view->render("404", $data);
	}
}
