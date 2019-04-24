	<h5>Utilisateurs inscrits (<?=$users_count?>)</h5>
</div>

<div class="w3-container">
	<table class="w3-table-all">
		<tr>
			<th>Nom d'utilisateur</th>
			<th>Email</th>
			<th>Date d'inscription</th>
			<th></th>
		</tr>
		<?php
		foreach ($users as $user) {
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
		}
		?>
	</table>
</div>
