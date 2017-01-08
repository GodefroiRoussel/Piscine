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


				<h1>Bienvenue sur le test de Hollande</h1>
				<div>
					<a href="connexionEtudiant.controller.php" class="btn btn-info">Etudiant</a>
				</div>
				<br />
				<div>
					<a href="connexionAdmin.controller.php" class="btn btn-info">Admin</a>
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
		<script src="../assets/js/custom.js"></script>
	</body>
</html>
