<!DOCTYPE html>
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
		</header>

		<section>
			<form action="../controller/loginEtudiant.controller.php" method="post">
				<p>
					<em>Adresse universitaire : </em>
					<input type="text" name="email" placeholder="prenom.nom"/>
					<em>@etu.umontpellier.fr</em>
				</p>
				<p>
					<em>Mot de passe (initialement le même que la clefPromo) : </em>
					<input type="password" name="passwd" />
				</p>
				<p>
					<em>Clef de la promo : </em>
					<input type="text" name="clefPromo" />
				</p>
				<p>
					<input type="submit" value="Connexion" />
				</p>
			</form>
		</section>

	</body>

</html>
