<?php
$title = 'Gestion de compte Admin';
$css = "public/css/style.css";
ob_start(); 
?>
	<p>Gestion de compte Admin</p>
<?php
$content = ob_get_clean(); 
require('template.php'); 
?>