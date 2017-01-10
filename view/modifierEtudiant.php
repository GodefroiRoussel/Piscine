<!DOCTYPE html>
<!-- Passe par un controller avant la confirmation de la modif-->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/modifEtudiant.js"></script>
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
			<form action="modifEtudiant.controller.php?refPromo=<?php echo $id ?>" onsubmit="return informationsCorrecte();">
				<label>Adresse mail :</label>
				<input type="text" value="<?php echo $email ?>"  id="email" />"
				<div class="form-group">
					<label>Mot de passe : </label>
					
					<div id="new">
						<label>Nouveau :</label>
						<input type="password" name="passwd" id="passwd" />
						<label>Confirmer :</label>
						<input type="password" name="futur" id="futur"/>
					</div>
					<input type="button" value="Modifier" id="modifier" onclick="afficher();"/>
				</div>
				<input type="submit" value="Enregistrer"/>
			</form>
			<form action="gererPromo.controller.php?refPromo=<?php echo $id ?>">	
				<input type="submit" value="Retour" />
			</form>
		</section>
	</body>
</html>