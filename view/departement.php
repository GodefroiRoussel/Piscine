<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Statistique Promos</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" />
		<link href="../view/css/statistiques.css" rel="stylesheet" />
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
							<div class="col-lg-12">
									<h1 class="page-header">Departement</h1>
							</div>
							<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
					<form method="post" action="departement.controller.php" class="form">
						<p>
							<label>
								Regarder les statistiques du département :
								<span class="custom-dropdown custom-dropdown--white">
									<select name="depart" id="depart">
									<?php
											foreach ($departs as $depart){
												echo '<option value="'.$depart['id'].'">'.$depart['nom'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
											}
									?>
									</select>
								</span>

							</label>
						</p>
						<input type="submit" class="btn btn-success" value="Afficher" /> <!--Lorsque l'on appuie sur ce bouton le choix va être envoyé vers le controller-->

					</form>

		          <!-- On trouve ici toutes les données utilisées pour créer le graphique. Elles sont en hidden pour éviter que l'utilisateur les modifie directement -->
					<?php
					if(isset($resultDepart)){
					?>
			  
			  <input type="hidden" id="rDepart" value=<?php echo $resultDepart[0] ?> />
	          <input type="hidden" id="iDepart" value=<?php echo $resultDepart[1] ?> />
	          <input type="hidden" id="aDepart" value=<?php echo $resultDepart[2] ?> />
	          <input type="hidden" id="sDepart" value=<?php echo $resultDepart[3] ?> />
	          <input type="hidden" id="eDepart" value=<?php echo $resultDepart[4] ?> />
	          <input type="hidden" id="cDepart" value=<?php echo $resultDepart[5] ?> />
					<?php
					}
					?>


		<center>
			<div id="canvas-holder" style="width:40%"> <!--permet d'afficher le graphique-->
				 <canvas id="chart-area" />
			</div>
			<?php
					if(isset($resultDepart)){
					?>
			<p> <strong><?php echo $NomDep ?> </strong></p>
			<?php
					}
					?>

		</center>
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
	<script type="text/javascript" src="../controller/js/departement.js"></script>
	
	</body>
</html>
