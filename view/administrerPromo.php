<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<!-- BOOTSTRAP STYLES-->
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link href="../assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link rel="stylesheet" href="../assets/css/general.css" />
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
								<div class="col-lg-12">
										<h1 class="page-header">Administrer les promotions</h1>
								</div>
								<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
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
					                              if($tri=="departementCroissant"){?>
					                              <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="departementDecroissant"){?>
					                                <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                            else{
					                              if($tri=="departementCroissant"){?>
					                              <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementDecroissant&typeRecherche=&texteRecherche="><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="departementDecroissant"){?>
					                                <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                          }
					                          else{
					                          	//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
					                          	if($existeRecherche){?>
					                          		<th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          	<?php }
					                          	else{
					                          	?>
					                            <th>Département <a href="../controller/administrerPromo.controller.php?tri=departementCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          <?php
					                          	}
					                          }?>
					                          <?php
					                          //S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
					                          if($existeTri){
					                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
					                            if($existeRecherche){
					                              if($tri=="anneeCroissant"){?>
					                              <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="anneeDecroissant"){?>
					                                <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                            else{
					                              if($tri=="anneeCroissant"){?>
					                              <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeDecroissant&typeRecherche=&texteRecherche="><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="anneeDecroissant"){?>
					                                <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                          }
					                          else{
					                          	//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
					                          	if($existeRecherche){?>
					                          		<th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          	<?php }
					                          	else{?>
					                            <th>Année <a href="../controller/administrerPromo.controller.php?tri=anneeCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          <?php
					                          	}
					                          }?>
					                          <?php
					                          //S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
					                          if($existeTri){
					                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
					                            if($existeRecherche){
					                              if($tri=="clefPromoCroissant"){?>
					                              <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="clefPromoDecroissant"){?>
					                                <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                            else{
					                              if($tri=="clefPromoCroissant"){?>
					                              <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoDecroissant&typeRecherche=&texteRecherche="><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
					                              <?php
					                              }
					                              elseif($tri=="clefPromoDecroissant"){?>
					                                <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
					                              <?php
					                              }
					                              else{?>
					                                <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                              <?php
					                              }
					                            }
					                          }
					                          else{
					                          	//Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
					                          	if($existeRecherche){?>
					                          		 <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          	<?php
					                          	}
					                          	else{?>
					                            <th>Code de la promo <a href="../controller/administrerPromo.controller.php?tri=clefPromoCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
					                          <?php
					                          	}
					                          }?>
					                          <th></th>
					                          <th></th>
					                        </tr>
				                    	</thead>
					                    <br/>
					                    <!-- Formulaire de recherche -->
					                    <form action="../controller/administrerPromo.controller.php<?php if($existeTri){?>?tri=<?php echo $tri;}?>"; method="post">
					                        <!-- Liste déroulante qui va afficher la saisie de la recherche suivant l'option séléctionnée-->
					                        <select name="listeRecherche" id="listeRecherche" onchange="afficherRecherche()">
					                          <option value="default" selected >Rechercher selon...</option>
					                          <option value="sansTri" >Sans tri</option>
					                          <option value="d.nom" >Département</option>
					                          <option value="anneePromo" >Année</option>
					                          <option value="codePromo" >Code de la promo</option>
					                        </select>
					                        <!-- ce qui va être affiché lors de la seléction d'options particulières -->
					                        <div id="newRecherche">
					                          <input type="search" name="rechercheTexte" id="rechercheTexte"/>
					                          <input type="submit" value="Chercher" id="chercherNew"/>
											</div>
											<!-- permet de transmettre par POST au controller le type de la recherche (la valeur de l'option séléctionnée) -->
											<input type="hidden" name="typeRecherche" id="typeRecherche" value=<?php echo $typeRecherche ?> />
					                    </form>
					                    <tbody>
					                      <?php
					                        $i=1;
					                        foreach ($promos as $promo){//On affiche pour chaque promo ses informations et les boutons d'actions
					                      ?>
					                          <tr>
					                            <td><?php echo $i; $i+=1; ?></td>
					                            <td><?php echo $promo["nom"]?></td>
					                            <td><?php echo $promo["anneePromo"]?></td>
					                            <td><?php echo $promo["codePromo"] ?></td>
					                            <!-- Bouton gerer la promo -->
					                            <td><a class="btn btn-primary btn-block" href="../controller/gererPromo.controller.php?refPromo=<?php echo $promo['id']?>"><i class="fa fa-table "></i> Gérer la promo</a></td>
					                            <!-- Bouton supprimer la promo -->
					                            <td><a class="btn btn-danger btn-block" href="../controller/administrerPromo.controller.php?refPromoSupp=<?php echo $promo['id'];?><?php if($existeTri){?>&tri=<?php echo $tri;}?>"><i class="icon-remove-sign"></i></a></td>
					                          </tr>
					                      <?php
					                        }?>
					                     </tbody>
					                </table>
					                <!-- /.table-responsive -->
					                <!-- Bouton ajouter une promo -->
					                <a href="../controller/ajouterPromo.controller.php" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter une promo</a>
					                </div>
								</div>
							</div>
						</div>
						<hr />
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
	<script src="../controller/js/rechercheAdministrerPromo.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js"></script>
	</body>
</html>
