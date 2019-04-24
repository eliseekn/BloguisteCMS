	<h5>Articles (<?=$posts_count?>)</h5>
	<a href="dashboard/add_post" class="w3-button">Ajouter un article</a>
</div>

<div class="w3-container">
	<table class="w3-table-all">
		<tr>
			<th>Titre</th>
			<th>Contenu de l'article</th>
			<th>Date de publication</th>
			<th>Tags</th>
			<th>Image d'entête</th>
			<th>Nombre de vues</th>
			<th>Nombre de commentaires</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach ($posts as $post) { ?>
		<tr>
			<td><?=$post->title?></td>
			<td><?=nl2br(mb_strimwidth($post->content, 0, 150, ' [...]'))?></td>
			<td>le <?=date("d/m/Y", $post->created)?> à <?=date("H:i", $post->created)?></td>
			<td><?=$post->tags?></td>
			<td>
			<?php if ($post->image != "None") { ?>
				<p><img src="<?=$post->image?>" style="width:100px;height:80px"></p>
			<?php } ?>
			</td>
			<td><?=$post->views?></td>
			<td><?=$post->comments?></td>
			<td><a href="<?="dashboard/edit_post/".$post->slug."/".$page_id?>">Modifier</a></td>
			<td><a href="<?="dashboard/delete_post/".$post->id."/".$page_id?>" id="delete_post">Supprimer</a></td>
		</tr>
		<?php } ?>
	</table>
</div>

<div class="w3-container w3-center w3-margin">
	<?php if ($page_id <= 1) { ?>
	<a class="w3-button w3-disabled"><i class="fas fa-angle-double-left"></i></a>
	<?php } else {?>
	<a href="<?="dashboard/posts/".($page_id - 1)?>" class="w3-button"><i class="fas fa-angle-double-left"></i></a>
	<?php } ?>

	Page <?=$page_id?> sur <?=$total_pages?>

	<?php if ($page_id == $total_pages) { ?>
	<a class="w3-button w3-disabled"><i class="fas fa-angle-double-right"></i></a>
	<?php } else {?>
	<a href="<?="dashboard/posts/".($page_id + 1)?>" class="w3-button"><i class="fas fa-angle-double-right"></i></a>
	<?php } ?>
</div>
