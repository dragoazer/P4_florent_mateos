<?php
	$title = 'Page d\'accueil';
	$css = "public/css/style.css";
	ob_start(); 
?>
<div class="wrap">
	<H1>Présentation de l'homme et de son oeuvre</h1>
		<br>
	<div id="homeFlex">
		<div>
			<h2>Autobiographie</h2>
			<p>Je suis Roche Jean-Forte écrivain de roman naturaliste, décrivant la nature dans toute sa splendeur et sa simplicité. Originaire de l'Orient en Bretagne où je suis né le 29 février 1978. </p>
			<p>Mon père travaillait comme pêcheur de truite ce qui m'a ouvert l'esprit sur le monde qui m'entoure, ce même esprit me mennant au gré de mes voyages.</p>
			<p> J'ai voyagé dans de nombreuse contrée sauvage, ce qui ma grandement inspirée lors de l'écriture de mes différents romans. </p>
		</div>
		<img class="homeImg" src="public/images/jeanforteroche.jpg">	
	</div>
	<div>
		<h2>Mes autres livres</h2>
		<ul>
			<li>Promenons-nous dans les bois (1998)</li>
			<li>Les bisous de la forêt (2007)</li>
			<li>Le chant des marmottes (2011)</li>
		</ul>
	</div>
	<div>
		<h2>Présentation "billet simple pour l'Alaska" (2020)</h2>
		<p>Résumé : <br> Deux soeurs, Marie et Irène, partent en Alaska pour retrouver leur frère perdu, Gontran, dans les grandes étendues de neiges et de mont gelée.
		Durant leurs périples, elles retrouveront leurs origines et les souvenirs du passé. Arriveront elles à échapper aux démons du passé et enfin revoir leur frère bien-aimé ?</p>
		<img id="homeAlaska" src="public/images/alaska.jpg">
	</div>
	<p id="rgpdHome">(Ce site à pour but la pédagogie et toute ressemblance à des personne réel serait fortuite.)</p>

</div>

<?php
	$content = ob_get_clean(); 
	require('template.php'); 
?>