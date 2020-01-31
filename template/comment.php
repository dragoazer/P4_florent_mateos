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
		<h1>Titre : <?=$dbPost['title']?> <?=$dbPost['creation_date']?></h1>
		<p><?=$dbPost['content']?></p>

		<?php
		while ($row = $dbComment->fetch()) { ?>

			<div>
		        <h5>
		            <?= htmlspecialchars($row['autor'])?>
		            <p>le <?= date("d/m/Y h:i A / H:i",strtotime($row['comment_date']))?></p>
		        </h5>
		        <p><?= nl2br(htmlspecialchars($row['comment_text']))?><br/></p>
		        <?php if (isset($_SESSION["connected"])) { ?>
		        	<a href="index.php?action=reported&comment=<?=$row['id']?>">Signaler le commentaire.</a>
		        <?php
		        } elseif (!empty($_SESSION["connected"]) AND $_SESSION["connected"]) {
		        ?>
		        	<a href="index.php?action=modifyComment&comment=<?=$row['id']?>">Signaler le commentaire.</a>
		        	<a href="index.php?action=deleteComment&comment=<?=$row['id']?>">Signaler le commentaire.</a>
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