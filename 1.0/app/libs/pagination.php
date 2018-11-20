<?php
/*
 * pagination.php
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
