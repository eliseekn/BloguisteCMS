<?php

abstract class Functions {

	public function generate_slug($slug) {
		$slug = preg_replace('/[^a-zA-Z0-9]/', '-', $slug);
		$slug = strtolower(trim($slug, '-'));
		$slug = preg_replace('/\-{2,}/', '-', $slug);

		return $slug;
	}

	public function generate_archive_date($date) {
		$months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
			"Août", "Semptembre", "Octobre", "Novembre", "Décembre"];

		$current_month = (int)date("m", $date);
		$current_year = date("Y", $date);

		return $months[$current_month - 1] . " " . $current_year;
	}
}
