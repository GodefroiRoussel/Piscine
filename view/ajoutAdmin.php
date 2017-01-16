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
						<h1>Ajouter Admin</h1>
					</div>
					<?php
					if($ajoutReussi){
						?>
						<div class="col-md-12">
							<h5>Ajout effectué</h5>
						</div>
					<?php
						}
						?>
				</div>
				<!-- /. ROW  -->
				<hr />
				<div class="row">
					<div class="col-lg-6">
						<form action="ajoutAdmin.controller.php?" method="post" onsubmit="return envoyer();" role="form">
							<div class="form-group">
								<div class="form-group">
									<label>Email :</label>
									<input type="email" name="email" id="email" value=""/>
								</div>
								<div class="form-group">
									<label>Prenom :</label>
									<input type="text" name="prenomNewAdmin" id="prenomNewAdmin" value=""/>
								</div>
								<div class="form-group">
									<label>Nom :</label>
									<input type="text" name="nomNewAdmin" id="nomNewAdmin" value=""/>
								</div>
								<div class="form-group">
									<label>Mot de passe :</label>
									<input type="password" name="passwd" id="passwd" value=""/>
								</div>
							</div>
							<input type="submit" class="btn btn-success" value="Enregistrer"/>
						</form>
					</div>
				</div>
				<!-- /. ROW  -->
				<hr />
				<a href="../controller/consulterAdmin.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
			</div>
			<!-- /. PAGE WRAPPER  -->
		</div>
		<!-- /. WRAPPER  -->
	</div>
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
