<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- DataTables CSS -->
		<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- CUSTOM STYLES-->
		<link rel="stylesheet" href="../assets/css/general.css" />
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/custom.css" rel="stylesheet" !important/>
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
					<h2 class="titrePage">Promo <?php echo $nomDepartement," ",$annee; ?></h2>
					<br/>
					<form action="../controller/gererPromo.controller.php?refPromo=<?php echo $id; if($existeTri){?>&tri=<?php echo $tri;}?>" method="post" onsubmit="return verifCodePromo();">
						<span><span class="gras"> Code promo actuel :</span> <?php echo $codePromo ?></span>
						<!-- Bouton qui va afficher la saisie d'un nouveau codePromo -->
						<input type="button" value="Modifier" id="modifierCode" onclick="afficherCode();"/>
						<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier -->
						<div id="newCode">
							<span>Nouveau :</span>
							<input type="text" name="codePromo" id="codePromo"/>
							<input type="submit" value="Enregistrer"/>
						</div>
					</form>
					<br/>
					<form action="../controller/gererPromo.controller.php?refPromo=<?php echo $id; if($existeTri){?>&tri=<?php echo $tri;}?>" method="post" onsubmit="return verfiAnneePromo();">
						<span><span class="gras">Année promo actuelle :</span> <?php echo $anneePromo ?></span>
						<!-- Bouton qui va afficher la saisie d'une nouvelle année promo -->
						<input type="button" value="Modifier" id="modifierAnnee" onclick="afficherAnnee();"/>
						<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier -->
						<div id="newAnnee">
							<span>Nouveau :</span>
							<input type="text" name="anneePromo" id="anneePromo"/>
							<input type="submit" value="Enregistrer"/>
						</div>
					</form>
					<br/>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading titreTable">
									Gerer la promo
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Numéro</th>
												<?php
												if($existeTri){
													if($tri=="prenomCroissant"){?>
														<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
													<?php
													}
													elseif($tri=="prenomDecroissant"){?>
														<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
													<?php
													}
													else{?>
														<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
													<?php
													}
												}
												else{?>
													<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
												<?php
												}?>
												<?php
												if($existeTri){
													if($tri=="nomCroissant"){?>
														<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
													<?php
													}
													elseif($tri=="nomDecroissant"){?>
														<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
													<?php
													}
													else{?>
														<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
													<?php
													}
												}
												else{?>
													<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
												<?php
												}?>
												<?php
												if($existeTri){
													if($tri=="testCroissant"){?>
														<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
													<?php
													}
													elseif($tri=="testDecroissant"){?>
														<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
													<?php
													}
													else{?>
														<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
													<?php
													}
												}
												else{?>
													<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
												<?php
												}?>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<form id="formRecherche" action="../controller/gererPromo.controller.php?refPromo=<?php echo $id; if($existeTri){?>&tri=<?php echo $tri;}?>"; method="post">
											<!-- Bouton qui va afficher la saisie de la recherche -->
											<select name="listeRecherche" id="listeRecherche" onchange="afficherRecherche()">
												<option value="default" selected >Rechercher selon...</option>
												<option value="prenom" >Prénom</option>
												<option value="nom" >Nom</option>
												<option value="premierTest" >Test effectué</option>
											</select>
											<!-- ce qui va être affiché lors de la seléction d'une option -->
											<div id="newRecherche">
												<input type="search" name="rechercheTexte" id="rechercheTexte"/>
												<input type="submit" value="Chercher" id="chercherNew"/>
											</div>
											<input type="hidden" name="typeRecherche" id="typeRecherche" value=<?php echo $typeRecherche ?> />
										</form>
										<?php
										$i=1;
										foreach ($etudiants as $etudiant){
											?>
											<tr>
												<td><?php echo $i; $i+=1; ?></td>
												<td><?php echo $etudiant['prenom'] ?></td>
												<td><?php echo $etudiant['nom'] ?></td>
												<td><?php if($etudiant['premierTest']){echo "Non";} else{echo "Oui";} ?></td>
												<?php if(!$etudiant['premierTest']){
													?> <!-- on affiche le bouton de reset seulement si on peut le reset donc que le test a été éffectué -->
														<?php if($existeTri){
														?> <!-- on renseigne par quoi on tri seulement si ça a déjà été renseigné auparavant -->
															<td><a class="btn btn-primary btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id?>&refEtuTest=<?php echo $etudiant['id']?>&tri=<?php echo $tri ?>"><i class="fa fa-refresh" aria-hidden="true"></i> Réinitialiser le vrai test</a></td>
														<?php
														}
														else{
														?>
															<td><a class="btn btn-primary btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id?>&refEtuTest=<?php echo $etudiant['id']?>"><i class="fa fa-refresh" aria-hidden="true"></i> Réinitialiser le vrai test</a></td>
														<?php
														?>
													<?php
													}
												}
												else{
													?>
													<td></td>
												<?php
												}
												?>
												<td><a class="btn btn-primary btn-block" href="../controller/modifEtudiant.controller.php?refPromo=<?php echo $id?>&refEtuMod=<?php echo $etudiant['id']?>"><i class="fa fa-edit "></i></a></td><!-- bouton modifier -->
												<?php if($existeTri){
														?> <!-- on renseigne par quoi on tri seulement si ça a déjà été renseigné auparavant -->
															<td><a class="btn btn-danger btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>&tri=<?php echo $tri ?>" onclick="return confirmMessageEtudiantTri()"><i class="icon-remove-sign"></i></a></td><!-- bouton supprimer -->
														<?php
														}
														else{
														?>
															<td><a class="btn btn-danger btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>" onclick=" return confirmMessageEtudiant()"><i class="icon-remove-sign"></i></a></td><!-- bouton supprimer -->
														<?php
														}
														?>
											<?php
										}
										?>
											</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<a href="../controller/administrerPromo.controller.php?" class="btn btn-success" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
				</div>
			</div>
		</div>		
				<!-- /.table-responsive -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="../assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="../assets/js/custom.js"></script>
		<!-- DataTables JavaScript -->
		<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../dist/js/sb-admin-2.js"></script>
		<script type="text/javascript" src="../controller/js/modifCodePromo.js"></script>
		<script type="text/javascript" src="../controller/js/recherche.js"></script>
		<script type="text/javascript" src="../controller/js/confirmMessage.js"></script>
		<script type="text/javascript" src="../controller/js/modifAnneePromo.js"></script>
	</body>
</html>
