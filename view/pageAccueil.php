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

				<div class="row">
            <div class="col-lg-push-1 col-lg-pull-1 col-lg-10">
                <div class="bg-color-info col-sm-12 centrer test">
                    <h1>Bienvenue sur le test de Holland</h1>
                    <p>Dans le cadre de ton cours d'insertion professionnel à Polytech Montpellier, tu viens sur ce site pour passer le fameux test RIASEC. Mais qu'est-ce donc?</p>
                    <p>C'est la première fois que tu viens ici?</p><a href="inscription.controller.php" class="btn btn-primary btn-lg" role="button">Inscris-toi !</a>

                </div>
            </div>
                <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
				<div class="row ">
					<div class="col-xs-12 col-sm-push-1 col-sm-3 col-md-push-1 col-md-3 col-lg-push-1 col-lg-3 test2">
						<h4> RIASEC : une typologie qui procède d’une démarche scientifique </h4>
						<p class="flotte">
							<img src="../assets/img/johnholland.png" class="img-responsive img-rounded" alt="Photo de montagne" title="C'est beau les Alpes quand même !" />
						</p>
						<p> John Holland (1959 / 1997) s’est attaché, au moyen de l’étude statistique, à définir six traits de personnalité
							majeurs en établissant des correspondances avec les choix professionnels de centaines de personnes interrogées.
							La typologie définie par Holland repose donc sur une observation préalable, contrairement à beaucoup de tests non professionnels
							qui fixent des référents de manière plus ou moins arbitraire.
						</p>
					</div>
					<div class="col-xs-12 col-sm-push-1 col-sm-3 col-md-push-1 col-md-3 col-lg-3 test3">
						<h4> Six types d'intérêt professionnels </h4>
						<img src="../assets/img/RIASEC.jpg" class="img-responsive" alt="Photo de montagne" title="C'est beau les Alpes quand même !" />
						<p> A partir de questions simples, ce test vous positionne ainsi par rapport à six types de personnalité professionnelle :
							le réaliste (R), l’investigateur (I), l’artistique (A), le social (A), l’entreprenant (E) et le conventionnel (C).
							Votre "profil RIASEC" s'inscrit dans un hexagone où chaque sommet correspond à un type.
						</p>
					</div>
					<div class="col-xs-12 col-sm-push-1 col-sm-3 col-md-push-1 col-md-3 col-lg-3 test4">
						<h4> Un bon outil pour une première orientation… </h4>
						<p>
							<img src="../assets/img/bilanOrientation.png" class="img-responsive" alt="Photo de montagne" title="C'est beau les Alpes quand même !" />
						</p>
						<p> Son atout majeur est qu'il permet d'appréhender le monde des métiers dans sa globalité. En effet, ce test n'aboutit pas à un seul
							métier, mais vous indique quels styles d'activité pourraient le plus vous épanouir et vous explique pourquoi. Il serait donc illusoire de
							penser que vous allez trouver uniquement avec le test RIASEC le métier exact qu'il faut que vous fassiez. D'abord, parce qu'un grand
							nombre de métiers peuvent vous convenir, et puis d'autres facteurs seront à prendre en compte dans votre vie : les opportunités, le
							marché de l'emploi, vos réussites, l'apparition de nouvelles professions qui n'existent pas encore...  </p>
					</div>
				</div>
				<!-- /. ROW  -->

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
