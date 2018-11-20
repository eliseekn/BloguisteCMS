<?php
/*
 * install.php
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

require_once "app/core/model.php";
require_once "app/core/config.php";

//classe gérant l'installation de la base de données
class InstallModel extends Model {
    
	public function __construct() {
		parent::__construct();
	}
	
	public function install() {
        $this->db->execute("DROP DATABASE IF EXISTS " . DB_NAME); //supprimer la base de donnée préxistante
        $this->db->execute("CREATE DATABASE " . DB_NAME); //création d'une nouvelle base de donnée

        //nouvelle connexion à la base donnée
        $this->db = new Database(DB_NAME);

        //création la table des utilisateurs
        $this->db->execute("CREATE TABLE  users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            privileges VARCHAR(255) NOT NULL DEFAULT 'user',
            username VARCHAR(255) NOT NULL)");

        //création la table des articles
        $this->db->execute("CREATE TABLE posts (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            content TEXT NOT NULL,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            image VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            tags VARCHAR(255) NOT NULL)");

        //création la table des commentaires
        $this->db->execute("CREATE TABLE comments (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            author VARCHAR(255) NOT NULL,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            message TEXT NOT NULL,
            post_id INT(11) NOT NULL)");

        //création la table des tags
        $this->db->execute("CREATE TABLE tags (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL)");

        //ajout du compte administrateur à la base de données
        $this->db->execute("INSERT INTO users (email, username, password, privileges) VALUES (
            '" . ADMIN_EMAIL . "', '". ADMIN_USERNAME ."', '". ADMIN_PASSWORD ."', 'admin')");
	}
}