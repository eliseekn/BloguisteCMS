<?php
require_once "app/core/controller.php";
require_once "app/models/users.php";
require_once "app/libs/session.php";
require_once "app/core/config.php";

class UsersController extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index($action = "login") {
		$this->view->render($action, ["title" => WEB_TITLE]);
	}
	
	public function login($username, $password) {
		$username = trim($username);
		$password = trim($password);

		$users_model = new UsersModel();
		$password = $users_model->hash($password);
		
		if (!$users_model->login($username, $password)) {
			echo "failed";
		} else {
			$user = $users_model->get_user_by_username($username);
			
			SESSION::start();
			SESSION::set_item(["user" => $user]);

			echo "succeed";
		}
	}
	
	public function register($username, $email, $password) {
		$email = trim($email);
		$username = trim($username);
		$password = trim($password);
		
		$users_model = new UsersModel();
        
        if ($users_model->is_exists($username, $email)) {
            echo "exists";
        } else {
            $password = $users_model->hash($password);

            if ($users_model->add($email, $username, $password)) {
                SESSION::start();
                SESSION::set_item(["user" => $users_model->get_user_by_username($username)]);

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
