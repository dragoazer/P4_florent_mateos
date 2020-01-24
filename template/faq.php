<?php
$title = '';
$css = "public/css/style.css";
ob_start(); 
?>

<p>Faq</p>

<?php
$content = ob_get_clean(); 
require('template.php'); 
?>