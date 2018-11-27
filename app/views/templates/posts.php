				<h5>Articles</h5>
				<a href="dashboard/add_post" class="w3-button">Ajouter un article</a>
			</div>
			
			<div class="container w3-margin">
				<table class="w3-table-all">
					<tr>
						<th>Titre</th>
						<th>Contenu</th>
						<th>Crée le</th>
						<th>Tags</th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach ($this->view_data['content'] as $post) { ?>
					<tr>
						<td><?=$post->title?></td>
						<td><?=nl2br(mb_strimwidth($post->content, 0, 80, ' [...]'))?></td>
						<td><?=$post->created?></td>
						<td><?=$post->tags?></td>
						<td><a href="<?="dashboard/edit_post/".$post->slug."/".$this->page_id?>">Modifier</a></td>
						<td><a href="<?="posts/delete_post/".$post->id."/".$this->page_id?>" id="delete_post">Supprimer</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="w3-container w3-center">
				<?php if ($this->page_id == 1) { ?>
				<a class="w3-button w3-disabled">«</a>
				<?php } else {?>
				<a href="<?="dashboard/posts/".($this->page_id - 1)?>" class="w3-button">«</a>
				<?php } ?>
				
				Page <?=$this->page_id?> sur <?=$this->total_pages?>
				
				<?php if ($this->page_id == $this->total_pages) { ?>
				<a class="w3-button w3-disabled">»</a>
				<?php } else {?>
				<a href="<?="dashboard/posts/".($this->page_id + 1)?>" class="w3-button">»</a>
				<?php } ?>
			</div>
