    <h5>Commentaires (<?=$comments_count?>)</h5>
</div>

<div class="w3-container">
    <table class="w3-table-all">
    	<tr>
    		<th>Auteur</th>
    		<th>Commentaire</th>
    		<th>Date de publication</th>
    		<th>Article</th>
    		<th></th>
    	</tr>
    	<?php foreach ($comments as $comment) { ?>
    	<tr>
    		<td><?=$comment->author?></td>
    		<td><?=$comment->message?></td>
    		<td>le <?=date("d/m/Y", $comment->created)?> à <?=date("H:i", $comment->created)?></td>
            <td><?=$comment->post_slug?></td>
    		<td><a href="<?="dashbord/delete_comment/".$comment->id?>" id="delete_comment">Supprimer</a></td>
    	</tr>
    	<?php } ?>
    </table>
</div>
