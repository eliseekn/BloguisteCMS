<?php
/*
 * db.php
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

//classe de base d'un article
class Post {
	
	public $id;
	public $content;
	public $created;
	public $image;
	public $slug;
	public $tags;
	public $title;
	
	public function __construct($data) {
		$this->id = $data['id'];
		$this->content = $data['content'];
		$this->created = $data['created'];
		$this->image = $data['image'];
		$this->slug = $data['slug'];
		$this->tags = $data['tags'];
		$this->title = $data['title'];
	}
}

//classe de base d'un commentaire
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

//classe de base d'un utilisateur
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

//classe de base d'un tag
class Tag {
	
	public $id;
	public $name;
	
	public function __construct($data) {
		$this->id = $data['id'];
		$this->name = $data['name'];
	}
}