<?php

abstract class Session {

	public function start() {
		session_start();
	}

	public function exists($item) {
		return isset($_SESSION[$item]);
	}

	public function set(array $data) {
		foreach ($data as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}

	public function get($item) {
		return $_SESSION[$item];
	}

	public function unset($item) {
		unset($_SESSION[$item]);
	}

	public function destroy() {
		session_unset();
		session_destroy();
	}
}
