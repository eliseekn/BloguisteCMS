<?php
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
					"comments" => $comments_model->get_all($post_slug),
					"tags" => $tags_model->get_all()
				]
			]
		);
	}
	
	public function add_post($title, $content, $tags) {
		$image = "None";
		$slug = Utils::generate_slug($title);
		$tags = str_replace(" ", "", $tags);

		$posts_model = new PostsModel();
		
		if ($posts_model->is_exists($slug)) {
            echo "failed";
        } else {
            if (!empty($_FILES['image']['name'])) {
				$image = "public/img/".basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], $image);
			}
			
			$posts_model->add($title, htmlspecialchars($content), $image, $slug, $tags);

			$tags_model = new TagsModel();
			$tags = explode(",", $tags);

			foreach ($tags as $tag) {
				if (!$tags_model->is_exists($tag)) {
					$tags_model->add($tag);
				}
			}

			echo "succeed";
		}
	}
	
	public function edit_post($post_id, $page_id, $title, $content, $tags) {
		$image = "None";
		$slug = Utils::generate_slug($title);
		$tags = str_replace(" ", "", $tags);
		
		if ($posts_model->is_exists($slug)) {
            echo "failed";
        } else {
            if (!empty($_FILES['image']['name'])) {
				$image = "public/img/".basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], $image);
			}
			
			$posts_model = new PostsModel();
			$posts_model->edit($post_id, $title, htmlspecialchars($content), $image, $slug, $tags);
			
			$tags_model = new TagsModel();
			$tags = explode(",", $tags);
			
			foreach ($tags as $tag) {
				if (!$tags_model->is_exists($tag)) {
					$tags_model->add($tag);
				}
			}
			
			echo "succeed";
		}
	}
	
	public function add_comment($page_id, $post_slug, $message) {
		SESSION::start();
		
		$user = SESSION::get_item("user");
		$author = $user->username;
		
		if ($user->privileges == "admin") {
			$author .= " (Administrator)";
		}
		
		$comments_model = new CommentsModel();
		$comments_model->add($author, $message, $post_slug);
		
		$this->redirect("posts/index/".$page_id."/".$post_slug);
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
