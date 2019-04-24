<?php

if (file_exists("config/config.php")) {
    require_once "config/config.php";
}

require_once "database/database.php";

abstract class InstallModel {

	public function install($db_host, $db_username, $db_password, $db_name, $admin_username, $admin_password, $admin_email) {
        $db = new Database($db_host, $db_username, $db_password);
        $db->execute("DROP DATABASE IF EXISTS " . $db_name);
        $db->execute("CREATE DATABASE " . $db_name);

        $db = new Database($db_host, $db_username, $db_password, $db_name);

        $db->execute("CREATE TABLE users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            created INT(11) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            privileges VARCHAR(255) NOT NULL DEFAULT 'user',
            username VARCHAR(255) NOT NULL)"
        );

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

        $db->execute("CREATE TABLE comments (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            author VARCHAR(255) NOT NULL,
            created INT(11) NOT NULL,
            message TEXT NOT NULL,
            post_slug VARCHAR(255) NOT NULL)"
        );

        $db->execute("CREATE TABLE tags (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL)"
        );

        $admin_password = hash('ripemd128', $admin_password);

        $db->execute("INSERT INTO users (created, email, username, password, privileges) VALUES (
            '". time() ."', '$admin_email', '$admin_username', '$admin_password', 'admin')"
        );
    }

	public function update($admin_username, $admin_password, $admin_email) {
        $db = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $admin_password = hash('ripemd128', $admin_password);

        $db->execute("UPDATE users SET email='". ADMIN_EMAIL ."', username='". ADMIN_USERNAME ."',
            password='$admin_password' WHERE id=1");
	}
}
