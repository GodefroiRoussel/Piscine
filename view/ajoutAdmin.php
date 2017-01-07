<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/ajoutAdmin.js"></script>
	</head>
	<header>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
			<div id="menu">
				<?php include("menu.php"); ?>
			</div>
	</header>
	<body>
		<?php
			if(isset($ajoutReussi) && $ajoutReussi){
				echo "Ajout de l'administrateur ",$_POST["email"]," réussit";
			}
		?>
		<section>
			<form action="ajoutAdmin.controller.php" method="post" onsubmit="return informationsCorrecte();">
				<p>
					<em>Adresse mail : </em>
					<input type="text" name="email" id="email"/>
				</p>
				<p>
					<em>Mot de passe : </em>
					<input type="password" name="passwd" id="passwd"/>
				</p>
				<p>
					<input type="submit" value="Ajouter"/>
				</p>
			</form>
		</section>
	</body>
