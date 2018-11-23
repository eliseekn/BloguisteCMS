				<h5>Ajouter un nouvel article</h5>
			</div>
			
			<div class="w3-container">			
				<form id="post_form" enctype="multipart/form-data">
					<label>Titre</label>
					<input class="w3-input w3-border w3-section" type="text" name="title" id="title" maxlength="255" autofocus="autofocus" required="required" />
					<label>Contenu</label>
					<textarea class="w3-input w3-border w3-section" name="content" id="content" style="resize:none" rows="10" cols="10" required="required"></textarea>
					<label>Image d'en-tête</label>
					<input type="file" name="image" id="image" class="w3-input w3-border w3-section" />
					<label>Tags (séparés des virgules)</label>
					<input class="w3-input w3-border w3-section" type="text" name="tags" id="tags" maxlength="255" required="required" />
					<input type="submit" class="w3-button w3-section w3-center" value="Ajouter l'article" >
				</form>
			</div>
