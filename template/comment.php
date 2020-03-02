<?php
$title = 'Commentaire '.$dbPost->title();
$css = "public/css/style.css";
ob_start(); 
?>
<div class="wrap">
	<?php 
		if (isset($_SESSION["connected"])) { 
	?>
		<a href="index.php?action=redirectCreateComment&idPost=<?=$_GET['post']?>" class="btn btn-secondary">Ajouter un commentaire.</a>
	<?php
		} else {
			echo "<a href='index.php?action=registration'>Inscrivez vous pour commenter.</a>";
		}
	?>
	<hr class="separCom">
		<h1>Titre : <?=$dbPost->title()?> <?=date("d/m/Y",strtotime($dbPost->creation_date()))?></h1>
		<p><?=$dbPost->content()?></p>

		<?php
		if (is_array($dataComment)) {
			foreach($dataComment as $dbComment) {
		?>
			<div>
				<hr class="separCom">
		        <h5>
		            <?= htmlspecialchars($dbComment->autor())?> le <?= date("d/m/Y",strtotime($dbComment->comment_date()))?>
		        </h5>
		        <p><?= nl2br(htmlspecialchars($dbComment->comment_text()))?><br/></p>
		        <?php 
		        	if (!empty($_SESSION["connected"]) AND $_SESSION["connected"] === "member") { 
		        		if ($dbComment->moderation() != 1) {
		        ?>
		        			<a class="btn btn-secondary" href='index.php?action=reportedComment&comment=<?=$dbComment->id()?>&idPost=<?=$_GET['post']?>'>Signaler le commentaire.</a>
		    	<?php
		    			} else {
		    	?>
		    					<p>Ce commentaire a déjà été signalé.</p>
		    	<?php		}
		        	} elseif (!empty($_SESSION["connected"]) AND $_SESSION["connected"] === "admin") {
		        ?>
		        	 <hr>
		        	 <a href="index.php?action=modifyCommentRedirect&idCom=<?=$dbComment->id()?>&idPost=<?=$_GET['post']?>" class="btn btn-secondary"> Modifier le commentaire.</a>
		        	 <a  class="btn btn-secondary" href="index.php?action=deleteComment&comment=<?=$dbComment->id()?>&idPost=<?=$_GET['post']?>">Supprimer le commentaire.</a>
		        <?php
		        	} 
		       	?>
		    </div>
		<?php 
			}
		}
		?>
		<hr class="separCom">
		<a href="index.php?action=redirectCreateComment&idPost=<?=$_GET['post']?>" class="btn btn-secondary">Ajouter un commentaire.</a>
</div>
<script src="public/js/commentJs.js"></script>
<?php
$content = ob_get_clean(); 
require('template.php'); 
?>