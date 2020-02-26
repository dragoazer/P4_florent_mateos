<?php
	$title = 'Blog';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
	<?php 
		if (isset($_SESSION["connected"]) AND  $_SESSION["connected"] === "admin") { ?>
			<a href="index.php?action=redirectCreatePost" class="btn btn-secondary">Ajouter un billet</a>
	<?php }  ?>

		<h1>Liste des derniers billets :</h1>
		<?php
		if ($posts) {
		foreach ($posts as $req ) {
		?>
			<div>
				<hr class="separCom">
			    <h3>
			        <?= $req->title() ?>
			        <em>le <?= date("d/m/Y",strtotime($req->creation_date())); ?></em>
			    </h3>
			    <p>
			    <?= nl2br($req->content()) ?>
			    <br/>
			    <em><a href="index.php?action=displayComment&post=<?= $req->id() ?>">Commentaires</a></em>
			    </p>
			</div>
	<?php 
		}
	} else {
		echo "<p>Erreur, pas d'article à afficher.</p>";
	} 
	?>
		<hr class="separCom">
		<a href="index.php?action=redirectCreatePost" class="btn btn-secondary">Ajouter un billet</a>
	</div>

<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>