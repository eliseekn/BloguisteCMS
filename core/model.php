<?php

require_once "config/config.php";
require_once "database/database.php";

class Model {

	public function __construct() {
		$this->db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	}
}
