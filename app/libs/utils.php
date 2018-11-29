<?php

abstract class Utils {
	//génère un slug pour les pages des articles
	public function generate_slug($slug) {

		// transform url
		$slug = preg_replace('/[^a-zA-Z0-9]/', '-', $slug);
		$slug = strtolower(trim($slug, '-'));

		//Removing more than one dashes
		$slug = preg_replace('/\-{2,}/', '-', $slug);

		return $slug;
	}
}
