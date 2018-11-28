<?php
require_once "app/core/database.php";
require_once "app/core/config.php";

//classe gérant l'installation de la base de données
class InstallModel {
    
	public function install() {
        //création d'une nouvelle base de donnée
        $db = new Database();
        $db->execute("CREATE DATABASE " . DB_NAME);

        //nouvelle connexion à la base donnée
        $db = new Database(DB_NAME);

        //création la table des utilisateurs
        $db->execute("CREATE TABLE  users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            privileges VARCHAR(255) NOT NULL DEFAULT 'user',
            username VARCHAR(255) NOT NULL)"
        );

        //création la table des articles
        $db->execute("CREATE TABLE posts (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            content TEXT NOT NULL,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            image VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            tags VARCHAR(255) NOT NULL)"
        );

        //création la table des commentaires
        $db->execute("CREATE TABLE comments (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            author VARCHAR(255) NOT NULL,
            created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            message TEXT NOT NULL,
            post_slug VARCHAR(255) NOT NULL)"
        );

        //création la table des tags
        $db->execute("CREATE TABLE tags (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL)"
        );

        //encryptage du mot de passe de l'administrateur
        $admin_password = hash('ripemd128', ADMIN_PASSWORD);

        //ajout du compte administrateur à la base de données
        $db->execute("INSERT INTO users (email, username, password, privileges) VALUES (
            '" . ADMIN_EMAIL . "', '". ADMIN_USERNAME ."', '$admin_password', 'admin')"
        );
	}
}