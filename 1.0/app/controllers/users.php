<?php
/*
 * users.php
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
		//$password = $users_model->hash($password); //décommenter cette ligne pour crypter/décrypter les mots de passe des utilisateurs 
		
		if ($users_model->login($username, $password)) {
			$user = $users_model->get_user_by_username($username);
			
			SESSION::start();
			SESSION::set_item(["user" => $user]);
			
			if ($user->privileges == "admin") {
				$this->redirect("dashboard/posts");
			} else {
				$this->redirect("home/index");
			}
		} else {
			echo "<p>Login failed, incorrect id and/or password.</p>";
		}
	}
	
	public function register($username, $email, $password) {
		$email = trim($email);
		$username = trim($username);
		$password = trim($password);
		
		$users_model = new UsersModel();
        
        if ($users_model->is_exists($username, $email)) {
            echo "<p>Registration failed, this account already exists.</p>";
        } else {
            //$password = $users_model->hash($password); //décommenter cette ligne pour crypter/décrypter les mots de passe des utilisateurs

            if ($users_model->add($email, $username, $password)) {
                SESSION::start();
                SESSION::set_item(["user" => $users_model->get_user_by_username($username)]);

                $this->redirect("home/index");
            } else {
                echo "<p>Registration failed, please check your informations and try again.</p>";
            }
        }
	}
	
	public function logout() {
		SESSION::start();
		SESSION::destroy();
		
		$this->redirect("home/index");
	}
}
