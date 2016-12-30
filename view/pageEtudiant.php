<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<hearder>
		<p> Bienvenue <?php echo $prenom." ".$nom; ?></p>
	</hearder>
	<body>
		<?php 
			if($premierTestBool){ //vrai s'il n'a pas encore passé le test
		?>
		<div>
			<a href="../Formulaire/formulaire2.php" class="btn btn-info">Passer le vrai Test</a>
		</div>
		<?php }
			else{ //s'il a déjà passé le test
			?>
		<div>
			<a href="resultat.controller.php" class="btn btn-info">Consulter son résultat</a>
		</div>
		<br/> 
		<div>
			<a href="../view/TestEssai.php" class="btn btn-info">Faire un essai</a>
		</div>
		<?php }
			?>
	</body>
</html>
