<?php

class Post {

	public $id;
	public $content;
	public $created;
	public $image;
	public $slug;
	public $tags;
	public $title;
	public $views;
	public $comments;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->content = $data['content'];
		$this->created = $data['created'];
		$this->image = $data['image'];
		$this->slug = $data['slug'];
		$this->tags = $data['tags'];
		$this->title = $data['title'];
		$this->views = $data['views'];
		$this->comments = $data['comments'];
	}
}

class Comment {

	public $id;
	public $author;
	public $created;
	public $message;
	public $post_slug;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->author = $data['author'];
		$this->created = $data['created'];
		$this->message = $data['message'];
		$this->post_slug = $data['post_slug'];
	}
}

class User {

	public $id;
	public $created;
	public $email;
	public $password;
	public $privileges;
	public $username;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->created = $data['created'];
		$this->email = $data['email'];
		$this->password = $data['password'];
		$this->privileges = $data['privileges'];
		$this->username = $data['username'];
	}
}

class Tag {

	public $id;
	public $name;

	public function __construct($data) {
		$this->id = $data['id'];
		$this->name = $data['name'];
	}
}
