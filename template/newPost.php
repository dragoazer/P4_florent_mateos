<?php
	$title = 'Nouveau Billet';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
		<form action="index.php?action=createPost" method="post">
			<p><label>Titrer un billet :</label><p>
			<input type="text" name="nomBillet" class="form-control">
			<p><label>Contenu :</label></p>
			<textarea class="tinyMce" name="contenuBillet"></textarea>
			<input class="btn btn-secondary" type="submit" value="Crée un nouveau billet">
		</form>
	</div>
<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>