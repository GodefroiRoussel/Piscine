<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Inscription au test de Hollande</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" !important/>
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
													<h3 class="panel-title centrer">Inscription</h3>
											</div>
											<div class="panel-body">
													<form action="../controller/verifInscription.controller.php" method="post" onsubmit="return verifInfoEtudiant()" role="form">
															<fieldset>
																	<div class="form-group">
																			<label>Nom : </label>
																			<input type="text" class="form-control" name="nom" value="Durand" placeholder="Nom" autofocus/>
																	</div>
																	<div class="form-group">
																			<label>Prénom : </label>
																			<input type="text" class="form-control" name="prenom" value="Pierre" placeholder="Prénom">
																	</div>
																	<div class="form-group">
																			<label>Email universitaire : </label>
																			<input type="text" class="form-control" name="email" value="pierre.durand" placeholder="prenom.nom">
																			@etu.umontpellier.fr
																	</div>
																	<div class="form-group">
																			<label>Mot de passe : </label>
																			<input type="password" class="form-control" name="passwd" value="azerty">
																	</div>
																	<div class="form-group">
																			<label>Confirmation mot de passe : </label>
																			<input type="password" class="form-control" name="passwdconf" value="azerty">
																	</div>
																	<div class="form-group">
																			<label>Code de la promo : </label>
																			<input type="text" class="form-control" name="clefPromo" value="MI2019">
																	</div>
																	<input type="submit" class="btn btn-lg btn-success btn-block" value="Je m'inscris" />
															</fieldset>
													</form>
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>
		<!-- /. WRAPPER  -->
	</body>

</html>
