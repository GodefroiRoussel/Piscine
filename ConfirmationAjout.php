<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<section>
			<p>Ajout de l'admin <?php 
			$decomposer=explode("@",$_POST['adresse']);
			echo $decomposer[0]; ?> éffectué !</p>
			<a href="PageAdmin.php" class="btn btn-info">Retour</a>
		</section>
	</body>
</html>