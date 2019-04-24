<?php
require_once "core/model.php";
require_once "database/classes.php";

class PostsModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$posts = [];
		$query = $this->db->execute("SELECT * FROM posts ORDER BY id DESC");

		if ($query) {
			while ($data = $this->db->fetch($query)) {
				$posts[] = new Post($data);
			}
		}

		return $posts;
	}

	public function get_all_range($start, $end, $where = "") {
		$posts = [];

		if (!empty($where)) {
			$query = $this->db->execute("SELECT * FROM posts WHERE $where ORDER BY id DESC LIMIT $start, $end");
		} else {
			$query = $this->db->execute("SELECT * FROM posts ORDER BY id DESC LIMIT $start, $end");
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

	public function exists($slug) {
		$slug = $this->db->escape_string($slug);
		$query = $this->db->execute("SELECT * FROM posts WHERE slug='$slug'");
		$data = $this->db->fetch($query, MYSQLI_NUM);
		return $data[0] >= 1 ? true : false;
	}

	public function add($title, $content, $image, $slug, $tags) {
		$title = $this->db->escape_string($title);
		$content = $this->db->escape_string($content);
		$image = $this->db->escape_string($image);
		$slug = $this->db->escape_string($slug);
		$tags = $this->db->escape_string($tags);

		return $this->db->execute("INSERT INTO posts (content, created, image, slug, tags, title)
			VALUES ('$content', '".time()."', '$image', '$slug', '$tags', '$title')");
	}

	public function edit($id, $title, $content, $image, $slug, $tags) {
		$id = $this->db->escape_string($id);
		$title = $this->db->escape_string($title);
		$content = $this->db->escape_string($content);
		$image = $this->db->escape_string($image);
		$slug = $this->db->escape_string($slug);
		$tags = $this->db->escape_string($tags);

		return $this->db->execute("UPDATE posts SET title='$title', content='$content',
			image='$image', slug='$slug', tags='$tags' WHERE id='$id'");
	}

	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM posts WHERE id='$id' LIMIT 1");
	}

	public function update_views($slug) {
		$slug = $this->db->escape_string($slug);
		$query = $this->db->execute("SELECT * FROM posts WHERE slug='$slug'");

		$post = new Post($this->db->fetch($query));
		$views = $post->views;
		$views++;

		return $this->db->execute("UPDATE posts SET views='$views' WHERE slug='$slug'");
	}

	public function update_comments($slug) {
		$slug = $this->db->escape_string($slug);
		$query = $this->db->execute("SELECT * FROM posts WHERE slug='$slug'");

		$post = new Post($this->db->fetch($query));
		$comments = $post->comments;
		$comments++;

		return $this->db->execute("UPDATE posts SET comments='$comments' WHERE slug='$slug'");
	}

	public function last_post_id() {
		return $this->db->last_insert_id();
	}
}
