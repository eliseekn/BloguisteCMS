/*
 * script.js
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

$(document).ready(function() {              
	//validation de la connexion de l'utilisateur   
	$("#login_form").submit(function(e) {
		e.preventDefault();

		$.ajax ({
			url: "users/login",
			type: "POST",
			data: {
				username: $("#username").val(), 
				password: $("#password").val()
			},
			success: function(login) {
				if(login == "failed") {
					alert("Nom d'utilisateur et/ou mot de passe incorrect.");
				} else {
					alert("Connexion réussie.");
					window.location.href = "home/index";
				}
			}
		});
	});

	//validation de l'inscription
	$("#register_form").submit(function(e) {
		e.preventDefault();

		$.ajax ({
			url: "users/register",
			type: "POST",
			data: {
				username: $("#username").val(), 
				email: $("#email").val(),
				password: $("#password").val()
			},
			success: function(register) {
				if(register == "exists") {
					alert("Cet utilisateur existe déjà.");
				} else if (register == "succeed") {
					alert("Inscription réussie.");
					window.location.href = "home/index";
				} else {
					alert("Une erreur s'est produite.");
				}
			}
		});
	});

	//validation d'un article pour la création d'un article
	$("#add_post_form").submit(function(e) {
		e.preventDefault();

		$.ajax ({
			url: "posts/add_post",
			type: "POST",
			data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
			success: function(add_post) {
				if(add_post == "failed") {
					alert("Cet article existe déjà.");
				} else {
					alert("Nouvel article ajouté avec succès.");
					window.location.href = "dashboard/posts";
				}
			}
		});
	});
});