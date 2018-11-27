<?php require_once "templates/header.php"; ?>
	<div class="w3-row w3-margin-top">
		<div class="w3-col l8 s12">
			<div class="w3-card w3-margin">
				<div class="w3-container w3-center">
					<h1><?=$this->view_data['content']['post']->title?></h1>
					<h5 class="w3-opacity"><?=$this->view_data['content']['post']->created?></h5>
				</div>
				
				<div class="w3-container">
					<?php if ($this->view_data['content']['post']->image != "None") { ?> 
					<p><img src="<?=$this->view_data['content']['post']->image?>" style="width:100%"></p>
					<?php } ?>
					<p class="w3-justify"><?=htmlspecialchars_decode($this->view_data['content']['post']->content)?></p>
				</div>
			</div>
			
			<?php 
			SESSION::start();
			if (SESSION::item_exists("user")) { 
			?>
			<div class="w3-card w3-margin">
				<div class="w3-container">
					<form action="<?="posts/add_comment/".$this->page_id."/".$this->view_data['content']['post']->slug?>" method="post">
						<input class="w3-input w3-border w3-section" type="text" name="message" required="required" placeholder="Entrer votre commenairet ici"/>
						<button type="submit" class="w3-button w3-margin-bottom">Ajouter un commentaire</button>
					</form>
				</div>
			</div>
			<?php } ?>
			
			<div class="w3-card w3-margin">
				<div class="w3-container">
					<div class="w3-container w3-center w3-margin">
						<h4>Commentaires</h4>
					</div>
					<?php foreach ($this->view_data['content']['comments'] as $comment) { ?>
						<hr>
						<p><strong><?=$comment->author?></strong> <span class="w3-opacity w3-right"><?=$comment->created?></span></p>
						<p class="w3-margin-left"><?=$comment->message?></p>
					<?php } ?>
				</div>
			</div>
			
			<div class="w3-container w3-center">
				<a href="<?="home/index/".$this->page_id?>" class="w3-button">Retour</a>
			</div>
		</div>
<?php require_once "templates/footer.php"; ?>
