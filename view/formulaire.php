<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		 <link rel="stylesheet" href="../Formulaire/Formulaire.css">
		<script type="text/javascript" src="../Formulaire/Formulaire2.js"></script>
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
												<h1>Test RIASEC</h1>
										</div>
								</div>
								<!-- /. ROW  -->
								<hr />

								<div class="row">
										<div class="col-md-12">
												<?php
												// Si i est inférieur à 12 on continue le questionnaire et on sauvegarde dans un coin les réponses.
												if ($i<12){
													?>
										    <form method="post" action="formulaire.controller.php" class="form" onsubmit="return suivant();">
													<?php
													}
													// Sinon on envoie les données au controller de résultat
													else{
														?>
														<form method="post" action="resultat.controller.php" class="form" onsubmit="return suivant();">
															<?php
													}
														?>

										  		<table class="table-fill">
										  			<thead>
										  				<tr>
										  					<th style="width:3%" class="text-left"></th>
										  					<th class="text-left"><center><strong>Groupe <?php echo $i ?></strong></center></th> <!--Affiche le groupe numéro $i de 1 à 12 -->
										  					<th class="text-left">1</th>
										  					<th class="text-left">2</th>
										  					<th class="text-left">3</th>
										  				</tr>
										  			</thead>
										  			<tbody class="table-hover">
										  				<tr>
										  					<th class="text-left">A</td>
										  					<td class="text-left"><?php echo $propositions[0]['description'] ?></td> <!--affiche la première proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[0]['id']?>" onclick="remove1('a',<?php echo $propositions[0]['id']?>)" id="a1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[0]['id']?>" onclick="remove2('a',<?php echo $propositions[0]['id']?>)" id="a2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[0]['id']?>" onclick="remove3('a',<?php echo $propositions[0]['id']?>)" id="a3"/> </td>
										  				</tr>

										  				<tr>
										  					<th class="text-left">B</td>
										  					<td class="text-left"><?php echo $propositions[1]['description'] ?></td><!--affiche la deuxième proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible de la proposition, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[1]['id']?>" onclick="remove1('b',<?php echo $propositions[1]['id']?>)" id="b1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[1]['id']?>" onclick="remove2('b',<?php echo $propositions[1]['id']?>)" id="b2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[1]['id']?>" onclick="remove3('b',<?php echo $propositions[1]['id']?>)" id="b3"/> </td>
										  				</tr>
										  				<tr>
										  					<th class="text-left">C</td>
										  					<td class="text-left"><?php echo $propositions[2]['description'] ?></td><!--affiche la troisième proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible de la proposition, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[2]['id']?>" onclick="remove1('c',<?php echo $propositions[2]['id']?>)" id="c1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[2]['id']?>" onclick="remove2('c',<?php echo $propositions[2]['id']?>)" id="c2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[2]['id']?>" onclick="remove3('c',<?php echo $propositions[2]['id']?>)" id="c3"/> </td>
										  				</tr>
										  				<tr>
										  					<th class="text-left">D</td>
										  					<td class="text-left"><?php echo $propositions[3]['description'] ?></td><!--affiche la quatrième proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible de la proposition, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[3]['id']?>" onclick="remove1('d',<?php echo $propositions[3]['id']?>)" id="d1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[3]['id']?>" onclick="remove2('d',<?php echo $propositions[3]['id']?>)" id="d2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[3]['id']?>" onclick="remove3('d',<?php echo $propositions[3]['id']?>)" id="d3"/> </td>
										  				</tr>
										  				<tr>
										  					<th class="text-left">E</td>
										  					<td class="text-left"><?php echo $propositions[4]['description'] ?></td><!--affiche la cinquième proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible de la proposition, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[4]['id']?>" onclick="remove1('e',<?php echo $propositions[4]['id']?>)" id="e1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[4]['id']?>" onclick="remove2('e',<?php echo $propositions[4]['id']?>)" id="e2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[4]['id']?>" onclick="remove3('e',<?php echo $propositions[4]['id']?>)" id="e3"/> </td>
										  				</tr>
										  				<tr>
										  					<th class="text-left">F</td>
										  					<td class="text-left"><?php echo $propositions[5]['description'] ?></td><!--affiche la sixième proposition du groupe $i -->
														        <!-- Affiche les 3 boutons radio correspondants au 3 choix possible, les fonctions remove permettent de décocher un bouton radio si un bouton sur la même ligne est sélectionner -->
										  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[5]['id']?>" onclick="remove1('f',<?php echo $propositions[5]['id']?>)" id="f1"/> </td>
										  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[5]['id']?>" onclick="remove2('f',<?php echo $propositions[5]['id']?>)" id="f2"/> </td>
										  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[5]['id']?>" onclick="remove3('f',<?php echo $propositions[5]['id']?>)" id="f3"/> </td>
										  				</tr>
										  			</tbody>
										  		</table>

													<input type="hidden" value="<?php echo $i+1?>" name="numGroupe" />
													<input type="hidden" value="<?php echo implode(",",$choix1) ?>" name="choix1" />
													<input type="hidden" value="<?php echo implode(",",$choix2) ?>" name="choix2" />
													<input type="hidden" value="<?php echo implode(",",$choix3) ?>" name="choix3" />

										      <?php
										          // Si i est inférieur à 12 on continue le questionnaire
										          if ($i<12){
										            ?>
										            <input class=" col-sm-2 col-sm-push-5 col-lg-push-5 suivant btn btn-success" type="submit" value="Suivant" />
										          <?php
										          }
										          // Sinon on arrive à l'affichage des résultats
										          else{
										            ?>
										            <input class=" col-sm-2 col-sm-push-5 col-lg-push-5 suivant btn btn-success" type="submit" value="Voir ses résultats" />
										          <?php
										          }
										          ?>
														</form>
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
