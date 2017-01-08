<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

				<h1>Bienvenue sur le test de Hollande</h1>
				<div>
					<a href="connexionEtudiant.controller.php" class="btn btn-info">Etudiant</a>
				</div>
				<br />
				<div>
					<a href="connexionAdmin.controller.php" class="btn btn-info">Admin</a>
				</div>
	</body>
</html>
