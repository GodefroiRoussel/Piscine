<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<header>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
			<div id="menu">
				<?php include("menu.php"); ?>
			</div>
	</header>

	<body>
		<div>
			<a href="../controller/ajouterPromo.controller.php" class="btn btn-info">Ajouter une promo</a>
		</div>
		<table>
			<tr>
				<th>Numéro</th>
				<th>Département <a href="../controller/administrerPromo.controller.php?tri=departement">D</a></th>
				<th>Année <a href="../controller/administrerPromo.controller.php?tri=annee">A</a></th>
				<th>Clef de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromo">C</a></th>
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
						<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $promo['id']?>">Gérer la promo</a></td>
						<td><a href="../controller/administrerPromo.controller.php?<?php if($existeTri){?>tri=<?php echo $tri;}?>">Supprimer</a></td>
					</tr>
			<?php
				}?>
		</table>
	</body>
</html>
