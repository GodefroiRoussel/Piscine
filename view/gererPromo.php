<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="../assets/css/general.css" />
		<script type="text/javascript" src="../controller/js/modifCodePromo.js"></script>
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
		<p>Promo <?php echo $nomDepartement," ",$annee; ?></p>
		<form action="../controller/gererPromo.controller.php?refPromo=<?php echo $id; if($existeTri){?>&tri=<?php echo $tri;}?>" method="post" onsubmit="return verifCodePromo();">
			<span>Code promo actuel : <?php echo $codePromo ?></span>
			<!-- Bouton qui va afficher la saisie d'un nouveau codePromo -->
			<input type="button" value="Modifier" id="modifier" onclick="afficher();"/>
			<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier --> 
			<div id="new">
				<span>Nouveau :</span>
				<input type="text" name="codePromo" id="codePromo"/>
				<input type="submit" value="Enregistrer" id="enregistrer"/>
			</div>
		</form>
		<div>
			<a href="../controller/ajouterEtudiant.controller.php?refPromo=<?php echo $id ?>" class="btn btn-info">Ajouter un élève</a>
		</div>
		<table>
			<tr>
				<th>Numéro</th>
				<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenom">P</a></th>
				<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nom">N</a></th>
				<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=test">T</a></th>
			</tr>
			<?php
			$i=1;
			foreach ($etudiants as $etudiant){
				?>
				<tr>
					<td><?php echo $i; $i+=1; ?></td>
					<td><?php echo $etudiant['prenom'] ?></td>
					<td><?php echo $etudiant['nom'] ?></td>
					<td><?php if($etudiant['premierTest']){echo "Non";} else{echo "Oui";} ?></td>
					<?php if(!$etudiant['premierTest']){
						?> <!-- on affiche le bouton de reset seulement si on peut le reset donc que le test a été éffectué -->
							<?php if($existeTri){
							?> <!-- on renseigne par quoi on tri seulement si ça a déjà été renseigné auparavant -->
								<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id?>&refEtuTest=<?php echo $etudiant['id']?>&tri=<?php echo $tri ?>">Reset son vrai test</a></td>
							<?php
							}
							else{
							?>
								<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id?>&refEtuTest=<?php echo $etudiant['id']?>">Reset son vrai test</a></td>
							<?php
							?>
						<?php
						}
						?>
					<?php	
					}
					?>
					<td><a href="../controller/modifierEleve.controller.php?refEtuMod=<?php echo $etudiant['id']?>">Modifier</a></td>
					<?php if($existeTri){
							?> <!-- on renseigne par quoi on tri seulement si ça a déjà été renseigné auparavant -->
								<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>&$tri=<?php echo $tri ?>">Supprimer</a></td>
							<?php
							}
							else{
							?>
								<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>">Supprimer</a></td>
							<?php
							}
							?>
				<?php
			}
			?>
				</tr>
		</table>
	</body>
</html>
