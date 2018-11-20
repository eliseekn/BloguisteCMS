				<h5>Ajouter un nouvel article</h5>
			</div>
			
			<div class="w3-container">			
				<form action="posts/add_post" method="post" enctype="multipart/form-data">
					<label>Titre</label>
					<input class="w3-input w3-border w3-section" type="text" name="title" maxlength="255" autofocus="autofocus" required="required" />
					<label>Contenu</label>
					<textarea class="w3-input w3-border w3-section" name="content" style="resize:none" rows="4" cols="10" required="required"></textarea>
					<label>Image d'en-tête</label>
					<input type="file" name="image" class="w3-input w3-border w3-section" />
					<label>Tags (Séparés des virgules ",")</label>
					<input class="w3-input w3-border w3-section" type="text" name="tags" maxlength="255" required="required" />
					<button type="submit" class="w3-button w3-section w3-center">Ajouter l'article</button>
				</form>
			</div>
