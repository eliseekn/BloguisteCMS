<?php
/*
 * dashboard.php
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
require_once "app/models/users.php";
require_once "app/models/tags.php";
require_once "app/models/comments.php";
require_once "app/libs/session.php";
require_once "app/libs/pagination.php";

//classe gérant les commandes de administrateurs
class DashboardController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	//vérifie que l'administrateur est connecté 
	public function is_connected() {
		SESSION::start();
		
		if (SESSION::item_exists("user")) {
			$user = SESSION::get_item("user");
			if ($user->privileges == "admin") {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function posts($page_id = 1) {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$posts_model = new PostsModel();
		$pagination = new Pagination($page_id, $posts_model->get_count());
		
		$this->view->page_id = $pagination->page_id;
		$this->view->first_post = $pagination->first_item;
		$this->view->total_pages = $pagination->total_pages;
		$this->view->posts_per_pages = $pagination->items_per_pages;
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => $posts_model->get_all($this->view->first_post, $this->view->posts_per_pages),
				"action" => "posts"
			]
		);
	}
	
	public function users() {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$users_model = new UsersModel();
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => $users_model->get_all(),
				"action" => "users"
			]
		);
	}
	
	public function comments() {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$comments_model = new CommentsModel();
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => $comments_model->get_all(),
				"action" => "comments"
			]
		);
	}
	
	public function tags() {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$tags_model = new TagsModel();
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => $tags_model->get_all(),
				"action" => "tags"
			]
		);
	}
	
	public function add_post() {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => "",
				"action" => "add_post"
			]
		);
	}
	
	public function edit_post($slug, $page_id) {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$posts_model = new PostsModel();
		$post = $posts_model->get_post($post_slug);
		
		$this->view->page_id = $page_id;
		$this->view->post_id = $post->id;
		
		$this->view->render("dashboard", [
				"title" => WEB_TITLE . " - Tableau de bord",
				"content" => $posts_model->get_post($slug),
				"action" => "edit_post"
			]
		);
	}
	
	public function delete_user($user_id) {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$users_model = new UsersModel();
		$users_model->delete($user_id);
		
		$this->redirect("dashboard/users");
	}

	public function delete_tag($tag_id) {
		if (!$this->is_connected()) {
			$this->redirect("login/index");
			exit();
		}
		
		$tags_model = new TagsModel();
		$tags_model->delete($tag_id);
		
		$this->redirect("dashboard/tags");
	}
}
