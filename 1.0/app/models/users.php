<?php
/*
 * users.php
 * 
 * Copyright 2018 eliseekn <eliseekn@gmail.com>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

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
		return $this->db->execute("SELECT * FROM users WHERE username='$username' AND password='$password'");
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
		return $this->db->execute("INSERT INTO users (email, username, password)
			VALUES ('$email', '$username', '$password')");
	}
	
	public function delete($id) {
		return $this->db->execute("DELETE FROM users WHERE id='$id' LIMIT 1");
	}
	
	public function last_user_id() {
		return $this->db->last_insert_id();
	}
}
