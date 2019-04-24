<div class="w3-row w3-margin-top">
	<div class="w3-col l8 s12">
	<?php
	if (empty($posts)) {
		echo "<p class=\"w3-center\">Aucun résultat n'a été trouvé.</p>";
	} else {
		foreach ($posts as $post) { ?>
		<div class="w3-card w3-margin">
			<div class="w3-container w3-center">
				<h1><?=htmlspecialchars($post->title)?></h1>
				<h5 class="w3-opacity">
					Publié le <?=date("d/m/Y", $post->created)?> à <?=date("H:i", $post->created)?>
				</h5>
			</div>

			<div class="w3-container">
				<?php if ($post->image != "None") { ?>
				<p><img src="<?=$post->image?>" style="width:100%;height:300px"></p>
				<?php } ?>
				<p class="w3-justify">
					<?=nl2br(htmlspecialchars_decode(mb_strimwidth($post->content, 0, 400, '[...]')))?>
				</p>
				<hr>
			</div>

			<div class="w3-container">
				<p class="w3-right">
					<a class="w3-button" href="<?="posts/index/".$page_id."/".$post->slug?>" id="read_more">
						Lire la suite
					</a>
				</p>
				<p class="w3-left w3-button"><?=$post->comments." <i class=\"fas fa-comments\"></i>"?></p>
				<p class="w3-left w3-button"><?=$post->views?> <i class="fas fa-eye"></i></p>
			</div>
		</div>
	<?php
		}
	}
	?>
		<div class="w3-container w3-center">
			<?php if ($page_id <= 1) { ?>
			<a class="w3-button w3-disabled"><i class="fas fa-angle-double-left"></i></a>
			<?php } else {?>
			<a href="<?="search/index/".($page_id - 1)?>/<?=$search_query?>" class="w3-button">
				<i class="fas fa-angle-double-left"></i>
			</a>
			<?php } ?>

			Page <?=$page_id?> sur <?=$total_pages?>

			<?php if ($page_id == $total_pages) { ?>
			<a class="w3-button w3-disabled"><i class="fas fa-angle-double-right"></i></a>
			<?php } else {?>
			<a href="<?="search/index/".($page_id + 1)?>/<?=$search_query?>" class="w3-button">
				<i class="fas fa-angle-double-right"></i>
			</a>
			<?php } ?>
		</div>
	</div>
