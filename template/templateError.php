<?php
	$title = $error;
	$css = "public/css/style.css";
	ob_start(); 
?>
<div class="wrap">
	<?= isset($error)? $error : "Erreur" ?>
</div>
<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>