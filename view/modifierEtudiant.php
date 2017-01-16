<!DOCTYPE html>
<!-- Passe par un controller avant la confirmation de la modif-->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<link href="../assets/css/general.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/modifEtudiant.js"></script>
	</head>
	<body>
		<div id="wrapper">
				<?php include("menu/menuTop.php"); ?>
				<!-- /. NAV TOP  -->
				<!-- NAV SIDE only if we are connected -->
				<?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
					 include("menu/side_menu.php");
				} ?>
			<div id="page-wrapper">
				<div id="page-inner">
					<h2>Informations de l'étudiant <?php echo $prenom," ",$nom ?></h2>
					<hr />
					<form action="../controller/modifEtudiant.controller.php?refPromo=<?php echo $id ?>&refEtuMod=<?php echo $idEtuMod ?>" method="post" onsubmit="return informationsCorrectes();">
						<label>Adresse mail :</label>
						<input type="text" value="<?php echo $email ?>"  name="email" />
						<br/>
						<label>Nom :</label>
						<input type="text" value="<?php echo $nom ?>"  name="nom" />
						<br/>
						<label>Prénom :</label>
						<input type="text" value="<?php echo $prenom ?>"  name="prenom" />
						<br/>
						<label>Code promo :</label>
						<input type="text" value="<?php echo $codePromo ?>"  name="codePromo" />
						<div class="form-group">
							<label>Mot de passe : </label>

							<div id="new">
								<label>Nouveau :</label>
								<input type="password" name="passwd" id="passwd" />
								<label>Confirmer :</label>
								<input type="password" name="futur" id="futur"/>
							</div>
							<input type="button" value="Modifier" id="modifier" class="btn btn-primary" onclick="afficher();"/>
						</div>
						<input type="submit" value="Enregistrer" class="btn btn-success"/>
					</form>
					<hr />
					<a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
				</div>
			</div>
		</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="../assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script type="text/javascript" src="../controller/js/modifEtudiant.js"></script>
	<script src="../assets/js/custom.js"></script>
	</body>
</html>
