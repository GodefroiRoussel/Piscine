<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
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
		<form action="../controller/ajoutEtudiantBdd.controller.php" method="post">
				<p>
					<em>Nom : </em>
					<input type="text" name="nom"/>
				</p>
				<p>
					<em>Prénom : </em>
					<input type="text" name="prenom"/>
				</p>
				<p>
					<em>Adresse universitaire : </em>
					<input type="text" name="email" placeholder="prenom.nom"/>
					<em>@etu.umontpellier.fr</em>
				</p>
				<p>
					<em>Code de la promo : </em>
					<input type="text" name="codePromo" />
				</p>
				<p>
					<input type="submit" value="Ajouter" />
				</p>
		</form>
	</body>
</html>
