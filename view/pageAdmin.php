<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<header>
		<p> Bienvenue <?php 
			$decomposer=explode("@",$_POST['adresse']);
			echo $decomposer[0]; ?></p>
	</header>
	<body>
		<div>
			<a href="AjoutAdmin.php" class=btn btn-info">Ajouter un admin</a>
		</div>
		<br/>
		<div>
			<a href="ModifierAdmin.php" class=btn btn-info">Modifier ses identifiants</a>
		</div>
	</body>
</html>