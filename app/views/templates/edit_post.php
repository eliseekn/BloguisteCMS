				<h5>Modifier l'article <i>"<?=$this->view_data['content']->title?>"</i></h5>
			</div>
			
			<div class="w3-container w3-margin">		
				<form id="edit_post_form" action="<?="posts/edit_post/".$this->post_id."/".$this->page_id?>" method="post" enctype="multipart/form-data">
					<label>Titre</label>
					<input class="w3-input w3-border w3-section" type="text" name="title" maxlength="255" autofocus="autofocus" required="required" value="<?=$this->view_data['content']->title?>">
					<label>Contenu</label>
					<textarea class="w3-input w3-border w3-section" name="content" style="resize:none" rows="10" cols="10" required="required"><?=$this->view_data['content']->content?></textarea>
					<label>Image d'en-tête</label>
					<input type="file" name="image" class="w3-input w3-border w3-section">
					<label>Tags</label>
					<input class="w3-input w3-border w3-section" type="text" name="tags" maxlength="255" required="required" value="<?=$this->view_data['content']->tags?>">
					<input type="submit" class="w3-button w3-section" value="Sauvegarder les changements">
				</form>	
			</div>
			