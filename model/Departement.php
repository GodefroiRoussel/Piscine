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

function getNomDepartement($id){
    //donnée: le nom d'un département
    //résultat : l'id correspondant à ce département

    global $pdo;
    $req=$pdo->prepare('SELECT nom FROM departement WHERE id=?');
    $req->execute(array($id));
    $nomDep=$req->fetch();

    return $nomDep[0];
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

function creerDepartement($nomDep){
    //donnée : la clef promo, le département et l'année où sera diplomée la promo
    //resultat : la promo insérée dans la base de données

    global $pdo;
    $req=$pdo->prepare('INSERT INTO departement (nom) VALUES (?)');
    if(!$req->execute(array($nomDep))){
        return False;
    }
    else{
        return True;
    }
}

function existeDepartement($id){
    //donnée : code promo de la promo
    //résultat : bool true s'il éxiste une promo avec ce code promo, false sinon
    global $pdo;
    $req=$pdo->prepare('SELECT COUNT(*) FROM departement WHERE id=?');
    $req->execute(array($id));
    $compteur=$req->fetch();
    if($compteur[0]>0){return true;}
    else{return false;}
}

function supprimerDepartement($id){
    //donnée : id de la promo à supprimer
    global $pdo;
    $req=$pdo->prepare('DELETE FROM departement WHERE id=?');
    $req->execute(array($id));
}

function modifNomDepartement($idDep,$newNom){
    //données : id de l'admin qui veut modifier son mail et nouveau mail
    //résultat : modifie l'email actuel avec le nouveau mail
    global $pdo;
    $req=$pdo->prepare('UPDATE departement SET nom= :newNom WHERE id=:idAd');
    if(!$req->execute(array(
        'newNom' => $newNom,
        'idAd' => $idDep
    ))){
        return False;
    }
    else{
        return True;
    }
}

?>
