<?php
/*
 * comments.php
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

//classe gérant la table des commentaires
class CommentsModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	//récupère tous les commentaires de la table
	public function get_all($post_id = "") {
		$comments = [];
		
		if (!empty($post_id)) {
			$post_id = $this->db->escape_string($post_id);
			$query = $this->db->execute("SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id DESC");
		} else {
			$query = $this->db->execute("SELECT * FROM comments ORDER BY id DESC");
		}
		
		if ($query) {
			while ($data = $this->db->fetch($query)) {
				$comments[] = new Comment($data);
			}
		}
		
		return $comments;
	}
	
	//récupère un commentaire par son id
	public function get_comment($id) {
		$id = $this->db->escape_string($id);
		$query = $this->db->execute("SELECT * FROM comments WHERE id='$id'");
		return new Comment($this->db->fetch($query));
	}
	
	//récupère le nombre de commentaire pour un article ou plusieurs
	public function get_count($post_id = "") {
		if (!empty($post_id)) {
			$post_id = $this->db->escape_string($post_id);
			return $this->db->count("SELECT * FROM comments WHERE post_id='$post_id'");
		} else {
			return $this->db->count("SELECT * FROM comments");
		}
	}
	
	//ajoute un commentaire à la table
	public function add($author, $message, $post_id) {
		$author = $this->db->escape_string($author);
		$message = $this->db->escape_string($message);
		$post_id = $this->db->escape_string($post_id);
		
		return $this->db->execute("INSERT INTO comments (author, message, post_id) 
			VALUES ('$author', '$message', '$post_id')");
	}
	
	//supprime un commentaire de la table
	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM comments WHERE id='$id' LIMIT 1");
	}
	
	//id du dernier commentaire insérer
	public function last_comment_id() {
		return $this->db->last_insert_id();
	}
}
