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
                       <div class="row">
                                <div class="col-lg-12">
                                        <h1 class="page-header">Administrer les départements</h1>
                                </div>
                                <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                         <th>Numéro</th>
                                        <?php
                                        //S'il éxiste un tri, on doit afficher ou non une flèche pour indiquer le tri actuel et stocker dans le lien de la flèche le prochain tri
                                        if($existeTri){
                                            if($tri=="departementCroissant"){?>
                                                <th>Département <a href="../controller/administrerDepartement.controller.php?tri=departementDecroissant"><img src="../assets/images/flecheBas.jpg" width=9 height=11 alt="flecheBas"/></a></th>
                                            <?php
                                            }
                                            elseif($tri=="departementDecroissant"){?>
                                                <th>Département <a href="../controller/administrerDepartement.controller.php?tri=departementCroissant"><img src="../assets/images/flecheHaut.jpg" width=9 height=11 alt="flecheHaut"/></a></th>
                                            <?php
                                            }
                                        }
                                        else{?>
                                            <th>Département <a href="../controller/administrerDepartement.controller.php?tri=departementCroissant"><img src="../assets/images/flecheBasGrise.jpg" width=9 height=11 alt="flecheBasGrise"/></a></th>
                                        <?php
                                        }?>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=1;
                                    // Affichage dans un tableau des différents départements
                                    // Ajout d'un bouton de modification du département relié à l'id du département dans une variable GET
                                    // Ajout d'un bouton de suppression du département relié à l'id du département dans une variable GET
                                    foreach ($listeDeps as $eltDep){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; $i+=1;?></td>
                                            <td><?php echo $eltDep["nom"]?></td>
                                            <td><a class="btn btn-primary btn-block" href="../controller/modifierDepartement.controller.php?refDep=<?php echo $eltDep["id"];
                                                ?>"><i class="fa fa-edit "></i></a></td>
                                            <!-- Supprimer le département -->
                                            <td><a class="btn btn-danger btn-block" href="../controller/administrerDepartement.controller.php?refDep=<?php echo $eltDep["id"];
                                                ?>"><i class="icon-remove-sign"></i></a></td>
                                        </tr>
                                        <?php
                                    }?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                                <div>
                                    <a href="../controller/ajouterDepartement.controller.php" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un département</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
