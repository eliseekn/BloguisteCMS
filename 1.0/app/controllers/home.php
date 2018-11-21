<?php
/*
 * home.php
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
require_once "app/models/tags.php";
require_once "app/libs/pagination.php";
require_once "app/core/config.php";

//classe gérant les requêtes vers la page d'accueil
class HomeController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($page_id = 1) {
		$posts_model = new PostsModel();
		$tags_model = new TagsModel();

		$pagination = new Pagination($page_id, $posts_model->get_count());
		
		$this->view->page_id = $pagination->page_id;
		$this->view->first_post = $pagination->first_item;
		$this->view->total_pages = $pagination->total_pages;
		$this->view->posts_per_pages = $pagination->items_per_pages;
		
		$this->view->render("home", [
				"title" => WEB_TITLE,
				"content" => [
					"post" => $posts_model->get_all($this->view->first_post, $this->view->posts_per_pages),
					"tags" => $tags_model->get_all()
				]
			]
		);
	}
}
