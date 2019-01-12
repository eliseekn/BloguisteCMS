//cette feuille gère l'exécution du javascript
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
				if (login == "failed") {
					$("span").remove(".error_msg");
					$("#login_form").before('<span class="w3-tag error_msg">Echec lors de la connexion: <br> Nom d\'utilisateur et/ou mot de passe incorrect.</span>');
				} else {
					alert("Connexion réussie!");
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
				if (register == "exists") {
					$("span").remove(".error_msg");
					$("#register_form").before('<span class="w3-tag error_msg">Echec lors de l\'inscription: <br> L\'adresse email ou le nom d\'utilisateur existe déjà.</span>');
				} else if (register == "succeed") {
					alert("Inscription réussie!");
					window.location.href = "home/index";
				} else {
					$("#register_form").before('<span class="w3-tag error_msg">Echec lors de l\'inscription: <br> Une erreur inconnue s\'est produite.</span>');
				}
			}
		});
	});

	//validation de la création d'un article
	$("#add_post_form").submit(function(e) {
		e.preventDefault();

		var article = $("#editor").val();
		if (article == "<p>&nbsp;</p>") {
			alert("Veuillez ajouter un contenu à votre article.");
		} else {
			$("#add_post").addClass("w3-disabled");
			
			$.ajax ({
				url: "posts/add_post",
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(add_post) {
					if (add_post == "failed") {
						alert("Cet article existe déjà.");
					} else {
						alert("Nouvel article ajouté avec succès!");
						window.location.href = "dashboard/posts";
					}
				}
			});
		}
	});

	//validation de la modification d'un article
	$("#edit_post_form").submit(function(e) {
		e.preventDefault();

		var tmp_url = $(this).attr("action"); //on recupère l'url de redirection
		var tmp_array = tmp_url.split("/");

		var article = $("#editor").val();
		if (article == "<p>&nbsp;</p>") {
			alert("Veuillez ajouter un contenu à votre article.");
		} else {
			$("#edit_post").addClass("w3-disabled");

			$.ajax ({
				url: tmp_url,
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(edit_post) {
					alert("L'article a été modifié avec succès!");
					window.location.href = "dashboard/posts/" + tmp_array[3];
				}
			});
		}
	});

	//confirmation de suppression d'un article
	$("#delete_post").click(function(e) {
		e.preventDefault();

		if (window.confirm("Etes-vous sûr de vouloir supprimer cet article?")) {
			window.location.href = $(this).attr("href");
		}
	});

	//confirmation de suppression d'un utilisateur
	$("#delete_user").click(function(e) {
		e.preventDefault();

		if (window.confirm("Etes-vous sûr de vouloir supprimer cet utilisateur?")) {
			window.location.href = $(this).attr("href");
		}
	});

	//confirmation de suppression d'un commentaire
	$("#delete_comment").click(function(e) {
		e.preventDefault();

		if (window.confirm("Etes-vous sûr de vouloir supprimer ce commentaire?")) {
			window.location.href = $(this).attr("href");
		}
	});

	//confirmation de suppression d'un tag
	$("#delete_tag").click(function(e) {
		e.preventDefault();

		if (window.confirm("Etes-vous sûr de vouloir supprimer ce tag?")) {
			window.location.href = $(this).attr("href");
		}
	});

	//affichage des options de configurations
	//begin
	$("#blog_button").click(function(e) {
		e.preventDefault();

		$("#blog").show();
		$("#admin").hide();
		$("#database").hide();
	});

	$("#admin_button").click(function(e) {
		e.preventDefault();

		$("#blog").hide();
		$("#admin").show();
		$("#database").hide();
	});

	$("#database_button").click(function(e) {
		e.preventDefault();

		$("#blog").hide();
		$("#admin").hide();
		$("#database").show();
	});
	//end

	//validation de la sauvegarde de la configuration
	$("#settings_form").submit(function(e) {
		e.preventDefault();

		var password = $("#admin_password").val();
		var password_true = $("#admin_password_true").val();

		if (password != password_true) {
			alert("Les mots de passe ne correspondent pas.");
		} else {
			$("#save_button").addClass("w3-disabled");

			$.ajax ({
				url: "install/update",
				type: "POST",
				data: {
					admin_username: $("#admin_username").val(), 
					admin_password: $("#admin_password").val(),
					admin_email: $("#admin_email").val(),
					web_root: $("#web_root").val(), 
					web_title: $("#web_title").val()
				},
				success: function(save_config) {
					alert("La configuration a été sauvegardée avec succès!");
					window.location.href = "dashboard/settings";
				},
				error: function(save_config) {
					alert("Echec lors de la sauvegarde de la configuration.");
				}			
			});
		}
	});

	//validation de la sauvegarde de la configuration lors de l'installation
	$("#install_form").submit(function(e) {
		e.preventDefault();

		var password = $("#admin_password").val();
		var password_true = $("#admin_password_true").val();

		if (password != password_true) {
			alert("Les mots de passe ne correspondent pas.");
		} else {
			$("#install_button").addClass("w3-disabled");
	
			$.ajax ({
				url: "install/install",
				type: "POST",
				data: {
					admin_username: $("#admin_username").val(), 
					admin_password: $("#admin_password").val(),
					admin_email: $("#admin_email").val(), 
					web_root: $("#web_root").val(), 
					web_title: $("#web_title").val(),
					db_host: $("#db_host").val(),
					db_username: $("#db_username").val(),
					db_password: $("#db_password").val(),
					db_name: $("#db_name").val()
				},
				success: function(save_config) {
					alert("La configuration a été sauvegardée avec succès!");
					window.location.href = "users/index";
				},
				error: function(save_config) {
					alert("Echec lors de la sauvegarde de la configuration.");
				}
			});
		}
	});

	//statistiques de vues des articles
	$("#read_more").click(function(e) {
		e.preventDefault();

		var tmp_url = $(this).attr("href"); //on recupère l'url de redirection
		var tmp_array = tmp_url.split("/");

		$.ajax ({
			url: "posts/update_views",
			type: "POST",
			data: {slug: tmp_array[3]},
			success: function(update_views) {
				//
			}
		});

		window.location.href = $(this).attr("href");
	});
});