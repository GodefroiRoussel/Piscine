<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Inscription au test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>

	<body>

		<header>
			<div id="inscription">

			</div>
		</header>

		<section>
			<form action="../controller/verifInscription.controller.php" method="post">
				<div class="input-group">
					<span class="input-group-addon">Nom</span>
					<input type="text" name="nom" placeholder="nom"/>
				</div>

				<div class="input-group">
					<span class="input-group-addon">Prénom</span>
					<input type="text" name="prenom" placeholder="prenom" />
				</div>

				<div class="input-group">
					<label class="input-group-addon">Email universitaire</label>
					<input type="text" name="email" placeholder="prenom.nom" />
					@etu.umontpellier.Fr
				</div>

				<div class="input-group">
					<span class="input-group-addon">Mot de passe</span>
					<input type="password" name="passwd" />
				</div>

				<div class="input-group">
					<span class="input-group-addon">Confirmation mot de passe</span>
					<input type="password" name="passwdconf" />
				</div>

				<div class="input-group">
					<span class="input-group-addon">Clef de la promo</span>
					<input type="text" name="clefPromo" />
				</div>
					<input type="submit" value="Valider l'inscription" />
				</p>
			</form>
		</section>

	</body>

</html>
