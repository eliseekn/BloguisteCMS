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

require_once "app/core/controller.php";
require_once "app/models/posts.php";
require_once "app/models/comments.php";
require_once "app/models/tags.php";
require_once "app/libs/session.php";
require_once "app/libs/utils.php";
require_once "app/core/config.php";

//classe gérant les requêtes vers les articles
class PostsController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($page_id = 1, $post_slug = "") {
		$posts_model = new PostsModel();
		$comments_model = new CommentsModel();
		$tags_model = new TagsModel();
		
		$post = $posts_model->get_post($post_slug);
		
		$this->view->page_id = $page_id;
		$this->view->post_id = $post->id;
		
		$this->view->render("post", [
				"title" => WEB_TITLE,
				"content" => [
					"post" => $post,
					"comments" => $comments_model->get_all($post->id),
					"tags" => $tags_model->get_all()
				]
			]
		);
	}
	
	public function add_post($title, $content, $tags) {
		$image = "None";
		$slug = Utils::generate_slug($title);
		$tags = str_replace(" ", "", $tags);
		
		if (!empty($_FILES['image']['name'])) {
			$image = "layout/assets/img/posts/".basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
		}
		
		$posts_model = new PostsModel();
		$posts_model->add($title, $content, $image, $slug, $tags);

		$tags_model = new TagsModel();
		$tags = explode(",", $tags);

		foreach ($tags as $tag) {
			if (!$tags_model->is_exists($tag)) {
                $tags_model->add($tag);
            }
		}
		
		$this->redirect("dashboard/posts");
	}
	
	public function edit_post($post_id, $page_id, $title, $content, $tags) {
		$image = "None";
		$slug = Utils::generate_slug($title);
		$tags = str_replace(" ", "", $tags);
		
		if (!empty($_FILES['image']['name'])) {
			$image = "layout/assets/img/posts/".basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
		}
		
		$posts_model = new PostsModel();
		$posts_model->edit($post_id, $title, $content, $image, $slug, $tags);
        
        $tags_model = new TagsModel();
		$tags = explode(",", $tags);
        
        foreach ($tags as $tag) {
            if (!$tags_model->is_exists($tag)) {
                $tags_model->add($tag);
            }
		}
		
		$this->redirect("dashboard/posts/$page_id");
	}
	
	public function add_comment($post_id, $post_slug, $message) {
		SESSION::start();
		
		$user = SESSION::get_item("user");
		$author = $user->username;
		
		if ($user->privileges == "admin") {
			$author .= " (Administrator)";
		}
		
		$posts_model = new PostsModel();
		$comments_model = new CommentsModel();

		$post = $posts_model->get_post($post_slug);
		$comments_model->add($author, $message, $post->id);
		
		
		$this->redirect("posts/index/".$page_id."/".$post->id);
	}
	
	public function delete_post($post_id, $page_id) {
		$posts_model = new PostsModel();
		$post = $posts_model->get_post($post_id);

		$posts_model->delete($post_id);
		$image = $post->image;
		
		if ($image != "None") {
			unlink(WEB_ROOT."/".$image);
		}
		
		$this->redirect("dashboard/posts/$page_id");
	}
	
	public function delete_comment($comment_id) {
		$comments_model = new CommentsModel();
		$comments_model->delete($comment_id);
	}
}
