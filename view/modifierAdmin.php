<!DOCTYPE html>
<!-- Passe par un controller avant la confirmation de la modif-->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<section>
			<form action="ConfirmationModifAdmin.php" method="post">
				<p>
					<em>Adresse mail : </em>
					<input type="text" name="adresse"/>
				</p>
				<p>
					<em>Mot de passe : </em>
					<input type="text" name="MotDePasse" />
				</p>
				<p>
					<input type="submit" value="Enregistrer" />
				</p>
			</form>
		</section>
	</body>
