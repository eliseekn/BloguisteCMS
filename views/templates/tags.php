    <h5>Tags (<?=$tags_count?>)</h5>
</div>

<div class="w3-container">
	<table class="w3-table-all">
		<tr>
			<th>Nom du tag</th>
			<th></th>
		</tr>
		<?php foreach ($tags as $tag) { ?>
		<tr>
			<td><?=$tag->name?></td>
			<td><a href="<?="dashboard/delete_tag/".$tag->id?>" id="delete_tag">Supprimer</a></td>
		</tr>
		<?php } ?>
	</table>
</div>
