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
				if (register == "exists") {
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

	//validation de la création d'un article
	$("#add_post_form").submit(function(e) {
		e.preventDefault();

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
					alert("Nouvel article ajouté avec succès.");
					window.location.href = "dashboard/posts";
				}
			}
		});
	});

	//validation de la modification d'un article
	$("#edit_post_form").submit(function(e) {
		e.preventDefault();

		var tmp_url = $(this).attr("action");
		var tmp_array = tmp_url.split("/");

		$.ajax ({
			url: tmp_url,
			type: "POST",
			data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
			success: function(edit_post) {
				if (edit_post == "failed") {
					alert("Cet article existe déjà.");
				} else {
					alert("L'article a été modifié avec succès.");
					window.location.href = "dashboard/posts/" + tmp_array[3];
				}
			}
		});
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
});