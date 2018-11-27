                <h5>Commentaires</h5>
			</div>
			
			<div class="container w3-margin">					
				<table class="w3-table-all">
					<tr>
						<th>Auteur</th>
						<th>Commentaire</th>
						<th>Crée le</th>
						<th>Article</th>
						<th></th>
					</tr>
					<?php foreach ($this->view_data['content'] as $comment) { ?>
					<tr>
						<td><?=$comment->author?></td>
						<td><?=$comment->message?></td>
						<td><?=$comment->created?></td>
                        <td><?=$comment->post_slug?></td>
						<td><a href="<?="posts/delete_comment/".$comment->id?>" id="delete_comment">Supprimer</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>

