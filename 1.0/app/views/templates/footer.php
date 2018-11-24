			<div class="w3-col l4 w3-margin-top">
				<div class="w3-container">
					<form action="search/index/1" method="post">
						<span class="w3-left"><input class="w3-input w3-border" type="text" name="query" maxlength="50" placeholder="Entrez votre recherche ici" required="required" style="width:100%" /></span>
						<span class="w3-right">
							<button type="submit" class="w3-button" style="width:100%"><i class="fa fa-search"></i></span></button>
						</span>
					</form>
				</div>
				
				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>A propos</b></h4>
					<p class="w3-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utali</p>
				</div>
				
				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Contact</b></h4>
					<p class="w3-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Tags</b></h4>
					<p class="w3-justify">
					<?php foreach ($this->view_data['content']['tags'] as $tag) { ?>
						<span class="w3-tag"><a class="w3-button" href="<?="search/index/1/".$tag->name?>"><?=$tag->name?></a></span>
					<?php } ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<footer class="w3-container w3-center w3-padding-32">
		<p>Copytright &copy; 2018, Tous droits réservés.</p> 
		<p>Powered by <a href="https://bitbucket.org/eliseekn/bloguiste#readme" target="_blank">Bloguiste</a></p>
	</footer>
	
	</body>
</html>
