<?php
require_once "app/core/model.php";
require_once "app/core/classes.php";
require_once "app/core/config.php";

//classe gérant la table des utilisateurs
class UsersModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	//connexion d'un utilisateur au blog
	public function login($username, $password) {
		$username = $this->db->escape_string($username);
		$password = $this->db->escape_string($password);
		$query = $this->db->execute("SELECT * FROM users WHERE username='$username' AND password='$password'");
		$data = $this->db->fetch($query, MYSQLI_NUM);
		return $data[0] >= 1 ? true : false;
	}
	
	//vérifie qu'un utilisateur existe déjà
	public function is_exists($username, $email) {
		$username = $this->db->escape_string($username);
		$email = $this->db->escape_string($email);
		$query = $this->db->execute("SELECT * FROM users WHERE username='$username' OR email='$email'");
		$data = $this->db->fetch($query, MYSQLI_NUM);
		return $data[0] >= 1 ? true : false;
	}
	
	public function get_all() {
		$users = [];
		$query = $this->db->execute("SELECT * FROM users ORDER BY id ASC");
		
		if ($query) {
			while ($data = $this->db->fetch($query)) {
				$users[] = new User($data);
			}
		}
		
		return $users;
	}
	
	public function get_user_by_id($id) {
		$id = $this->db->escape_string($id);
		$query = $this->db->execute("SELECT * FROM users WHERE id='$id'");
		return new User($this->db->fetch($query));
	}
	
	public function get_user_by_username($username) {
		$username = $this->db->escape_string($username);
		$query = $this->db->execute("SELECT * FROM users WHERE username='$username'");
		return new User($this->db->fetch($query));
	}
	
	public function get_count() {
		return $this->db->count("SELECT * FROM users");
	}
	
	public function add($email, $username, $password) {
		$email = $this->db->escape_string($email);
		$username = $this->db->escape_string($username);
		$password = $this->db->escape_string($password);
		$created = time(); //current timestamp

		return $this->db->execute("INSERT INTO users (created, email, username, password)
			VALUES ('$created', '$email', '$username', '$password')");
	}
	
	public function delete($id) {
		return $this->db->execute("DELETE FROM users WHERE id='$id' LIMIT 1");
	}
	
	public function last_user_id() {
		return $this->db->last_insert_id();
	}
}
