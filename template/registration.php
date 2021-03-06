<?php
	$title = 'Writer Blog - Inscription Connexion';
	$css = "public/css/style.css";
	ob_start(); 
?>
<div class="wrap" id="signinFlex">
	<div id="signin">
		<div id="inscription">
			<form class="form-group" action="index.php?action=newRegistration" method="post">
				<label for="pwdConect">Email</label>
				<input type="text" name="email" class="form-control">
				<label for="pwdConect">Nom</label>
				<input type="text" name="first_name" class="form-control">
				<label for="pwdConect">Prénom</label>
				<input type="text" name="last_name" class="form-control">
				<label for="pwdConect">Pseudo</label>
				<input type="text" name="pseudo" class="form-control">
				<label for="pwdConect">Mot de passe</label>
				<input type="password" name="pwd" class="form-control">
				<p><input type="submit" class=" signinButton btn btn-primary" value="Inscription"></p>
			</form>
		</div>
	</div>
		<hr id="signinSeparator">
	<div id="signin">
		<div id="connexion">
			<form class="form-group" action="index.php?action=login" method="post">
				<label for="pwdConect">Email</label>
				<input type="text" name="emailConect" class="form-control">
				<label for="pwdConect">Mot de passe</label>
				<input type="password" name="pwdConect" class="form-control">
				<button class="btn btn-primary signinButton">Connexion</button>
			</form>
		</div>
		<?= $error??"" ?>
	</div>
</div>
<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>