<?php
/*
 * posts.php
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

//classe gérant la table des articles
class PostsModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all($first_item, $last_item, $where = "") {
		$posts = [];
		
		if (!empty($where)) {
			$query = $this->db->execute("SELECT * FROM posts WHERE $where ORDER BY id DESC LIMIT $first_item, $last_item");
		} else {
			$query = $this->db->execute("SELECT * FROM posts ORDER BY id DESC LIMIT $first_item, $last_item");
		}
		
		if ($query) {
			while ($data = $this->db->fetch($query)) {
				$posts[] = new Post($data);
			}
		}
		
		return $posts;
	}
	
	public function get_post($slug) {
		$slug = $this->db->escape_string($slug);
		$query = $this->db->execute("SELECT * FROM posts WHERE slug='$slug'");
		return new Post($this->db->fetch($query));
	}
	
	public function get_count($where = "") {
		if (!empty($where)) {
			return $this->db->count("SELECT * FROM posts WHERE $where");
		} else {
			return $this->db->count("SELECT * FROM posts");
		}
	}
	
	public function add($title, $content, $image, $slug, $tags) {
		$title = $this->db->escape_string($title);
		$content = $this->db->escape_string($content);
		$image = $this->db->escape_string($image);
		$slug = $this->db->escape_string($slug);
		$tags = $this->db->escape_string($tags);

		return $this->db->execute("INSERT INTO posts (content, image, slug, tags, title) 
			VALUES ('$content', '$image', '$slug', '$tags', '$title')");
	}
	
	public function edit($id, $title, $content, $image, $slug, $tags) {
		$id = $this->db->escape_string($id);
		$title = $this->db->escape_string($title);
		$content = $this->db->escape_string($content);
		$image = $this->db->escape_string($image);
		$tags = $this->db->escape_string($tags);

		return $this->db->execute("UPDATE posts SET title='$title', content='$content', 
			image='$image', slug='$slug', tags='$tags' WHERE id='$id'");
	}
	
	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM posts WHERE id='$id' LIMIT 1");
	}
	
	public function last_post_id() {
		return $this->db->last_insert_id();
	}
}
