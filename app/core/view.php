<?php
//classe de la vue de base
class View {
	
	public function render($view_name, $view_data) {
		$this->view_data = $view_data;
		require_once "app/views/$view_name.php";
	}
}
