<?php
	$title = 'Page d\'accueil';
	$css = "public/css/style.css";
	ob_start(); 
?>
<p>Hey coucou</p>

<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>