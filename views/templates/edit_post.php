	<h5>Modifier l'article <i>"<?=$post->title?>"</i></h5>
</div>

<div class="w3-container w3-margin">
	<form id="edit_post_form" action="<?="posts/edit_post/".$post_id."/".$page_id?>" method="post" enctype="multipart/form-data">
		<label>Titre</label>
		<input class="w3-input w3-border w3-section" type="text" name="title" maxlength="255" autofocus="autofocus" required="required" value="<?=$post->title?>">
		<label>Contenu de l'article</label>
		<br>
		<textarea name="content" id="editor"><?=$post->content?></textarea>
		<br>
		<label>Image d'en-tête</label>
		<input type="file" name="image" class="w3-input w3-border w3-section">
		<label>Tags</label>
		<input class="w3-input w3-border w3-section" type="text" name="tags" maxlength="255" required="required" value="<?=$post->tags?>">
		<input type="submit" class="w3-button w3-section" id="edit_post" value="Sauvegarder les changements">
	</form>
</div>
