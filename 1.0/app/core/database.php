<?php
/*
 * database.php
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

require_once "config.php";

//classe gérant les connexions à la base de données
class Database {
	
	private $connection;
		
	//connexion à la base de données
	public function __construct($db_name = "") {
		//connexion à unlae base de donnée existante
		if (empty($db_name)) {
			$this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		} else {
			$this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, $db_name);
		}

		//définition de l'encodage par défaut
		mysqli_set_charset($this->connection, "utf8");

		//mode débogage
		if (DEBUG) {
			if (mysqli_connect_errno()) {
				die(mysqli_connect_error());
			}
		}
	}
	
	//exécution d'une requête
	public function execute($query) {
		$query = mysqli_query($this->connection, $query);
		
		//mode débogage
		if (DEBUG) {
			if (!$query) {
				die(mysqli_error($this->connection));
			}
		}
		
		return $query;
	}
	
	//récupère les données d'une table à l'aide du résultat d'une requête
	public function fetch($query, $mode = MYSQLI_ASSOC) {
		return mysqli_fetch_array($query, $mode);
	}
	
	//récupère les données d'une table à l'aide d'une requête qui sera exécutée
	public function select($query, $mode = MYSQLI_ASSOC) {
		return $this->fetch($this->execute($query), $mode);
	}
	
	//récupère le nombre de lignes d'une table
	public function count($query) {
		return mysqli_num_rows($this->execute($query));
	}
	
	//récupère l'id du dernier élément insérer dans un table
	public function last_insert_id() {
		return mysqli_insert_id($this->connection);
	}

	//simple protection contre les injections sql
	public function escape_string($str) {
		return mysqli_real_escape_string($this->connection, $str);
	}
}
