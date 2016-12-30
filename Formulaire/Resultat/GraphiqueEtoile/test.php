<!doctype html>




<html>


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
    <title>Graphique en étoile</title>
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
</head>

<!-- Couleur de fond de la page, beige-->
<body bgcolor=#FAF2E2>
  <input type="hidden" id="rEleve" value=<?php echo $result[0] ?> />
  <input type="hidden" id="rPromo" value=<?php echo $resultPromo[0][0] ?> />
  <input type="hidden" id="iEleve" value=<?php echo $result[1] ?> />
  <input type="hidden" id="iPromo" value=<?php echo $resultPromo[1][0] ?> />
  <input type="hidden" id="aEleve" value=<?php echo $result[2] ?> />
  <input type="hidden" id="aPromo" value=<?php echo $resultPromo[2][0] ?> />
  <input type="hidden" id="sEleve" value=<?php echo $result[3] ?> />
  <input type="hidden" id="sPromo" value=<?php echo $resultPromo[3][0] ?> />
  <input type="hidden" id="eEleve" value=<?php echo $result[4] ?> />
  <input type="hidden" id="ePromo" value=<?php echo $resultPromo[4][0] ?> />
  <input type="hidden" id="cEleve" value=<?php echo $result[5] ?> />
  <input type="hidden" id="cPromo" value=<?php echo $resultPromo[5][0] ?> />

	<center>
    <div style="width:40%">
        <canvas id="canvas"></canvas>
    </div>
	</center>



    <!--<button id="randomizeData">Données aléatoires</button>-->
    <script>


	/*

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });

        });

        window.myRadar.update();
    });*/
    </script>
</body>

</html>
