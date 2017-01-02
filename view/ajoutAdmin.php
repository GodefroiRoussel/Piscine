<!DOCTYPE html>
<!-- Passe par un controller avant de confirmer l'ajout -->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<section>
			<form action="ConfirmationAjoutAdmin.php" method="post">
				<p>
					<em>Adresse mail : </em>
					<input type="text" name="adresse"/>
				</p>
				<p>
					<em>Mot de passe : </em>
					<input type="text" name="MotDePasse" />
				</p>
				<p>
					<input type="submit" value="Ajouter" />
				</p>
			</form>
		</section>
	</body>
