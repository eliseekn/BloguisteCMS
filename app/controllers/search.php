<?php
require_once "app/core/controller.php";
require_once "app/models/posts.php";
require_once "app/models/tags.php";
require_once "app/libs/pagination.php";
require_once "app/core/config.php";

//classe gérant les requêtes de recherhes d'articles
class SearchController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($page_id = 1, $search_query = "") {
		$this->view->search_query = $search_query;
		$query = $this->generate_query($this->view->search_query);
		
		$posts_model = new PostsModel();
		$tags_model = new TagsModel();
		$pagination = new Pagination($page_id, $posts_model->get_count($query));
		
		$this->view->page_id = $pagination->page_id;
		$this->view->first_post = $pagination->first_item;
		$this->view->total_pages = $pagination->total_pages;
		$this->view->posts_per_pages = $pagination->items_per_pages;
		
		$this->view->render("search", [
				"title" => WEB_TITLE,
				"content" => [
					"post" => $posts_model->get_all($this->view->first_post, $this->view->posts_per_pages, $query),
					"tags" => $tags_model->get_all()
				]
			]
		);
	}
	
	//génère la requête sql spécifique
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
