<?php
require_once "database.php";
require_once "config.php";

//classe du modèle de base
class Model {
	
	protected $db;
	
	//create new database class instance
	public function __construct() {
		$this->db = new Database(DB_NAME);
	}
	
	//cryptage/décryptage des mots de passes
	public function hash($str) {
		return hash('ripemd128', $str);
	}
}
