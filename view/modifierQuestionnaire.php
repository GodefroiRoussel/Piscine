<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="../Formulaire/Formulaire.css">
    <script type="text/javascript" src="../assets/js/modifierQuestionnaire.js"></script>
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

									    <form method="get" action="modifierQuestionnaire.controller.php">
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
									 </div>
								 </div>

						     <form method="post" action="modifierQuestionnaire.controller.php?numGroupe=<?php echo $i ?>" onsubmit="return verifPropositions()">
						  		 <table class="table-fill">
						  			 <thead>
						  				<tr>
						  					<th style="width:3%" class="text-left"></th>
						  					<th class="text-left"><center><strong>Groupe <?php echo $i ?></strong></center></th>
						  				</tr>
						  			</thead>
						  			<tbody class="table-hover">
						  				<tr>
						  					<th class="text-left">A</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition1" name="proposition1"><?php echo $propositions[0]['description'] ?></textarea>
						            </td>
						  				</tr>

						  				<tr>
						  					<th class="text-left">B</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition2" name="proposition2"><?php echo $propositions[1]['description'] ?></textarea>
						            </td>
						  				</tr>
						  				<tr>
						  					<th class="text-left">C</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition3" name="proposition3"><?php echo $propositions[2]['description'] ?></textarea>
						            </td>
						  				</tr>
						  				<tr>
						  					<th class="text-left">D</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition4" name="proposition4"><?php echo $propositions[3]['description'] ?></textarea>
						            </td>
						  				</tr>
						  				<tr>
						  					<th class="text-left">E</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition5" name="proposition5"><?php echo $propositions[4]['description'] ?></textarea>
						            </td>
						  				</tr>
						  				<tr>
						  					<th class="text-left">F</th>
						            <td class="text-left">
						             <textarea style="width:100%;height:100%" id="proposition6" name="proposition6"><?php echo $propositions[5]['description'] ?></textarea>
						            </td>
						  				</tr>
						  			</tbody>
						  		</table>

						      <input class=" col-sm-2 col-sm-push-5 col-lg-push-5 suivant btn btn-success"  type="submit" value="Valider les modifications"/>
										</form>
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
