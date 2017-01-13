<?php
//fonctions d'accès a la base de données du type Département

function getIdDepartement($departement){
    //donnée: le nom d'un département
    //résultat : l'id correspondant à ce département

    global $pdo;
	try{
		$req=$pdo->prepare('SELECT id FROM departement WHERE nom=?');
		$req->execute(array($departement));
		$idDep=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du département dans la base de données " );
}



    return $idDep[0];
}

/*
function getNomDepartement($id){
    //donnée: le nom d'un département
    //résultat : l'id correspondant à ce département

    global $pdo;
	try{
		$req=$pdo->prepare('SELECT nom FROM departement WHERE id=?');
		$req->execute(array($id));
		$nomDep=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du département dans la base de données " );
		}

    return $nomDep[0];
}
*/

function getAllDepartement(){
    //donnée:
    //résultat : la liste des noms des départements

    global $pdo;
	try{
		$req=$pdo->prepare('SELECT * FROM departement');
		$req->execute(array());
		$ListeDep=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des départements dans la base de données " );
}
    return $ListeDep;
}

function getAllPromoByDepartement($idDep){
  //donnée: l'id d'un département
  //résultat : Toutes les promotions qui font partie de ce département

  global $pdo;
  try{
  $req=$pdo->prepare('SELECT * FROM promo WHERE idDep=?');
  $req->execute(array($idDep));
  $promos=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des promos par département dans la base de données " );
}

  return $promos;
}

function getAllPromoByAnnee($annee){
  //donnée: l'id d'un département
  //résultat : Toutes les promotions qui font partie de l'année passée en paramètre

  global $pdo;
  try{
  $req=$pdo->prepare('SELECT * FROM promo WHERE anneePromo=?');
  $req->execute(array($annee));
  $promos=$req->fetchAll();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des promos par année dans la base de données " );
}

  return $promos;
}

function creerDepartement($nomDep){
    //donnée : la clef promo, le département et l'année où sera diplomée la promo
    //resultat : la promo insérée dans la base de données

    global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO departement (nom) VALUES (?)');
		$req->execute(array($nomDep));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la création du département dans la base de données " );
}

	}

function existeDepartement($id){
    //donnée : code promo de la promo
    //résultat : bool true s'il éxiste une promo avec ce code promo, false sinon
    global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM departement WHERE id=?');
		$req->execute(array($id));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de lavérification de l'existence du département dans la base de données " );
}

    if($compteur[0]>0){return true;}
    else{return false;}
}

function supprimerDepartement($id){
    //donnée : id de la promo à supprimer
    global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM departement WHERE id=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du département dans la base de données " );
}
}

function modifNomDepartement($idDep,$newNom){
    //données : id de l'admin qui veut modifier son mail et nouveau mail
    //résultat : modifie l'email actuel avec le nouveau mail
    global $pdo;
	try{
		$req=$pdo->prepare('UPDATE departement SET nom= :newNom WHERE id=:idAd');
		$req->execute(array(
			'newNom' => $newNom,
			'idAd' => $idDep
    ));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du nom de département dans la base de données " );
}

}

?>
