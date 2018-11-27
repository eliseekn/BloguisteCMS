<?php
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
