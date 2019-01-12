<?php require_once "templates/header.php"; ?>
	<div class="w3-row">
		<div class="w3-col l8 s12">
		<?php foreach ($this->view_data['content']['post'] as $post) { ?>
			<div class="w3-card w3-margin">
				<div class="w3-container w3-center">
					<h1><?=$post->title?></h1>
					<span class="w3-opacity">Publié le <?=date("d/m/Y", $post->created)?> à <?=date("H:i", $post->created)?></span>
				</div>
				
				<div class="w3-container">
					<?php if ($post->image != "None") { ?> 
					<p><img src="<?=$post->image?>" style="width:100%;height:300px"></p>
					<?php } ?>
					<p class="w3-justify"><?=nl2br(htmlspecialchars_decode(mb_strimwidth($post->content, 0, 400, ' [...]')))?></p>
					<hr>
				</div>

				<div class="w3-container">
					<p class="w3-right"><a class="w3-button" href="<?="posts/index/".$this->page_id."/".$post->slug?>" id="read_more">Lire la suite</a></p>
					<p class="w3-left w3-button"><?=$post->comments." <i class=\"fa fa-comments\"></i>"?></p>
					<p class="w3-left w3-button"><?=$post->views?> <i class="fa fa-eye"></i></p>
				</div>
			</div>
		<?php } ?>
			<div class="w3-container w3-center">  
				<?php if ($this->page_id == 1) { ?>
				<a class="w3-button w3-disabled button"><i class="fa fa-angle-double-left"></i></a>
				<?php } else {?>
				<a href="<?="home/index/".($this->page_id - 1)?>" class="w3-button"><i class="fa fa-angle-double-left"></i></a>
				<?php } ?>
				
				Page <?=$this->page_id?> sur <?=$this->total_pages?>
				
				<?php if ($this->page_id == $this->total_pages) { ?>
				<a class="w3-button w3-disabled button"><i class="fa fa-angle-double-right"></i></a>
				<?php } else {?>
				<a href="<?="home/index/".($this->page_id + 1)?>" class="w3-button"><i class="fa fa-angle-double-right"></i></a>
				<?php } ?>
			</div>
		</div>
<?php require_once "templates/footer.php"; ?>
