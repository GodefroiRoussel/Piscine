<!DOCTYPE html>
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
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Modifier Admin</h1>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<div class="row">
				<div class="col-lg-6">
					<form action="modifierAdmin.controller.php?<?php if ($_GET['refAdmin']) { ?>refAdmin=<?php echo $_GET['refAdmin'];
					} ?>" method="post" onsubmit="return envoyer();" role="form">

						<div class="form-group">
								<div class="form-group">
									<label>Email :</label>
									<input type="email" name="email" id="email" value="<?php echo $email ?>"/>
								</div>
								<div class="form-group">
									<label>Prenom :</label>
									<input type="text" name="prenomFormulaire" id="prenomFormulaire" value="<?php echo $prenom ?>"/>
								</div>
								<div class="form-group">
									<label>Nom :</label>
									<input type="text" name="nomFormulaire" id="nomFormulaire" value="<?php echo $nom ?>"/>
								</div>
						</div>
						<div class="form-group">
							<label>Mot de passe : </label>
							<div id="new">
								<label>Nouveau :</label>
								<input type="password" name="passwd" id="passwd" />
								<label>Confirmer :</label>
								<input type="password" name="futur" id="futur"/>
							</div>
							<input type="button" class="btn btn-primary" value="Modifier" id="modifier" onclick="afficher();"/>
						</div>
						<input type="submit" class="btn btn-success" value="Enregistrer"/>
					</form>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<a href="../controller/consulterAdmin.controller.php?" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
		</div>
		<!-- /. PAGE WRAPPER  -->
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
	<script src="../assets/js/custom.js"></script>
	<script src="../controller/js/ajoutAdmin.js"></script>
</body>
</html>
