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
			$i=1;
			foreach ($etudiants as $etudiant)
				{?>
				<tr>
					<td><?php echo $i; $i+=1; ?></td>
					<td><?php echo $etudiant['email'] ?></td>
					<td><?php if($etudiant['premierTest']){echo "Non";} else{echo "Oui";} ?></td>
					<?php if($etudiant['premierTest']){
						?> <!-- on affiche le bouton de reset seulement si on peut le reset -->
							<td><a href="../controller/resetPremierTest.controller.php?refPromo=<?php echo $_GET['refPromo'] ?>&refEtuTest=<?php echo $etudiant['id']?>">Reset son vrai test</a></td>
							<?php
						}
						?>
					<td><a href="../controller/supprimerEleve.controller.php?refPromo=<?php echo $_GET['refPromo'] ?>&refEtuSupp=<?php echo $etudiant['id']?>">Supprimer</a></td>

				</tr>
			<?php	}?>
		</table>
	</body>
</html>
