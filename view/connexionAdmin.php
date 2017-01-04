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
		</header>

		<section>
			<form action="../controller/loginAdmin.controller.php" method="post">
				<p>
					<em>Adresse mail : </em>
					<input type="text" name="email"/>
				</p>
				<p>
					<em>Mot de passe : </em>
					<input type="password" name="passwd" />
				</p>
				<p>
					<input type="submit" value="Connexion" />
				</p>
			</form>
		</section>

	</body>
</html>
