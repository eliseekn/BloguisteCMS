<?php

require_once "config/config.php";
require_once "core/controller.php";
require_once "models/users.php";
require_once "helpers/session.php";

class UsersController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($view = "login") {
		$data = [];
		$data['title'] = WEB_TITLE;
		$this->view->render($view, $data);
	}

	public function login($username, $password) {
		$username = str_replace(" ", "", $username);
		$password = str_replace(" ", "", $password);

		$users_model = new UsersModel();
		$password = hash('ripemd128', $password);

		if (!$users_model->login($username, $password)) {
			echo "failed";
		} else {
			$user = $users_model->get_user_by_name($username);

			SESSION::start();
			SESSION::set(["user" => $user]);

			echo "succeed";
		}
	}

	public function register($username, $email, $password) {
		$email = str_replace(" ", "", $email);
		$username = str_replace(" ", "", $username);
		$password = str_replace(" ", "", $password);

		$users_model = new UsersModel();

        if ($users_model->exists($username, $email)) {
            echo "exists";
        } else {
            $password = hash('ripemd128', $password);

            if ($users_model->add($email, $username, $password)) {
                SESSION::start();
                SESSION::set(["user" => $users_model->get_user_by_name($username)]);

                echo "succeed";
            } else {
                echo "failed";
            }
        }
	}

	public function logout() {
		SESSION::start();
		SESSION::destroy();

		$this->redirect("home/index");
	}
}
