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
			<a href="../controller/ajouterPromo.controller.php" class="btn btn-info">Ajouter une promo</a>
		</div>
		<table>
			<tr>
				<th>Code de la promo</th>
			</tr>
			<?php 
				foreach $promos as $promos{
			?>
					<tr>
						<td><?php echo $promos["codePromo"] ?></td>
						<td><a href="../controller/gererEtudiantPromo.controller.php?refPromo=<?php echo $promos['codePromo']?>">Gérer les étudiants de la promo</a></td>
						<td><a href="../controller/modifierCodePromo.controller.php?refPromo=<?php echo $promos['codePromo']?>">Modifier le code de la promo</a></td>
						<td><a href="../controller/supprimerPromo.controller.php?refPromo=<?php echo $promos['codePromo']?>">Supprimer</a></td>
					</tr>
			<?php
				}?>
		</table>
	</body>
</html>



						

