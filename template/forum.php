<?php
	$title = 'Blog';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
	<?php 
		if (isset($_SESSION["connected"]) AND  $_SESSION["connected"] === "admin") :
	?>
			<a href="index.php?action=redirectCreatePost" class="btn btn-secondary">Ajouter un billet</a>
	<?php endif; ?>

		<h1>Liste des derniers épisodes :</h1>
		<?php
		if (isset($posts) AND !empty($posts) AND is_array($posts)) {
		foreach ($posts as $req ) {
		?>
			<div>
				<hr class="separCom">
			    <h3>
			        <?= $req->title() ?>
			        <em>le <?= date("d/m/Y",strtotime($req->creation_date())); ?></em>
			    </h3>
			    <p>
			    	<?= nl2br(substr($req->content(), 0, 1200)) ?>
				</p>
			    <br/>
			    <p>
				    <a class="btn btn-secondary" href="index.php?action=displayComment&post=<?= $req->id()?>">Voir plus...</a>
					<?php 
						if (isset($_SESSION["connected"]) AND  $_SESSION["connected"] === "admin") :
					?>
					    <a class="btn btn-secondary" href="index.php?action=redirectModifyPost&post=<?= $req->id()?>">Modifier</a>
					    <a class="btn btn-secondary" href="index.php?action=deletePost&post=<?= $req->id()?>">Supprimer</a>
					<?php endif; ?>
			    </p>
			</div>
	<?php 
		}
	} else {
		echo "<p>Erreur, pas d'article à afficher.</p>";
	} 
	?>
	<hr class="separCom">
	<?php 
		if (isset($_SESSION["connected"]) AND  $_SESSION["connected"] === "admin") :
	?>
		
		<a href="index.php?action=redirectCreatePost" class="btn btn-secondary">Ajouter un billet</a>
	<?php endif; ?>
	</div>

<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>