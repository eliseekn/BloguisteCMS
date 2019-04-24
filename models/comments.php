<?php
require_once "core/model.php";
require_once "database/classes.php";

class CommentsModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all($post_slug = "") {
		$comments = [];

		if (!empty($post_id)) {
			$post_id = $this->db->escape_string($post_id);
			$query = $this->db->execute("SELECT * FROM comments WHERE post_slug='$post_slug' ORDER BY id DESC");
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

	public function get_comment($id) {
		$id = $this->db->escape_string($id);
		$query = $this->db->execute("SELECT * FROM comments WHERE id='$id'");
		return new Comment($this->db->fetch($query));
	}

	public function get_count($slug = "") {
		if (!empty($slug)) {
			$slug = $this->db->escape_string($slug);
			return $this->db->count("SELECT * FROM comments WHERE slug='$slug'");
		} else {
			return $this->db->count("SELECT * FROM comments");
		}
	}

	public function add($author, $message, $post_slug) {
		$author = $this->db->escape_string($author);
		$message = $this->db->escape_string($message);
		$post_slug = $this->db->escape_string($post_slug);
		$created = time();

		return $this->db->execute("INSERT INTO comments (author, created, message, post_slug)
			VALUES ('$author', '$created', '$message', '$post_slug')");
	}

	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM comments WHERE id='$id' LIMIT 1");
	}

	public function last_comment_id() {
		return $this->db->last_insert_id();
	}
}
