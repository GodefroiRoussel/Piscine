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
                    <h2>Modifier Département</h2>
                </div>
                <?php
                if($affichageMessage && !is_null($modifReussiNom)){
                    ?>
                    <div class="col-md-12">
                        <h5>Modification enregistrée</h5>
                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-lg-6">
                    <form action="modifierDepartement.controller.php?refDep=<?php echo $_GET['refDep'];
                        ?>" method="post" onsubmit="return envoyer();" role="form">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Nom :</label>
                                <input type="text" size="50" name="nomFormulaire" id="nomFormulaire" value="<?php echo $nom ?>"/>
                            </div>
                        </div>
                        <input type="submit" value="Enregistrer"/>
                    </form>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
        </div>
        <!-- /. PAGE WRAPPER  -->
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
    <script src="../controller/js/ajoutAdmin.js"></script>
</body>
</html>
