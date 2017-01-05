<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<header>
		<p> Bienvenue <?php
			$decomposer=explode("@",$email);
			echo $decomposer[0]; ?></p>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
	</header>
	<body>
		<div>
			<a href="../controller/ajouterEtudiant.controller.php?refPromo=<?php echo $_GET['refPromo'] ?>" class="btn btn-info">Ajouter un élève</a>
		</div>
		<table>
			<tr>
				<th>Numéro</th>
				<th>Email</th>
				<th>Premier test effectué</th>
			</tr>
			<?php 
			foreach ($etudiants as $etudiants)
				{?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $etudiants['email'] ?></td>
					<td><?php if($etudiants['premierTest']){echo "Non"} else{echo "Oui"} ?></td>
					<?php if($etudiants['premierTest']){ 
						?> <!-- on affiche le bouton de reset seulement si on peut le reset -->
							<td><a href="../controller/resetPremierTest.controller.php?refPromo=<?php echo $_GET['refPromo'] ?>&refEtu=<?php echo $etudiants['id']?>">Reset son vrai test</a></td>
					<td><a href="../controller/supprimerEleve.controller.php?refPromo=<?php echo $_GET['refPromo'] ?>&refEtu=<?php echo $etudiants['id']?>">Supprimer</a></td>
				</tr>
		</table>
	</body>
</html>