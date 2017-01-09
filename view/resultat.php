<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Graphique en étoile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="../Formulaire/Resultat/Chart.bundle.js"></script>
    <script src="../Formulaire/Resultat/utils.js"></script>
	  <script src="../Formulaire/Resultat/GraphiqueEtoile/graphiqueEtoile.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
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
												<h2>Résultat</h2>
										</div>
								</div>
								<!-- /. ROW  -->
								<hr />

								<div class="row">
                  <div class="col-md-4">
                      <h5>Félicitation tu es dans la catégorie <?php echo $nomFiche ?></h5>
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                              <?php echo $nomFiche ?>
                          </div>
                          <div class="panel-body">
                              <p><?php echo $valeurFiche ?></p>
                          </div>
                          <div class="panel-footer">
                              <a href="../assets/pdf/interpretationRIASEC.pdf#page=<?php echo $idFiche+2 ?>" >Voir plus</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8" style="width:45%">
                      <canvas id="canvas"></canvas>
                  </div>
                </div>
          <!-- On trouve ici toutes les données utilisées pour créer le graphique. Elles sont en hidden pour éviter que l'utilisateur les modifie directement -->
          <input type="hidden" id="rEleve" value=<?php echo $result[0] ?> />
          <input type="hidden" id="rPromo" value=<?php echo $resultPromo[0] ?> />
          <input type="hidden" id="iEleve" value=<?php echo $result[1] ?> />
          <input type="hidden" id="iPromo" value=<?php echo $resultPromo[1] ?> />
          <input type="hidden" id="aEleve" value=<?php echo $result[2] ?> />
          <input type="hidden" id="aPromo" value=<?php echo $resultPromo[2] ?> />
          <input type="hidden" id="sEleve" value=<?php echo $result[3] ?> />
          <input type="hidden" id="sPromo" value=<?php echo $resultPromo[3] ?> />
          <input type="hidden" id="eEleve" value=<?php echo $result[4] ?> />
          <input type="hidden" id="ePromo" value=<?php echo $resultPromo[4] ?> />
          <input type="hidden" id="cEleve" value=<?php echo $result[5] ?> />
          <input type="hidden" id="cPromo" value=<?php echo $resultPromo[5] ?> />

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
