<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type="text/javascript" src="../controller/js/connexionVerificationInfo.js"></script>
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
	                                    <input class="form-control" id="email" placeholder="@" name="email" type="email" autofocus>
	                                </div>
	                                <div class="form-group">
																			<label>Mot de passe : </label>
	                                    <input class="form-control" id="passwd" placeholder="Password" name="passwd" type="password" value="">
	                                </div>
	                                <div class="checkbox">
	                                    <a href="connexionEtudiant.controller.php">Etudiant?</a>
	                                </div>
	                                <!-- Change this to a button or input when using this as a form -->
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
