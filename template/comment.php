<?php
$title = 'Commentaire '.$dbPost['title'];
$css = "public/css/style.css";
ob_start(); 
?>
<?php 
	if (isset($_SESSION["connected"])) {
		echo "<a>Ajouter un commentaire.</a>";
	} else {
		echo "<a href='index.php?action=registration'>Inscrivez vous pour commenter.</a>";
	}
?>

<form method="post" action="index.php?action=setComment&billet=<?=$dbPost["id"]?>">
    <label>Commentaire</label>
    <input type="text" name="commentaire">
    <input type="submit" value="Envoyer le commentaire">
</form>

	<h1>Titre : <?=$dbPost['title']?> <?=$dbPost['creation_date']?></h1>
	<p><?=$dbPost['content']?></p>

	<?php
	while ($row = $dbComment->fetch()) { ?>

		<div>
	        <h3>
	            <?= htmlspecialchars($row['auteur'])?>
	            <em>le <?= date("d/m/Y h:i A / H:i",strtotime($row['date_commentaire']))?></em>
	        </h3>
	        <p><?= nl2br(htmlspecialchars($row['commentaire']))?><br/></p>
	    </div>

	<?php } ?>

<?php
$content = ob_get_clean(); 
require('template.php'); 
?>