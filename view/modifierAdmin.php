<!DOCTYPE html>
<!-- Passe par un controller avant la confirmation de la modif-->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<section>
			<form action="ConfirmationModif.php" method="post">
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
