<?php
	$title = 'Modification de commentaire';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
		<form  method="post" action="index.php?action=adminModifyComment&comment=<?=$_GET['idCom']?>">
			<label>Nouveau texte.</label>
			<p><textarea name="commentaire" class="form-control"></textarea></p>
			<input class="btn btn-secondary" type="submit" value="Envoyer le nouveau commentaire">
		</form>
	</div>
<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>