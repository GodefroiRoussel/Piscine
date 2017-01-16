<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Test de Hollande</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
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
                    <div class="col-md-12">
                        <h1>Ajouter Département</h1>
                    </div>
                    <?php
                    //Si un ajout vient d'être effectué on affiche un message d'information
                    if(isset($ajoutReussi) && $ajoutReussi){
                        ?>
                        <div class="col-md-12">
                            <h5>Ajout du département <?php echo $_POST["nomDep"];?> réussi</h5>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-6">
                        <form action="ajouterDepartement.controller.php?" method="post" onsubmit="return envoyer();" role="form">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nom du département :</label>
                                    <input type="text" size="50" name="nomDep" id="nomDep" value=""/>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Enregistrer"/>
                        </form>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <a href="../controller/administrerDepartement.controller.php" class="btn btn-default" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    <!-- /. WRAPPER  -->
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    <script src="../controller/js/ajoutAdmin.js"></script>
</body>
</html>
