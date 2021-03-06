<?php
$title = 'Gestion de compte '.$_SESSION["pseudo"];
$css = "public/css/style.css";
ob_start(); 
?>
<div class="wrap">
	<h1>Gestion de compte admin.</h1>
	<p>Email : <?=$informations->email()?></p>
	<p>Nom : <?=$informations->first_name()?></p>
	<p>Prenom : <?=$informations->last_name()?></p>
	<p>Pseudo : <?=$informations->pseudo()?></p>
	<p>Type d'utilisateur : <?php 
	$typeOfUser = $informations->user_type() === 'admin' ?  'Administrateur' :  'Membre'; 
	echo $typeOfUser;
	?>
	</p>

		<h1>Liste des commentaires à modérer :</h1>
		<?php
		if ($commentModeration) {
		foreach ($commentModeration as $data){
		?>
			<hr class="separCom">
			<div>
			    <h3>
			        <?= htmlspecialchars($data->autor()) ?>
			        <em>le <?= date("d/m/Y",strtotime($data->comment_date())); ?></em>
			    </h3>
			    <p>
			    <?= nl2br(htmlspecialchars($data->comment_text())) ?>
			    </p>
			</div>
		    <hr>
		    <a class="btn btn-secondary" href="index.php?action=adminCommentRedirect&idCom=<?= $data->id() ?>"> Modifier le commentaire.</a>
		    <a class="btn btn-secondary" href="index.php?action=adminDeleteComment&comment=<?=$req["id"]?>">Supprimer le commentaire.</a>
		    <a class="btn btn-secondary" href="index.php?action=adminReport&comment=<?=$req["id"]?>">Retirer le signalement.</a>
	<?php 
		}
	} else {
		echo "<p>Erreur, pas de commentaires à modérer.</p>";
	} 
	?>
</div>
<?php
$content = ob_get_clean(); 
require('template.php'); 
?>