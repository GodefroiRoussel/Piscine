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
				<?php 
				if($existeTri){
					if($tri=="departementCroissant"){?>
						<th>Département <a href="../controller/administrerPromo.controller.php?tri=departementDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					<?php
					}
					elseif($tri=="departementDecroissant"){?>
						<th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					<?php
					}
					else{?>
						<th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					<?php
					}
				}
				else{?>
					<th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
				<?php
				}?>
				<?php
				if($existeTri){
					if($tri=="anneeCroissant"){?>
						<th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					<?php
					}
					elseif($tri=="anneeDecroissant"){?>
						<th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					<?php
					}
					else{?>
						<th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					<?php
					}
				}
				else{?>
					<th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
				<?php
				}?>
				<?php
				if($existeTri){
					if($tri=="clefPromoCroissant"){?>
						<th>Clef de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					<?php
					}
					elseif($tri=="clefPromoDecroissant"){?>
						<th>Clef de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					<?php
					}
					else{?>
						<th>Clef de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					<?php
					}
				}
				else{?>
					<th>Clef de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
				<?php
				}?>
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
