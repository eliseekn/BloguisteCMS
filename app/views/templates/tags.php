                <h5>Tags (<?=$this->view_data['content']['tags_count']?>)</h5>
			</div>
			
			<div class="container w3-margin">					
				<table class="w3-table-all">
					<tr>
						<th>Nom du tag</th>
						<th></th>
					</tr>
					<?php foreach ($this->view_data['content']['tags'] as $tag) { ?>
					<tr>
						<td><?=$tag->name?></td>
						<td><a href="<?="dashboard/delete_tag/".$tag->id?>" id="delete_tag">Supprimer</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>

