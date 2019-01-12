<?php
require_once "app/core/database.php";
require_once "app/core/config.php";

//classe gérant l'installation de la base de données
class InstallModel {
    
	public function install($db_name, $admin_username, $admin_password, $admin_email) {
        //création d'une nouvelle base de donnée
        $db = new Database();
        $db->execute("DROP DATABASE IF EXISTS " . $db_name);
        $db->execute("CREATE DATABASE " . $db_name);

        //nouvelle connexion à la base donnée
        $db = new Database($db_name);

        //création la table des utilisateurs
        $db->execute("CREATE TABLE  users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            created INT(11) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            privileges VARCHAR(255) NOT NULL DEFAULT 'user',
            username VARCHAR(255) NOT NULL)"
        );

        //création la table des articles
        $db->execute("CREATE TABLE posts (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            content TEXT NOT NULL,
            created INT(11) NOT NULL,
            image VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            tags VARCHAR(255) NOT NULL,
            views INT(11) NOT NULL DEFAULT 0,
            comments INT(11) NOT NULL DEFAULT 0)"
        );

        //création la table des commentaires
        $db->execute("CREATE TABLE comments (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            author VARCHAR(255) NOT NULL,
            created INT(11) NOT NULL,
            message TEXT NOT NULL,
            post_slug VARCHAR(255) NOT NULL)"
        );

        //création la table des tags
        $db->execute("CREATE TABLE tags (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL)"
        );

        //encryptage du mot de passe de l'administrateur
        $admin_password = hash('ripemd128', $admin_password);
        $created = time();

        //ajout du compte administrateur à la base de données
        $db->execute("INSERT INTO users (created, email, username, password, privileges) VALUES (
            '$created', '$admin_email', '$admin_username', '$admin_password', 'admin')"
        );
    }
    
	public function update($admin_username, $admin_password, $admin_email) {
        //nouvelle connexion à la base donnée
        $db = new Database(DB_NAME);

        //encryptage du mot de passe de l'administrateur
        $admin_password = hash('ripemd128', $admin_password);

        //ajout du compte administrateur à la base de données
        $db->execute("UPDATE users SET email='" . ADMIN_EMAIL . "', username='". ADMIN_USERNAME ."',    
            password='$admin_password' WHERE id=1");
	}
}