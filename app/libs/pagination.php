<?php
//classe gérant la pagination des articles
class Pagination {
	
	public $page_id;
	public $total_pages;
	public $first_item;
	public $items_per_pages = 4; //valeur par défaut du nombre d'articles par pages
	
	//paramètre les données de la pagination
	public function __construct($page_id, $total_items) {
		$this->page_id = $page_id;
		$this->total_pages = ceil($total_items/$this->items_per_pages);
	
		if ($this->page_id < 1) {
			$this->page_id = 1;
		} elseif ($this->page_id > $this->total_pages) {
			$this->page_id = $this->total_pages;
		}
		
		$this->first_item = ($this->page_id - 1) * $this->items_per_pages;
	}
}
