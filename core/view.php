<?php

class View {

	public function render($page, $data = []) {
		if (is_array($data)) {
			extract($data);
		}

		require_once "views/$page.php";
	}
}
