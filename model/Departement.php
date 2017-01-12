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
    $req=$pdo->prepare('SELECT * FROM departement');
    $req->execute(array());
    $ListeDep=$req->fetchAll();

    return $ListeDep;
}

function getAllPromoByDepartement($idDep){
  //donnée: l'id d'un département
  //résultat : Toutes les promotions qui font partie de ce département

  global $pdo;
  $req=$pdo->prepare('SELECT * FROM promo WHERE idDep=?');
  $req->execute(array($idDep));
  $promos=$req->fetchAll();

  return $promos;
}

function getAllPromoByAnnee($annee){
  //donnée: l'id d'un département
  //résultat : Toutes les promotions qui font partie de l'année passée en paramètre

  global $pdo;
  $req=$pdo->prepare('SELECT * FROM promo WHERE anneePromo=?');
  $req->execute(array($annee));
  $promos=$req->fetchAll();

  return $promos;
}

?>
