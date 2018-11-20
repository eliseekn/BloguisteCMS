<?php
/*
 * config.php
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

//mode développement
define("DEBUG", true);

//configuration du compte administrateur
define("ADMIN_USERNAME", "admin");
define("ADMIN_PASSWORD", "admin");
define("ADMIN_EMAIL", "admin@mail.com");

//configuration du blog
define("WEB_ROOT", "/bloguiste");
define("WEB_TITLE", "Mon blog");

//configuration de la base de données
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bloguiste");
		
//configuration par défault du MVC
define("DEFAULT_CONTROLLER", "home");
define("DEFAULT_ACTION", "index");
