<?php
	$title = 'Blog';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<?= $error ?? "" ?>

	<?php 
		if (isset($_SESSION["connected"]) === "admin") {
			echo "<button>Ajouter un sujet.</button>";
		}  elseif (isset($_SESSION["connected"]) === "member") {
			echo "<button>Demande d'un nouveau sujet.</button>";
		} else {
			echo "<a href='index.php?action=registration'>Inscrivez vous pour créer un sujet.</a>";
		}
	?>

	<form action="index.php?action=createPost" method="post">
		<h3>Ajouter un billet</h3>
		<label>Titrer un billet</label>
		<input type="text" name="nomBillet">
		<p><label>Contenu</label></p>
		<p><textarea name="contenuBillet"></textarea></p>
		<input type="submit" value="Crée un nouveau billet">
	</form>

	<?php if (!isset($error)) {?>
		<h1>Liste des derniers billets :</h1>
		<?php
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
	<?php }}  ?>

<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>