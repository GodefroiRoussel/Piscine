<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<header>
		<p> Bienvenue <?php
			$decomposer=explode("@",$email);
			echo $decomposer[0]; ?></p>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
	</header>

	<body>
		<div>
			<a href="../controller/administrerPromo.controllerphp" class="btn btn-info">Administrer les promos</a>
		</div>
		<br/>
		<div>
			<a href="../controller/ajoutAdmin.controller.php" class="btn btn-info">Ajouter un administrateur</a>
		</div>
		<br/>
		<div>
			<a href="../controller/gererAdmin.controller.php" class="btn btn-info">Gerer les administrateurs</a>
		</div>
		<br/>
		<div>
			<a href="../controller/modifierCompte.controller.php" class="btn btn-info">Modifier ses identifiants</a>
		</div>
	</body>
</html>
