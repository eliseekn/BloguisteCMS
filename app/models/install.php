<?php
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
            post_slug VARCHAR(255) NOT NULL)");

        //création la table des tags
        $this->db->execute("CREATE TABLE tags (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL)");

        //ajout du compte administrateur à la base de données
        $this->db->execute("INSERT INTO users (email, username, password, privileges) VALUES (
            '" . ADMIN_EMAIL . "', '". ADMIN_USERNAME ."', '". $this->hash(ADMIN_PASSWORD) ."', 'admin')");
	}
}