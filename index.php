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
				<?php include("view/buttonInscription.php"); ?>
			</div>
		</header>
		<?php

				//Si un utilisateur n'est pas connecté
				if (!isset($_COOKIE["token"])){
		?>
				<h1>Bienvenue sur le test de Hollande</h1>
				<div>
					<a href="view/connexionEtudiant.php" class="btn btn-info">Etudiant</a>
				</div>
				<br />
				<div>
					<a href="view/connexionAdmin.php" class="btn btn-info">Admin</a>
				</div>
		<?php
		}

			else {
					include('controller/redirection.php');
			}//endelse

		?>
	</body>
</html>
