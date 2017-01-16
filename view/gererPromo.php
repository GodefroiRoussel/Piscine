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
		<link href="../assets/css/custom.css" rel="stylesheet"/>
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
						<input type="button" class="btn btn-primary" value="Modifier" id="modifierCode" onclick="afficherCode();"/>
						<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier -->
						<div id="newCode">
							<span>Nouveau :</span>
							<input type="text" name="codePromo" id="codePromo"/>
							<input type="submit" class="btn btn-success" value="Enregistrer"/>
						</div>
					</form>
					<br/>
					<form action="../controller/gererPromo.controller.php?refPromo=<?php echo $id; if($existeTri){?>&tri=<?php echo $tri;}?>" method="post" onsubmit="return verfiAnneePromo();">
						<span><span class="gras">Année promo actuelle :</span> <?php echo $anneePromo ?></span>
						<!-- Bouton qui va afficher la saisie d'une nouvelle année promo -->
						<input type="button" class="btn btn-primary" value="Modifier" id="modifierAnnee" onclick="afficherAnnee();"/>
						<!-- ce qui va être affiché lors de l'appuie sur le bouton Modifier -->
						<div id="newAnnee">
							<span>Nouveau :</span>
							<input type="number" name="anneePromo" id="anneePromo"/>
							<input type="submit" class="btn btn-success" value="Enregistrer"/>
						</div>
					</form>
					<br/>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<table width="100%" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>Numéro</th>
												<?php
												//S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri 
												if($existeTri){
													 //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri 
						                          	if($existeRecherche){ 
							                            if($tri=="prenomCroissant"){?> 
							                              <th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th> 
							                            <?php 
							                            } 
							                            elseif($tri=="prenomDecroissant"){?> 
							                              <th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th> 
							                            <?php 
							                            } 
							                            else{?> 
							                              <th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th> 
							                            <?php 
							                            } 
													}
													 else{ 
								                        if($tri=="prenomCroissant"){?> 
								                        <th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomDecroissant&typeRecherche=&texteRecherche="><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th> 
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
								                }
								                else{
								                	//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
								                	if($existeRecherche){?>
								                	<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
								                	<?php
								                	}
								                	else{?>
													<th>Prénom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=prenomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
													<?php
													}
												}?>
												<?php
												//S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
												if($existeTri){
													//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
													if($existeRecherche){ 
								                        if($tri=="nomCroissant"){?> 
								                          <th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th> 
								                        <?php 
								                        } 
								                        elseif($tri=="nomDecroissant"){?> 
								                          <th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th> 
								                        <?php 
								                        } 
								                        else{?> 
								                          <th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th> 
								                        <?php 
								                        } 
													}
													else{ 
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
												}
												else{
													//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
													if($existeRecherche){?>
														 <th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
													<?php
													}
													else{?>	
													<th>Nom <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=nomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
												<?php
													}
												}?>
												<?php
												//S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
												if($existeTri){
													//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
													if($existeRecherche){ 
									                    if($tri=="testCroissant"){?> 
									                      <th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th> 
									                    <?php 
									                    } 
									                    elseif($tri=="testDecroissant"){?> 
									                      <th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th> 
									                    <?php 
									                    } 
									                    else{?> 
									                      <th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th> 
									                    <?php 
									                    } 
													}
													 else{ 
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
												}
												else{
													//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
													if($existeRecherche){?>
														<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th> 
													<?php 
													}
													else{?>
													<th>Premier test effectué <a href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&tri=testCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
												<?php
													}
												}?>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<form id="formRecherche" action="../controller/gererPromo.controller.php?<?php if($existeTri){?>tri=<?php echo $tri;}?>"; method="post">
											<!-- Liste déroulante qui va afficher la saisie de la recherche suivant l'option séléctionnée-->
											<select name="listeRecherche" id="listeRecherche" onchange="afficherRecherche()">
												<option value="default" selected >Rechercher selon...</option>
												<option value="sansTri" >Sans tri</option> 
												<option value="prenom" >Prénom</option>
												<option value="nom" >Nom</option>
												<option value="premierTest" >Test effectué</option>
											</select>
											<!-- ce qui va être affiché lors de la seléction d'options particulières -->
											<div id="newRecherche">
												<input type="search" name="rechercheTexte" id="rechercheTexte"/>
												<input type="submit" value="Chercher" id="chercherNew"/>
											</div>
											<!-- permet de transmettre par POST au controller le type de la recherche (la valeur de l'option séléctionnée) -->
											<input type="hidden" name="typeRecherche" id="typeRecherche" value=<?php echo $typeRecherche ?> />
											<!-- permet de transmettre par POST au controller l'id de la promo -->
											<input type="hidden" name="refPromo" id="refPromo" value=<?php echo $id ?> />
										</form>
										<?php
										$i=1;
										foreach ($etudiants as $etudiant){//On affiche pour chaque étudiant ses informations et les boutons d'actions
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
												<!-- bouton modifier -->
												<td><a class="btn btn-primary btn-block" href="../controller/modifEtudiant.controller.php?refPromo=<?php echo $id ?>&refEtuMod=<?php echo $etudiant['id']?>"><i class="fa fa-edit "></i></a></td>
												<!-- bouton supprimer -->
												<?php if($existeTri){
														?> <!-- on renseigne par quoi on tri seulement si ça a déjà été renseigné auparavant -->
															<td><a class="btn btn-danger btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>&tri=<?php echo $tri ?>"><i class="icon-remove-sign"></i></a></td>
														<?php
														}
														else{
														?>
															<td><a class="btn btn-danger btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>"><i class="icon-remove-sign"></i></a></td>
														<?php
														}
														?>
											<?php
										}
										?>
											</tr>
									</table>
									<!-- /.table-responsive -->
								</div>
							</div>
						</div>
					</div>
					<hr />
					<!-- Bouton Retour -->
					<a href="../controller/administrerPromo.controller.php?" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
				</div>
			</div>
		</div>
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="../assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="../assets/js/custom.js"></script>
		<script type="text/javascript" src="../controller/js/modifCodePromo.js"></script>
		<script type="text/javascript" src="../controller/js/rechercheGererPromo.js"></script>
		<script type="text/javascript" src="../controller/js/modifAnneePromo.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="../dist/js/sb-admin-2.js"></script>
		
	</body>
</html>
