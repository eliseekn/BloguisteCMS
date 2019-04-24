<?php

require_once "config/config.php";
require_once "helpers/pagination.php";
require_once "helpers/session.php";
require_once "helpers/functions.php";
require_once "core/controller.php";
require_once "models/posts.php";
require_once "models/tags.php";

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page_id = 1) {
		$posts_model = new PostsModel();
		$tags_model = new TagsModel();
		$pagination = new Pagination($page_id, $posts_model->get_count());

		$data = [];
		$data['title'] = WEB_TITLE;
		$data['page_id'] = $pagination->page_id;
		$data['total_pages'] = $pagination->total_pages;
		$data['posts'] = $posts_model->get_all_range($pagination->first_item, $pagination->items_per_pages);
		$data['archives'] = $posts_model->get_all();
		$data['tags'] = $tags_model->get_all();

		$this->view->render("templates/header", $data);
		$this->view->render("home", $data);
		$this->view->render("templates/footer", $data);
	}
}
