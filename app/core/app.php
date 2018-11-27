<?php
require_once "config.php";

//classe charger de la redirection des requêtes vers les controlleurs appropriés
class Application {
	
	private $url = [];
	private $controller = DEFAULT_CONTROLLER;
	private $action = DEFAULT_ACTION;
	private $params = [];
	
	public function __construct() {
		//récupération des parmètres de l'url
		if (isset($_GET['url']) && !empty($_GET['url'])) {
			$this->url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
		}
	}
		
	//redirection des requêtes
	public function run() {
		//on s'assure que le paramètre controlleur est défini
		if (isset($this->url[0])) {
			$this->controller = $this->url[0];
			unset($this->url[0]);
		}
		
		//si le controlleur n'existe pas, on affiche un 404
		if (!file_exists("app/controllers/".$this->controller.".php")) {  
			require_once "app/controllers/error.php";
			
			$this->controller = new ErrorController();
			$this->controller->error404();
			
			exit();
		}
		
		//chargement de la classe du controlleur spécifique
		require_once "app/controllers/".$this->controller.".php";
		
		$this->controller = ucfirst(strtolower($this->controller))."Controller"; //ex: home -> HomeController
		$this->controller = new $this->controller();
		
		//on s'assure que le paramètre action est défini
		if (isset($this->url[1])) {
			if (method_exists($this->controller, $this->url[1])) {
				$this->action = $this->url[1];
				unset($this->url[1]);
			}
		}
		
		//définission de tous les paramètres
		$this->params = $this->url ? $this->url : [];
		
		//ajout des paramètres de la variable $_POST si définis
		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				$this->params[] = $value;
			}
		}

		//exécution de la classe du controlleur avec tous les paramètres
		call_user_func_array([$this->controller, $this->action], $this->params);
	}
}
