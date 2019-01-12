				<h5>Utilisateurs inscrits (<?=$this->view_data['content']['users_count']?>)</h5>
			</div>
			
			<div class="container w3-margin">
				<table class="w3-table-all">
					<tr>
						<th>Nom d'utilisateur</th>
						<th>Email</th>
						<th>Date d'inscription</th>
						<th></th>
					</tr>
					<?php 
					foreach ($this->view_data['content']['users'] as $user) { 
						if ($user->privileges != "admin") {
					?>
					<tr>
						<td><?=$user->username?></td>
						<td><?=$user->email?></td>
						<td>le <?=date("d/m/Y", $user->created)?> à <?=date("H:i", $user->created)?></td>
						<td><a href="<?="dashboard/delete_user/".$user->id?>" id="delete_user">Supprimer</a></td>
					</tr>
					<?php 
						} 
					} ?>
				</table>
			</div>
