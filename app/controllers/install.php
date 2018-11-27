<?php
require_once "app/core/controller.php";
require_once "app/models/install.php";

//classe gérant l'installation de la base de donnée
 class InstallController extends Controller {
    
	public function __construct() {
		parent::__construct();
	}
    
    public function index() {
        //installation de la base donnée via le modèle
        $install_model = new InstallModel;
        $install_model->install();

        //connexion au tableau de bord
        $this->redirect("users/index");
	}
 }