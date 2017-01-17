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

			<div class="container">
	        <div class="row">
	            <div class="col-md-4 col-md-offset-4">
	                <div class="login-panel panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Connectez vous</h3>
	                    </div>
	                    <div class="panel-body">
	                        <form action="../controller/loginAdmin.controller.php" method="post" onsubmit="return verifInfoAdmin()" role="form">
	                            <fieldset>
	                                <div class="form-group">
																			<label>Email : </label>
	                                    <input class="form-control" id="email" placeholder="@" name="email" type="email" value="admin@etu" autofocus>
	                                </div>
	                                <div class="form-group">
																			<label>Mot de passe : </label>
	                                    <input class="form-control" id="passwd" placeholder="Password" name="passwd" type="password" value="azerty">
	                                </div>
	                                <div class="checkbox">
	                                    <a href="connexionEtudiant.controller.php">Etudiant?</a>
	                                </div>
																	<input type="submit" class="btn btn-lg btn-success btn-block" value="Connexion" />
	                            </fieldset>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../assets/js/custom.js"></script>
	<script type="text/javascript" src="../controller/js/connexionVerificationInfo.js"></script>
	</body>
</html>
