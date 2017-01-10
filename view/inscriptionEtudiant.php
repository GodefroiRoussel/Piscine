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
		<!-- DataTables CSS -->
		<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" !important/>
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />	</head>

	<body>
		<div id="wrapper">
			<?php include("menu/menuTop.php"); ?>
			<!-- /. NAV TOP  -->
			<!-- NAV SIDE only if we are connected -->
			<?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
				 include("menu/side_menu.php");
			} ?>


					<div id="page-inner">
							<div class="row">
									<div class="col-md-12">
											<h2>Inscription</h2>
									</div>
							</div>
							<!-- /. ROW  -->
							<hr />
							<div class="row">
										<div class="col-lg-6">
											<form action="../controller/verifInscription.controller.php" method="post">
												<div class="input-group">
													<label class="input-group-addon">Nom</label>
													<input type="text" name="nom" placeholder="nom"/>
												</div>

												<div class="input-group">
													<label class="input-group-addon">Prénom</label>
													<input type="text" name="prenom" placeholder="prenom" />
												</div>

												<div class="input-group">
													<label class="input-group-addon">Email universitaire</label>
													<input type="text" name="email" placeholder="prenom.nom" />
													@etu.umontpellier.Fr
												</div>

												<div class="input-group">
													<label class="input-group-addon">Mot de passe</label>
													<input type="password" name="passwd" />
												</div>

												<div class="input-group">
													<label class="input-group-addon">Confirmation mot de passe</label>
													<input type="password" name="passwdconf" />
												</div>

												<div class="input-group">
													<label class="input-group-addon">Clef de la promo</label>
													<input type="text" name="clefPromo" />
												</div>
													<input type="submit" value="Valider l'inscription" />
												</p>
											</form>
										</div>
								</div>
								<!-- /. ROW  -->
								<hr />
							</div>
							<!-- /. PAGE INNER  -->
		</div>
		<!-- /. WRAPPER  -->
	</body>

</html>
