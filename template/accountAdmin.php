<?php
$title = 'Gestion de compte '.$_SESSION["pseudo"];
$css = "public/css/style.css";
ob_start(); 
?>
	<h1>Gestion de compte admin.</h1>
	<p>Email : <?=$informations['email']?></p>
	<p>Nom : <?=$informations['first_name']?></p>
	<p>Prenom : <?=$informations['last_name']?></p>
	<p>Pseudo : <?=$informations['pseudo']?></p>
	<p>Type d'utilisateur : <?php 
	$typeOfUser = $informations['user_type'] === 'admin' ?  'Administrateur' :  'Membre'; 
	echo $typeOfUser;
	?>
	</p>

		<h1>Liste des commentaires à modérer :</h1>
		<?php
		if ($commentModeration) {
		while ($req = $commentModeration->fetch()) {
		?>
			<div>
			    <h3>
			        <?= htmlspecialchars($req['autor']) ?>
			        <em>le <?= date("d/m/Y",strtotime($req['comment_date'])); ?></em>
			    </h3>
			    <p>
			    <?= nl2br(htmlspecialchars($req['comment_text'])) ?>
			    </p>
			</div>
			 <button> Modifier le commentaire.</button>
		    <form method="post" action="index.php?action=adminModifyComment&comment=<?=$req['id']?>">
				<label>Nouveau texte.</label>
				<input type="text" name="commentaire">
				<input type="submit" value="Envoyer le nouveau commentaire">
			</form>
		    <hr>
		    <a href="index.php?action=adminDeleteComment&comment=<?=$req["id"]?>">Supprimer le commentaire.</a>
		    <a href="index.php?action=adminReport&comment=<?=$req["id"]?>">Retirer le signalement.</a>
	<?php 
		}
	} else {
		echo "<p>Erreur, pas de commentaires à modérer.</p>";
	} 
	?>
<?php
$content = ob_get_clean(); 
require('template.php'); 
?>