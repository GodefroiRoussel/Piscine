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
				<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Tableau de bord</h1>
                    </div>
                </div>
								<!-- /. ROW  -->
								<hr />

								<div class="row">
                    <div class="col-md-6 col-sm-5 col-xs-6">
                        <h5>Statistiques</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $nbPromo ?> promotions ont commencé le test </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
														Ici vous pouvez voir les statistiques sur une ou plusieurs promotions<br>
														<a href="statistiques.controller.php" class="btn btn-primary">Consulter les statistiques</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-5 col-xs-6">
											<h5>Modifier le test</h5>
											<div class="alert alert-info text-center">
															<i class="fa fa-edit fa-5x"></i>
															<h3>72 propositions composent ce test </h3>
													<div class="panel-footer">
													Ici vous pouvez modifier une ou plusieurs propositions du test <br>
													<a href="modifierQuestionnaire.controller.php" class="btn btn-primary">Modifier le test</a>
													</div>
											</div>
                    </div>
									</div>
									<!-- /. ROW  -->
									<hr />

										<div class="row">
		                    <div class="col-md-6 col-sm-5 col-xs-6">
													<h5>Gérer les promotions</h5>
		                        <div class="alert alert-info text-center">
		                                <i class="fa fa-list-alt fa-5x"></i>
		                                <h3>La plus ancienne promotion date de <?php echo $anneePromo ?> </h3>
		                            <div class="panel-footer">
																	Ici vous pouvez voir les promotions existantes, ajouter une promotion, supprimer une promotion et accéder aux informations de chaque étudiant<br>
																	<a href="administrerPromo.controller.php" class="btn btn-primary">Consulter les promotions</a>
		                            </div>
		                        </div>
		                    	</div>

		                    <div class="col-md-6 col-sm-5 col-xs-6">
		                        <h5>Gérer les administrateurs</h5>
		                        <div class="panel panel-primary text-center no-boder bg-color-blue">
															<div class="panel-body">
		                            <i class="fa fa-list-alt fa-5x"></i>
		                            <h3><?php echo $nbAdmin-1 ?> personnes ont les mêmes droits que vous </h3>
															</div>
																<div class="panel-footer back-footer-blue">
																Ici vous pouvez voir les administrateurs existants, ajouter un ou supprimer un administrateur et changer leurs informations si nécessaire<br>
																<a href="consulterAdmin.controller.php" class="btn btn-primary">Consulter les administrateurs</a>
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
