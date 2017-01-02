<!DOCTYPE html>
<!-- Passe par un controller avant l'accès aux fonctions sinon n'importe qui peut ajouter un admin'-->
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
	</header>
	<body>
		<div>
			<a href="../controller/voirResultat..controllerphp" class="btn btn-info">Voir résultat d'une promo</a>
		</div>
		<br/>
		<div>
			<a href="../controller/reinitialiserTestEtudiant.controller.php" class="btn btn-info">Réinitialiser le vrai test d'un étudiant</a>
		</div>
		<br/>
		<div>
			<a href="../controller/ajoutAdmin.controller.php" class="btn btn-info">Ajouter un administrateur</a>
		</div>
		<br/>
		<div>
			<a href="../controller/modifierMdp.controller.php" class="btn btn-info">Modifier son mot de passe</a>
		</div>
		<br/>
		<div>
			<a href="../controller/ajoutEtudiant.controller.php" class="btn btn-info">Ajouter un étudiant</a>
		</div>
		<br/>
		<br/>
		<div>
			<a href="../controller/ajoutPromo.controller.php" class="btn btn-info">Ajouter une promotion</a>
		</div>
		<br/>
		<div>
			<a href="../controller/supprimerPromo.controller.php" class="btn btn-info">Supprimer une promotion</a>
		</div>
		<br/>
		<div>
			<a href="../controller/definirCodePromo.controller.php" class="btn btn-info">Définir le code d'une promotion</a>
		</div>
	</body>
</html>
