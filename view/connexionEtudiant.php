<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/connexionVerificationInfo.js"></script>
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
			<form action="../controller/loginEtudiant.controller.php" method="post" onsubmit="return verifInfoEtudiant()">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" id="email" name="email" placeholder="prenom.nom@etu.umontpellier.fr"/>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" id="passwd" name="passwd" placeholder="Mot de passe"/>
				</div>
				<div class="input-group">
					<span class="input-group-addon">Clef de la promo</span>
					<input type="text" id="clefPromo" name="clefPromo" />
				</div>
					<input type="submit" value="Connexion" />
				</p>
			</form>
		</section>

	</body>

</html>
