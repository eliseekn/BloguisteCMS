<?php

require_once "config/config.php";
require_once "helpers/session.php";
require_once "helpers/functions.php";
require_once "core/controller.php";
require_once "models/posts.php";
require_once "models/comments.php";
require_once "models/tags.php";

class PostsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($page_id = 1, $slug = "") {
		$posts_model = new PostsModel();
		$comments_model = new CommentsModel();
		$tags_model = new TagsModel();

		$post = $posts_model->get_post($slug);

		$data = [];
		$data['title'] = WEB_TITLE;
		$data['post'] = $posts_model->get_post($slug);
		$data['comments'] = $comments_model->get_all($slug);
		$data['page_id'] = $page_id;
		$data['post_id'] = $data['post']->id;
		$data['archives'] = $posts_model->get_all();
		$data['tags'] = $tags_model->get_all();

		$this->view->render("templates/header", $data);
		$this->view->render("post", $data);
		$this->view->render("templates/footer", $data);
	}

	public function add_post($title, $content, $tags) {
		$image = "None";
		$slug = Functions::generate_slug($title);
		$tags = str_replace(" ", "", $tags);

		$posts_model = new PostsModel();

		if ($posts_model->exists($slug)) {
            echo "failed";
        } else {
            if (!empty($_FILES['image']['name'])) {
				$image = "/layout/assets/img/".basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], $image);
			}

			$posts_model->add($title, htmlspecialchars($content), $image, $slug, $tags);

			$tags_model = new TagsModel();
			$tags = explode(",", $tags);

			foreach ($tags as $tag) {
				if (!$tags_model->exists($tag)) {
					$tags_model->add($tag);
				}
			}

			echo "succeed";
		}
	}

	public function edit_post($post_id, $page_id, $title, $content, $tags) {
		$image = "None";
		$slug = Functions::generate_slug($title);
		$tags = str_replace(" ", "", $tags);

		$posts_model = new PostsModel();

		if (!empty($_FILES['image']['name'])) {
			$image = "/layout/assets/img/".basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
		}

		$posts_model->edit($post_id, $title, htmlspecialchars($content), $image, $slug, $tags);

		$tags_model = new TagsModel();
		$tags = explode(",", $tags);

		foreach ($tags as $tag) {
			if (!$tags_model->exists($tag)) {
				$tags_model->add($tag);
			}
		}
	}

	public function add_comment($page_id, $post_slug, $message) {
		SESSION::start();

		$user = SESSION::get_item("user");
		$author = $user->username;

		if ($user->privileges == "admin") {
			$author .= " (Administrateur)";
		}

		$comments_model = new CommentsModel();
		$comments_model->add($author, $message, $post_slug);

		$this->update_comments($post_slug);

		$this->redirect("posts/index/".$page_id."/".$post_slug);
	}

	public function update_views($slug) {
		$posts_model = new PostsModel();
		$posts_model->update_views($slug);
	}

	public function update_comments($slug) {
		$posts_model = new PostsModel();
		$posts_model->update_comments($slug);
	}
}
