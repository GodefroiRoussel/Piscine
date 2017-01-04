<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>

	<hearder>
		<p> Bienvenue <?php echo $prenom." ".$nom; ?></p>
		<div id="connexion">
			<?php include("buttonInscription.php"); ?>
		</div>
	</hearder>

	<body>
		<?php
			if($premierTestBool){ //vrai s'il n'a pas encore passé le test
		?>
		<div>
			<a href="../controller/formulaire.controller.php" class="btn btn-info">Passer le vrai Test</a>
		</div>
		<?php }
			else{ //s'il a déjà passé le test
			?>
		<div>
			<a href="../controller/resultat.controller.php" class="btn btn-info">Consulter son résultat</a>
		</div>
		<br/>
		<div>
			<a href="../controller/formulaire.controller.php" class="btn btn-info">Faire un essai</a>
		</div>
		<?php }
			?>
	</body>
</html>
