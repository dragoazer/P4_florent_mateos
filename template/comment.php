<?php
$title = 'Commentaire '.$dbPost['title'];
$css = "public/css/style.css";
ob_start(); 
?>
<div class="wrap">
	<?php 
		if (isset($_SESSION["connected"])) { 
	?>
		<h3>Ajouter un commentaire.</h3>
		<form method="post" action="index.php?action=createComment&idPost=<?=$_GET['post']?>">
	    	<label>Commentaire</label>
	    	<input type="text" name="commentaire">
	    	<input type="submit" value="Envoyer le commentaire">
		</form>
	<?php
		} else {
			echo "<a href='index.php?action=registration'>Inscrivez vous pour commenter.</a>";
		}
	?>
	<hr>
		<h1>Titre : <?=$dbPost['title']?> <?=$dbPost['creation_date']?></h1>
		<p><?=$dbPost['content']?></p>

		<?php
		while ($row = $dbComment->fetch()) { ?>

			<div>
				<hr>
		        <h5>
		            <?= htmlspecialchars($row['autor'])?> le <?= date("d/m/Y",strtotime($row['comment_date']))?>
		        </h5>
		        <p><?= nl2br(htmlspecialchars($row['comment_text']))?><br/></p>
		        <?php 
		        	if (!empty($_SESSION["connected"]) AND $_SESSION["connected"] === "member") { 
		        		if ($row['moderation'] != 1) {
		        ?>
		        			<a href='index.php?action=reportedComment&comment=<?=$row['id']?>&idPost=<?=$_GET['post']?>'>Signaler le commentaire.</a>
		    	<?php
		    			} else {
		    	?>
		    					<p>Ce commentaire a déjà été signalé.</p>
		    	<?php		}
		        	} elseif (!empty($_SESSION["connected"]) AND $_SESSION["connected"] === "admin") {
		        ?>
		        	 <button> Modifier le commentaire.</button>
		        	 <form method="post" action="index.php?action=modifyComment&comment=<?=$row['id']?>&idPost=<?=$_GET['post']?>">
				    	<label>Nouveau texte.</label>
				    	<input type="text" name="commentaire">
				    	<input type="submit" value="Envoyer le nouveau commentaire">
					</form>
		        	 <hr>
		        	 <a href="index.php?action=deleteComment&comment=<?=$row["id"]?>&idPost=<?=$_GET['post']?>">Supprimer le commentaire.</a>
		        <?php
		        } 
		        ?>
		    </div>

		<?php } ?>
</div>
<?php
$content = ob_get_clean(); 
require('template.php'); 
?>