<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Statistique Promos</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	<body>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<link href="../view/css/statistiques.css" rel="stylesheet" />
		<!-- GOOGLE FONTS-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

		<style>
		canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
		</style>
		<div class="title">
					<h3>Stat</h3>
		</div>
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
							<div class="col-lg-12">
									<h1 class="page-header">Statistiques</h1>
							</div>
							<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
					<form method="post" action="statistiques.controller.php" class="form">
						<p>
							<label>
								Choisissez deux promotions que vous voulez comparer:
								<span class="custom-dropdown custom-dropdown--white">
									<select  id="promo1">
									<?php
											foreach ($promos as $promo){
												echo '<option value="'.$promo['codePromo'].'">'.$promo['codePromo'].'</option>';
											}
									?>
									</select>
								</span>
								<span class="custom-dropdown custom-dropdown--white">
									<select  id="promo2">
										<?php
											foreach ($promos as $promo){
												echo '<option value="'.$promo['codePromo'].'">'.$promo['codePromo'].'</option>';
											}
											?>
									</select>
								</span>
							</label>
						</p>
						<input type="submit" value="Comparer" />

					</form>

		          <!-- On trouve ici toutes les données utilisées pour créer le graphique. Elles sont en hidden pour éviter que l'utilisateur les modifie directement -->


          <input type="hidden" id="rPromo1" value=<?php echo $resultPromo1[0] ?> />
          <input type="hidden" id="iPromo1" value=<?php echo $resultPromo1[1] ?> />
          <input type="hidden" id="aPromo1" value=<?php echo $resultPromo1[2] ?> />
          <input type="hidden" id="sPromo1" value=<?php echo $resultPromo1[3] ?> />
          <input type="hidden" id="ePromo1" value=<?php echo $resultPromo1[4] ?> />
          <input type="hidden" id="cPromo1" value=<?php echo $resultPromo1[5] ?> />

		  		<input type="hidden" id="rPromo2" value=<?php echo $resultPromo2[0] ?> />
          <input type="hidden" id="iPromo2" value=<?php echo $resultPromo2[1] ?> />
          <input type="hidden" id="aPromo2" value=<?php echo $resultPromo2[2] ?> />
          <input type="hidden" id="sPromo2" value=<?php echo $resultPromo2[3] ?> />
          <input type="hidden" id="ePromo2" value=<?php echo $resultPromo2[4] ?> />
          <input type="hidden" id="cPromo2" value=<?php echo $resultPromo2[5] ?> />


					<div id="container" style="width: 70%;">
						<canvas id="canvas"></canvas>
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
	<script src="../Formulaire/Resultat/Chart.bundle.js"></script>
	<script src="../Formulaire/Resultat/utils.js"></script>
	<script type="text/javascript" src="../controller/js/statistiques.js"></script>
	</body>
</html>
