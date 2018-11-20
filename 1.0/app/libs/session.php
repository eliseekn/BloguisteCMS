<?php
/*
 * session.php
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
