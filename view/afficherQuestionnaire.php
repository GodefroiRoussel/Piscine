<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="../Formulaire/Formulaire.css">
    <script type="text/javascript" src="../assets/js/modifierQuestionnaire.js"></script>
		<!--		<script type="text/javascript" src="../Formulaire/Formulaire2.js"></script> -->
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

			<div class="table-title">
				<h1>Test RIASEC</h1>
			</div>

    <form method="get" action="afficherQuestionnaire.controller.php">
       <label for="numGroupe">Groupe </label>
       <select name="numGroupe" id="numGroupe">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
       </select>
   <input type="submit" value="Charger" />
</form>

  		<table class="table-fill">
  			<thead>
  				<tr>
  					<th class="text-left"></th>
  					<th class="text-left"><center><strong>Groupe <?php echo $i ?></strong></center></th>
  				</tr>
  			</thead>
  			<tbody class="table-hover">
  				<tr>
  					<th class="text-left">A</th>
            <td class="text-left proposition"><?php echo $propositions[0]['description'] ?></td>
  				</tr>

  				<tr>
  					<th class="text-left">B</th>
  					<td class="text-left proposition"><?php echo $propositions[1]['description'] ?></td>
  				</tr>
  				<tr>
  					<th class="text-left">C</th>
  					<td class="text-left proposition"><?php echo $propositions[2]['description'] ?></td>
  				</tr>
  				<tr>
  					<th class="text-left">D</th>
  					<td class="text-left proposition"><?php echo $propositions[3]['description'] ?></td>
  				</tr>
  				<tr>
  					<th class="text-left">E</th>
  					<td class="text-left proposition"><?php echo $propositions[4]['description'] ?></td>
  				</tr>
  				<tr>
  					<th class="text-left">F</th>
  					<td class="text-left proposition"><?php echo $propositions[5]['description'] ?></td>
  				</tr>
  			</tbody>
  		</table>

      <a href="../controller/modifierQuestionnaire.controller.php?numGroupe=<?php echo $i?>"/>Modifier</a>
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
