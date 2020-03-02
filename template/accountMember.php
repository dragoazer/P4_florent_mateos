<?php
$title = 'Gestion de compte '.$_SESSION["pseudo"];
$css = "public/css/style.css";
ob_start(); 
?>
<div class="wrap">
	<h1>Gestion de compte membre.</h1>
	<p>Email : <?=$informations->email()?></p>
	<p>Nom : <?=$informations->first_name()?></p>
	<p>Prenom : <?=$informations->last_name()?></p>
	<p>Pseudo : <?=$informations->pseudo()?></p>
	<p>Type d'utilisateur : <?php 
	$typeOfUser = $informations->user_type() === 'admin' ?  'Administrateur' :  'Membre'; 
	echo $typeOfUser;
	?>
	</p>
</div>

<?php
$content = ob_get_clean(); 
require('template.php'); 
?>