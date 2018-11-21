<?php
/*
 * tags.php
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

//classe gérant les tags
class TagsModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	//récupère tous les tags de la table
	public function get_all() {
		$tags = [];
		$query = $this->db->execute("SELECT * FROM tags ORDER BY id DESC");
		
		if ($query) {
			while ($data = $this->db->fetch($query)) {
				$tags[] = new Tag($data);
			}
		}
		
		return $tags;
	}

	//vérifie qu'un tag existe déjà
	public function is_exists($tag) {
		$tag = $this->db->escape_string($tag);
		$query = $this->db->execute("SELECT * FROM tags WHERE name='$tag'");
		$data = $this->db->fetch($query, MYSQLI_NUM);
		return $data[0] >= 1 ? true : false;
	}
	
	//ajoute un tag à la table
	public function add($tag) {
		$tag = $this->db->escape_string($tag);
		return $this->db->execute("INSERT INTO tags (name) VALUES ('$tag')");
	}
	
	//supprime un tag de la table
	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM tags WHERE id='$id' LIMIT 1");
	}
}
