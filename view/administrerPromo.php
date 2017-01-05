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
				<th>Numéro</th>
				<th>Département</th>
				<th>Année</th>
				<th>Clef de la promo</th>
			</tr>
			<?php
				$i=1;
				foreach ($promos as $promo){
			?>
					<tr>
						<td><?php echo $i; $i+=1; ?></td>
						<td><?php echo $promo["nom"]?></td>
						<td><?php echo $promo["anneePromo"]?></td>
						<td><?php echo $promo["codePromo"] ?></td>
						<td><?php echo $promo["id"]?></td>
						<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $promo['id']?>">Gérer la promo</a></td>
						<td><a href="../controller/supprimerPromo.controller.php?refPromo=<?php echo $promo['id']?>">Supprimer</a></td>
					</tr>
			<?php
				}?>
		</table>
	</body>
</html>
