			<div class="w3-col l4">
				<div class="w3-row-padding w3-margin">
					<form action="search/index/1" method="post">
						<div class="w3-half">
							<input class="w3-input w3-border" type="text" name="query" maxlength="50" placeholder="Entrez votre recherche ici" required="required">
						</div>
						<div class="w3-half">
							<button type="submit" class="w3-button"><i class="fas fa-search"></i> Rechercher</button>
						</div>
					</form>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>A propos</b></h4>
					<hr>
					<p class="w3-justify">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi utali
					</p>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Articles populaires</b></h4>
					<hr>
					<p class="w3-center">
						<ul>
						<?php
							foreach ($archives as $archive) {
								if ($archive->views >= 5) {
						?>
								<li>
									<a href="<?="posts/index/".$page_id."/".$archive->slug?>">
										<?=$archive->title?>
									</a>
								</li>
						<?php
								}
							}
						?>
						</ul>
					</p>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Archives</b></h4>
					<hr>
					<p class="w3-center">
						<ul>
						<?php
							$arhives = [];
							foreach ($archives as $archive) {
								$archive_date = Functions::generate_archive_date($archive->created);
								if (!in_array($archive_date, $archives)) {
									$archives[] = $archive_date;
						?>
									<li>
										<a href="<?="archives/index/1/".$archive_date?>">
											<?=$archive_date?>
										</a>
									</li>
						<?php
								}
							}
						?>
						</ul>
					</p>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Tags</b></h4>
					<hr>
					<p class="w3-justify">
					<?php foreach ($tags as $tag) { ?>
						<span class="w3-tag">
							<a class="w3-button" href="<?="search/index/1/".$tag->name?>"><?=$tag->name?></a>
						</span>
					<?php } ?>
					</p>
				</div>

				<div class="w3-container w3-card w3-margin">
					<h4 class="w3-center"><b>Suivez-moi</b></h4>
					<hr>
					<p class="w3-center w3-text-blue-grey">
						<a href="#"><i class="fab fa-facebook-square w3-xlarge"></i></a>
						<a href="#"><i class="fab fa-linkedin w3-xlarge"></i></a>
						<a href="#"><i class="fab fa-twitter w3-xlarge"></i></a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<footer class="w3-container w3-center w3-padding-32 w3-blue-grey w3-margin-top">
		<p>Copyright &copy; 2019, Tous droits réservés.</p>
		<p>Powered by <a href="https://bitbucket.org/eliseekn/bloguistecms#readme" target="_blank">BloguisteCMS</a></p>
	</footer>

	<script type="text/javascript" src="layout/assets/js/dist/script.min.js"></script>
	</body>
</html>
