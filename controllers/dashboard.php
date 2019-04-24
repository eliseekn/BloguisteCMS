<?php

require_once "config/config.php";
require_once "core/controller.php";
require_once "models/posts.php";
require_once "models/users.php";
require_once "models/tags.php";
require_once "models/comments.php";
require_once "helpers/session.php";
require_once "helpers/pagination.php";

class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function connected() {
		SESSION::start();

		if (SESSION::exists("user")) {
			$user = SESSION::get("user");
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
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$posts_model = new PostsModel();
		$pagination = new Pagination($page_id, $posts_model->get_count());

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['page_id'] = $pagination->page_id;
		$data['total_pages'] = $pagination->total_pages;
		$data['posts'] = $posts_model->get_all_range($pagination->first_item, $pagination->items_per_pages);
		$data['posts_count'] = $posts_model->get_count();
		$data['view'] = "posts";

		$this->view->render("dashboard", $data);
	}

	public function users() {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$users_model = new UsersModel();

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['users'] = $users_model->get_all();
		$data['users_count'] = $users_model->get_count() - 1;
		$data['view'] = "users";

		$this->view->render("dashboard", $data);
	}

	public function comments() {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$comments_model = new CommentsModel();

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['comments'] = $comments_model->get_all();
		$data['comments_count'] = $comments_model->get_count();
		$data['view'] = "comments";

		$this->view->render("dashboard", $data);
	}

	public function tags() {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$tags_model = new TagsModel();

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['tags'] = $tags_model->get_all();
		$data['tags_count'] = $tags_model->get_count();
		$data['view'] = "tags";

		$this->view->render("dashboard", $data);
	}

	public function settings() {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['view'] = "settings";

		$this->view->render("dashboard", $data);
	}

	public function add_post() {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['view'] = "add_post";

		$this->view->render("dashboard", $data);
	}

	public function edit_post($slug, $page_id) {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$posts_model = new PostsModel();

		$data = [];
		$data['title'] = WEB_TITLE . " - Tableau de bord";
		$data['post'] = $posts_model->get_post($slug);
		$data['page_id'] = $page_id;
		$data['post_id'] = $data['post']->id;
		$data['view'] = "edit_post";

		$this->view->render("dashboard", $data);
	}

	public function delete_user($user_id) {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$users_model = new UsersModel();
		$users_model->delete($user_id);

		$this->redirect("dashboard/users");
	}

	public function delete_tag($tag_id) {
		if (!$this->connected()) {
			$this->redirect("users/index");
			exit();
		}

		$tags_model = new TagsModel();
		$tags_model->delete($tag_id);

		$this->redirect("dashboard/tags");
	}

	public function delete_post($post_id, $page_id) {
		$posts_model = new PostsModel();
		$post = $posts_model->get_post($post_id);

		$posts_model->delete($post_id);
		$image = $post->image;

		if ($image !== "None") {
			unlink("/". WEB_ROOT ."/". $image);
		}

		$this->redirect("dashboard/posts/$page_id");
	}

	public function delete_comment($comment_id) {
		$comments_model = new CommentsModel();
		$comments_model->delete($comment_id);
	}
}
