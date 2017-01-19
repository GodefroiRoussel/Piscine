<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<script src="https://use.fontawesome.com/1ab5ac683d.js"></script>
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
				<div id="page-wrapper">
						<div id="page-inner">
								<div class="row">
										<div class="col-md-12">
												<h1>Tableau de bord</h1>
										</div>
								</div>
								<!-- /. ROW  -->
								<hr />
								<?php
									if($premierTestBool){ //vrai s'il n'a pas encore passé le test
								?>
								<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="panel panel-primary text-center no-boder bg-color-blue">
														<div class="panel-body">
																<i class="fa fa-bar-chart-o fa-5x"></i>
																<h3>Ce test se fait en 5 minutes ! </h3>
														</div>
														<div class="panel-footer back-footer-blue">
														Le questionnaire RIASEC vise à déterminer chez un individu quels sont les traits de caractères prédominants. Une fois ce test passé, un profil vous indique
														 quels styles d'activité pourraient le plus vous épanouir et vous explique pourquoi. <br>
														<a href="formulaire.controller.php" class="btn btn-primary">Passer le test</a>
														</div>
												</div>
										</div>
									</div>
									<!-- /. ROW  -->
									<hr />
										<?php }
											else{ //s'il a déjà passé le test
											?>
								<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-6">
												<h5>Passer le test</h5>
												<div class="panel panel-primary text-center no-boder bg-color-blue">
														<div class="panel-body">
																<i class="fa fa-check-circle fa-5x"></i>
																<h3>Tu peux repasser le test mais le résultat ne changera pas </h3>
														</div>
														<div class="panel-footer back-footer-blue">
														Le questionnaire RIASEC vise à déterminer chez un individu quels sont les traits de caractères prédominants. Une fois ce test passé, un profil vous indique
														 quels styles d'activité pourraient le plus vous épanouir et vous explique pourquoi.<br>
														<a href="formulaire.controller.php" class="btn btn-primary">Passer le test</a>
														</div>
												</div>
										</div>

										<div class="col-md-6 col-sm-6 col-xs-6">
											<h5>Voir ses résultats</h5>
											<div class="alert alert-info text-center">
															<i class="fa fa-bar-chart-o fa-5x"></i>
															<h3>Tu es plutôt... <?php echo $nomFiche; ?> !</h3>
															<br/>
													<div class="panel-footer">
													Ici vous pouvez voir vos différents scores et vous comparer à votre promotion
													<br/>
													<br/>
													<a href="resultat.controller.php" class="btn btn-primary">Voir ses résultats</a>
													</div>
											</div>
										</div>
									</div>
									<!-- /. ROW  -->
									<?php }
									?>
									<hr />
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
	</body>
</html>
