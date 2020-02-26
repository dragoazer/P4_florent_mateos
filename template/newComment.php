<?php
	$title = 'Nouveau Billet';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
		<form id="formAddCom" method="post" action="index.php?action=createComment&idPost=<?=$_GET['idPost']?>">
		    <p><label>Nouveau commentaire :</label></p>
		    <p><input class="form-control" type="text" name="commentaire"></p>
		    <input type="submit" value="Envoyer le commentaire" class="btn btn-secondary">
		</form>
	</div>
<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>