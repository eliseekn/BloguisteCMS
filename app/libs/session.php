<?php
//classe gérant les sessions d'utilisateurs
abstract class Session {
	
	public function start() {
		session_start();
	}
	
	//détermmine si une donnée de session existe
	public function item_exists($item) {
		return isset($_SESSION[$item]);
	}
	
	//supprime une donnée de session
	public function unset_item($item) {
		unset($_SESSION[$item]);
	}
	
	//crée une donnée de session
	public function set_item(array $data) {
		foreach ($data as $item => $value) {
			$_SESSION[$item] = $value;
		}
	}
	
	//écupère la valeur d'une donnée de session
	public function get_item($item) {
		return $_SESSION[$item];
	}
	
	//mettre fin à la session
	public function destroy() {
		session_unset();
		session_destroy();
	}
}
