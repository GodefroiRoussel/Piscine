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
		<form action="gererPromo.controller.php?refPromo=<?php echo $id?>" method="post" onsubmit="return envoyer();">
			<span>Code promo actuel : <?php echo $codePromo ?></span>
			<!-- Bouton qui va afficher la saisie d'un nouveau codePromo -->
			<input type="button" value="Modifier" id="modifier" onclick="afficher();"/>
			<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier --> 
			<div id="new">
				<span>Nouveau :</span>
				<input type="text" name="codePromo" id="codePromo"/>
				<!-- Autre solution : stocke la valeur de refPromo pour pouvoir raffraichir la page avec les étudiants de la promo
				<input type="text" value="$refPromo" id="refPromo"/>-->
				<input type="submit" value="Enregistrer" id="enregistrer"/>
			</div>
		</form>
		<div>
			<a href="../controller/ajouterEtudiant.controller.php?refPromo=<?php echo $id ?>" class="btn btn-info">Ajouter un élève</a>
		</div>
		<table>
			<tr>
				<th>Numéro</th>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Premier test effectué</th>
			</tr>
			<?php
			$i=1;
			foreach ($etudiants as $etudiant)
				{?>
				<tr>
					<td><?php echo $i; $i+=1; ?></td>
					<td><?php echo $etudiant['prenom'] ?></td>
					<td><?php echo $etudiant['nom'] ?></td>
					<td><?php if($etudiant['premierTest']){echo "Non";} else{echo "Oui";} ?></td>
					<?php if(!$etudiant['premierTest']){
						?> <!-- on affiche le bouton de reset seulement si on peut le reset donc que le test a été éffectué -->
							<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id?>&refEtuTest=<?php echo $etudiant['id']?>">Reset son vrai test</a></td>
							<?php
						}
						?>
					<td><a href="../controller/modifierEleve.controller.php?refEtuMod=<?php echo $etudiant['id']?>">Modifier</a></td>
					<td><a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>">Supprimer</a></td>

				</tr>
			<?php	}?>
		</table>
	</body>
</html>
