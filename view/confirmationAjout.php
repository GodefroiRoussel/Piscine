<!DOCTYPE html>
<!-- J'ai l'impression que c'est une page qui sert à rien. Et confimation ajout de quoi?-->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<header>
			<div id="connexion">
			<?php include("buttonInscription.php"); ?>
		</div>
		<div id="menu">
			<?php include("menu.php"); ?>
		</div>
	</header>
		<section>
			<p>Ajout de l'admin <?php
			$decomposer=explode("@",$_POST['adresse']);
			echo $decomposer[0]; ?> éffectué !</p>
			<a href="PageAdmin.php" class="btn btn-info">Retour</a>
		</section>
	</body>
</html>
