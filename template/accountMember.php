<?php
$title = '';
$css = "public/css/style.css";
ob_start(); 
?>

<?php
$content = ob_get_clean(); 
require('template.php'); 
?>