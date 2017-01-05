<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Test de Hollande</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="../controller/js/ajoutPromo.js"></script>
</head>
<header>
    <p> Bienvenue <?php
        $decomposer=explode("@",$email);
        echo $decomposer[0]; ?></p>
    <div id="connexion">
        <?php include("buttonInscription.php"); ?>
    </div>
</header>
<body>
<?php
if(isset($ajoutReussi) && $ajoutReussi){
    echo "Ajout de la Promo ",$_POST["codePromo"]," réussit";
}
?>
<section>
    <form action="ajouterPromo.controller.php" method="post" onsubmit="return informationsCorrecte();">
        <p>
            <em>Code Promo : </em>
            <input type="text" name="codePromo" id="codePromo"/>
        </p>
        <p>
            <em>année de Promo : </em>
            <input type="number" name="annee" id="annee"/> ex: 2019
        </p>
        <p>
            <em>Département : </em>
            <select name="departement" id="departement">
                <?php
                if(isset($listeDepartements)){
                    echo $listeDepartements;
                }
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Ajouter"/>
        </p>
    </form>
</section>
</body>
