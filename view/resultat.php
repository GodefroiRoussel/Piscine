<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Graphique en étoile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
  </head>
  <body>
      <div id="wrapper">
        <?php include("menu/menuTop.php"); ?>
        <!-- /. NAV TOP  -->
        <!-- NAV SIDE only if we are connected and the token is recognize-->
        <?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
           include("menu/side_menu.php");
        } ?>
        <div id="page-wrapper">
						<div id="page-inner">
								<div class="row">
										<div class="col-md-12">
												<h1>Résultat</h1>
										</div>
								</div>
								<!-- /. ROW  -->
								<hr />

								<div class="row">
                  <div class="col-md-4">
                      <h5>Félicitation tu es dans la catégorie <?php echo $nomFiche ?></h5> <!--affiche le nom de la fiche qui correspond aux résultats du questionnaire -->
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                              <?php echo $nomFiche ?>
                          </div>
                          <div class="panel-body">
                              <p><?php echo $valeurFiche ?></p> <!--Affiche un résumé de la fiche -->
                          </div>
                          <div class="panel-footer">
                              <a href="../assets/pdf/interpretationRIASEC.pdf#page=<?php echo $idFiche+1 ?>" >Voir plus</a> <!-- Si l'on veut voir la description entière de la fiche, cela nous envoie sur le pdf qui contient toutes les description, à l'endroit voulu -->
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8" style="width:45%"> <!--Affiche le diagramme en étoile -->
                      <canvas id="canvas"></canvas>
                  </div>
                </div>
          <!-- On trouve ici toutes les données utilisées pour créer le graphique. Elles sont en hidden pour nous permettre de les récupérer en javascript. -->
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
    </div>
  <!-- /. WRAPPER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="../assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../assets/js/custom.js"></script>
  <script src="../Formulaire/Resultat/Chart.bundle.js"></script>
  <script src="../Formulaire/Resultat/utils.js"></script>
  <script src="../Formulaire/Resultat/GraphiqueEtoile/graphiqueEtoile.js"></script>
  </body>
</html>
