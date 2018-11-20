                <h5>Tags</h5>
			</div>
			
			<div class="container">					
				<table class="w3-table-all">
					<tr>
						<th>Nom du tag</th>
						<th></th>
					</tr>
					<?php foreach ($this->view_data['content'] as $tag) { ?>
					<tr>
						<td><?=$tag->name?></td>
						<td><a href="<?="posts/delete_tag/".$tag->id?>">Supprimer</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>

