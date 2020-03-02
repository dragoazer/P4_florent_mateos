<?php
	$title = 'Blog';
	$css = "public/css/style.css";
	ob_start(); 
?>
	<div class="wrap">
		<form action="index.php?action=modifyPost&post=<?=$_GET["post"]?>" method="POST">
			<p><label for="title">Nouveau titre :</label></p>
			<input value="<?=$req->title()?>" type="text" name="title" id="title" class="form-control">
			<br>
			<p>Ancien texte :</p>
			<p><?=$req->content()?></p>
			<p><label for="content">Nouveau texte :</label></p>
			<textarea name="content" id="content" class="tinyMce"></textarea>
			<input type="submit" id="content2" value="Modifier le chapitre" class="btn btn-secondary">
		</form>
	</div>
<?php
	$content = ob_get_clean(); 
	require('template/template.php'); 
?>