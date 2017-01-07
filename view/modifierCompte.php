<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="../assets/css/general.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/ajoutAdmin.js"></script>
	</head>
	<header>
		<p> Bienvenue <?php
			$decomposer=explode("@",$email);
			echo $decomposer[0]; ?></p>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
			<div id="menu">
				<?php include("menu.php"); ?>
			</div>
	</header>
	<body>
		<?php
			if($affichageMessage && !is_null($modifReussiMail)){
				echo "Modifications enregistrées";
			}
		?>
		<section>
			<form action="modifierCompte.controller.php" method="post" onsubmit="return envoyer();">
					<span>Adresse mail : </span>
					<?php
					if($role==="etudiant"){
						?>
							<span> <?php echo $email ?> </span>
					<?php
					}
					else {
						?>
						<input type="email" name="email" id="email" value="<?php echo $email ?>"/>
					<?php
					}
					?>
					<div>
						<span>Mot de passe : </span>

						<div id="new">
							<span>Nouveau :</span>
							<input type="password" name="passwd" id="passwd" />
						</div>
						<div id="confirmer">
							<span>Confirmer :</span>
							<input type="password" name="futur" id="futur"/>
						</div>
					<input type="button" value="Modifier" id="modifier" onclick="afficher();"/>
					</div>
					<input type="submit" value="Enregistrer"/>
			</form>
		</section>
	</body>
