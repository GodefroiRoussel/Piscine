<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<hearder>
		<p> Bienvenue <?php echo $_POST['prenomNom']; ?></p>
	</hearder>
	<body>
		<div>
			<a href="VraiTest.php" class="btn btn-info">Passer le vrai Test</a> 
		</div>
		<br />
		<div>
			<a href="TestEssai.php" class=btn btn-info">Faire un essai</a>
		</div>
	</body>
</html>
