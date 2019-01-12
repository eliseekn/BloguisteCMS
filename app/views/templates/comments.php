                <h5>Commentaires (<?=$this->view_data['content']['comments_count']?>)</h5>
			</div>
			
			<div class="container w3-margin">					
				<table class="w3-table-all">
					<tr>
						<th>Auteur</th>
						<th>Commentaire</th>
						<th>Date de publication</th>
						<th>Article</th>
						<th></th>
					</tr>
					<?php foreach ($this->view_data['content']['comments'] as $comment) { ?>
					<tr>
						<td><?=$comment->author?></td>
						<td><?=$comment->message?></td>
						<td>le <?=date("d/m/Y", $comment->created)?> à <?=date("H:i", $comment->created)?></td>
                        <td><?=$comment->post_slug?></td>
						<td><a href="<?="posts/delete_comment/".$comment->id?>" id="delete_comment">Supprimer</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>

