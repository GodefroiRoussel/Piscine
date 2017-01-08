<?php
//fonctions d'accès a la base de données du type Département

function getIdDepartement($departement){
    //donnée: le nom d'un département
    //résultat : l'id correspondant à ce département

    global $pdo;
    $req=$pdo->prepare('SELECT id FROM departement WHERE nom=?');
    $req->execute(array($departement));
    $idDep=$req->fetch();

    return $idDep[0];
}

function getAllDepartement(){
    //donnée:
    //résultat : la liste des noms des départements

    global $pdo;
    $req=$pdo->prepare('SELECT nom FROM departement');
    $req->execute(array());
    $ListeDep=$req->fetchAll();

    return $ListeDep;
}

?>