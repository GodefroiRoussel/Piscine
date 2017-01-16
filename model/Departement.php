<?php
//fonctions d'accès a la base de données du type Département

function getIdDepartement($nomDepartement){
    //donnée: le nom d'un département
	//pre : nomDepartement : String 
    //résultat : l'id correspondant à ce département
	//post : id : entier >0

    global $pdo;
	try{
		$req=$pdo->prepare('SELECT id FROM departement WHERE nom=?');
		$req->execute(array($nomDepartement));
		$idDep=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du département dans la base de données " );
}



    return $idDep[0];
}


function getNomDepartement($id){
    //donnée: id d'un département 
	//pre : id : entier >0
    //résultat : nom correspondant à ce département
	//post : nom : String 

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


function getAllDepartement(){
    //résultat : la liste des départements
	//post : ListeDep : array : un département par ligne, (id, nom) pour les colonnes 

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
  //pré : idDep : entier >0
  //résultat : Toutes les promotions qui font partie de ce département
  //post : promos : array : une promo par ligne, (id,codePromo,anneePromo,idDep) pour les colonnes 

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
  //donnée: année dont on souhaite affichée les promos 
  //prec : année : int > 2016 
  //résultat : Toutes les promotions qui font partie de l'année passée en paramètre
  //post : promos : array : une promo par ligne, (id,codePromo,anneePromo,idDep) pour les colonnes 

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
    //donnée : nom du département 
	//pré : nom : String
    //resultat : nouveau département inséré dans la base de données 
	

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
    //donnée : id du département 
	//pré : id entier >0
    //résultat : bool true s'il existe un département avec cet id, false sinon 
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
    //donnée : id du département à supprimer
	//pré : id : entier >0
	//résultat : suppression du département concerné de la base de données 
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
    //données : id du département concerné et nouveau nom de celui-ci
	//pré : id : entier >0 / newNom : String 
    //résultat : modifie le nom du département concerné par l'id dans la base de données 
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
