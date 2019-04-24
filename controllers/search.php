<?php

require_once "config/config.php";
require_once "helpers/pagination.php";
require_once "helpers/functions.php";
require_once "helpers/session.php";
require_once "core/controller.php";
require_once "models/posts.php";
require_once "models/tags.php";

class SearchController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page_id = 1, $search_query = "") {
		$query = $this->generate_query($search_query);

		$posts_model = new PostsModel();
		$tags_model = new TagsModel();
		$pagination = new Pagination($page_id, $posts_model->get_count($query));

		$data = [];
		$data['title'] = WEB_TITLE;
		$data['search_query'] = $search_query;
		$data['page_id'] = $pagination->page_id;
		$data['total_pages'] = $pagination->total_pages;
		$data['posts'] = $posts_model->get_all_range($pagination->first_item, $pagination->items_per_pages, $query);
		$data['archives'] = $posts_model->get_all();
		$data['tags'] = $tags_model->get_all();

		$this->view->render("templates/header", $data);
		$this->view->render("search", $data);
		$this->view->render("templates/footer", $data);
	}

	public function generate_query($search_query) {
		$query = "";
		$search_query = explode(" ", $search_query);
		$columns = ["title", "content", "tags"];

		$i = 0;

		foreach ($columns as $column) {
			foreach ($search_query as $q) {
				$i++;

				if ($i == 1) {
					$query .= "$column LIKE '%$q%'";
				} else {
					$query .= " OR $column LIKE '%$q%'";
				}
			}
		}

		return $query;
	}
}
