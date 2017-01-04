<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="../controller/js/ajoutAdmin.js"></script>
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
		<?php
			if(isset($modifReussiMail) && isset($modifReussiPasswd) && $modifReussiMail  && $modifReussiPasswd){
				echo "Modifications enregistrées";
			}
		?>
		<section>
			<form action="ConfirmationModif.php" method="post" onsubmit="return informationsCorrecte();">
				<p>
					<em>Adresse mail : </em>
					<input type="email" name="email" value=<?php echo $email ?>/>
				</p>
				<p>
					<em>Mot de passe : </em>
					<input type="password" name="passwd"/>
				</p>
				<p>
				<p>
					<input type="submit" value="Enregistrer" />
				</p>
			</form>
		</section>
	</body>
