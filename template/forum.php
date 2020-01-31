<?php
	$title = 'Blog';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
	<?php 
		if (isset($_SESSION["connected"]) AND  $_SESSION["connected"] === "admin") { ?>
			<form action="index.php?action=createPost" method="post">
			<h3>Ajouter un billet</h3>
			<label>Titrer un billet</label>
			<input type="text" name="nomBillet">
			<p><label>Contenu</label></p>
			<p><textarea name="contenuBillet"></textarea></p>
			<input type="submit" value="Crée un nouveau billet">
			</form>
	<?php }  ?>

		<h1>Liste des derniers billets :</h1>
		<?php
		if ($posts) {
		while ($req = $posts->fetch()) {
		?>
			<div>
			    <h3>
			        <?= htmlspecialchars($req['title']) ?>
			        <em>le <?= date("d/m/Y",strtotime($req['creation_date'])); ?></em>
			    </h3>
			    <p>
			    <?= nl2br(htmlspecialchars($req['content'])) ?>
			    <br/>
			    <em><a href="index.php?action=displayComment&post=<?= $req['id'] ?>">Commentaires</a></em>
			    </p>
			</div>
	<?php 
		}
	} else {
		echo "<p>Erreur, pas d'article à afficher.</p>";
	} 
	?>
	</div>
<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>