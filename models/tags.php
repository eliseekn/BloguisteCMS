<?php
require_once "core/model.php";

class TagsModel extends Model {

	public function __construct() {
		parent::__construct();
	}

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

	public function get_count() {
		return $this->db->count("SELECT * FROM tags");
	}

	public function exists($tag) {
		$tag = $this->db->escape_string($tag);
		$query = $this->db->execute("SELECT * FROM tags WHERE name='$tag'");
		$data = $this->db->fetch($query, MYSQLI_NUM);

		return $data[0] >= 1 ? true : false;
	}

	public function add($tag) {
		$tag = $this->db->escape_string($tag);
		return $this->db->execute("INSERT INTO tags (name) VALUES ('$tag')");
	}

	public function delete($id) {
		$id = $this->db->escape_string($id);
		return $this->db->execute("DELETE FROM tags WHERE id='$id' LIMIT 1");
	}
}
