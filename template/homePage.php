<?php
	$title = 'Page d\'accueil';
	$css = "public/css/style.css";
	ob_start(); 
?>
<div class="wrap">
	<p>Hey coucou</p>
</div>

<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>