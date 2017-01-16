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
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
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
    					<h1 class="page-header">Administrer les administrateurs</h1>
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
                                                if($tri=="prenomCroissant"){?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="prenomDecroissant"){?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                            else{
                                                if($tri=="prenomCroissant"){?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomDecroissant&typeRecherche=&texteRecherche="><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="prenomDecroissant"){?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                        }
                                        else{
                                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
                                            if($existeRecherche){?>
                                                <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                            <?php 
                                            }
                                            else{?>
                                            <th>Prénom <a href="../controller/consulterAdmin.controller.php?tri=prenomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                        <?php
                                            }
                                        }?>
                                        <?php
                                        //S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
                                        if($existeTri){
                                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
                                            if($existeRecherche){
                                                if($tri=="nomCroissant"){?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="nomDecroissant"){?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                            else{
                                                if($tri=="nomCroissant"){?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="nomDecroissant"){?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                        }   
                                        else{
                                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
                                            if($existeRecherche){?>
                                                <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                            <?php
                                            }
                                            else{?>
                                            <th>Nom <a href="../controller/consulterAdmin.controller.php?tri=nomCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                        <?php
                                            }
                                        }?>
                                        <?php
                                        //S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
                                        if($existeTri){
                                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
                                            if($existeRecherche){
                                                if($tri=="emailCroissant"){?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailDecroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="emailDecroissant"){?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                            else{
                                                if($tri=="emailCroissant"){?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                                <?php
                                                }
                                                elseif($tri=="emailDecroissant"){?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                                <?php
                                                }
                                                else{?>
                                                    <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                                <?php
                                                }
                                            }
                                        }   
                                        else{
                                            //Si une recherche est déjà présente, on la stocke dans le lien de la flèche pour pouvoir l'appliquer en plus du tri
                                            if($existeRecherche){?>
                                                <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant&typeRecherche=<?php echo $typeRecherche ?>&rechercheTexte=<?php echo $rechercheTexte ?>"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                            <?php
                                            }
                                            else{?>
                                            <th>Email <a href="../controller/consulterAdmin.controller.php?tri=emailCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                        <?php
                                            }
                                        }?>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                     <form id="formRecherche" action="../controller/consulterAdmin.controller.php?<?php if($existeTri){?>&tri=<?php echo $tri;}?>"; method="post">
                                        <!-- Liste déroulante qui va afficher la saisie de la recherche suivant l'option séléctionnée-->
                                        <select name="listeRecherche" id="listeRecherche" onchange="afficherRecherche()">
                                            <option value="default" selected >Rechercher selon...</option>
                                            <option value="sansTri" >Sans tri</option>
                                            <option value="prenom" >Prénom</option>
                                            <option value="nom" >Nom</option>
                                            <option value="email" >Email</option>
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
                                    foreach ($listeAdmins as $eltAdmin){//On affiche pour chaque admin ses informations et les boutons d'actions
                                    ?>
                                    <tr>
                                        <td><?php echo $i; $i+=1; ?> </td>
                                        <td><?php echo $eltAdmin["prenom"]?></td>
                                        <td><?php echo $eltAdmin["nom"]?></td>
                                        <td><?php echo $eltAdmin["email"]?></td>
                                        <td><a class="btn btn-primary btn-block" href="../controller/modifierAdmin.controller.php?<?php if ($eltAdmin["id"]) { ?>refAdmin=<?php echo $eltAdmin["id"];
                                        } ?>"><i class="fa fa-edit "></i> Modifier</a></td>
                                        <td><a class="btn btn-danger btn-block" href="../controller/consulterAdmin.controller.php?<?php if ($eltAdmin["id"]) { ?>refAdmin=<?php echo $eltAdmin["id"];
                                            } ?>"><i class="icon-remove-sign"></i></a></td>
                                    </tr>
                                    <?php
                                    }?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                                <div>
                                    <a href="../controller/ajoutAdmin.controller.php" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    <!-- /. WRAPPER  -->
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    <script type="text/javascript" src="../controller/js/rechercheConsulterAdmin.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
