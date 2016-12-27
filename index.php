<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
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
