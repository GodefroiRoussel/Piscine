<?php
//fonctions d'accès a la base de données du type Promo

function getCode($idPromo){
	//donnée: id de la promo
	//pré : idPromo : entier > 0 
	//résultat : la clef Promo permettant de s'authentifier dans une promo
	//post : codePromo : String 


	global $pdo;
	try{
		$req=$pdo->prepare('SELECT codePromo FROM promo WHERE id=?');
		$req->execute(array($idPromo));
		$codePromo=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du code promo dans la base de données " );
	}
	return $codePromo[0];
}

function getAnneePlusAnciennePromo(){
		//résultat : l'année de la plus ancienne promo
		//post : annee : entier > 2016 


	global $pdo;
	try{
		$req=$pdo->prepare('SELECT min(anneePromo) FROM promo');
		$req->execute();
		$annee=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la promo la plus ancienne dans la base de données " );
	}

	return $annee[0];
}

function getNomDepartementPromo($idPromo){
		//donnée : id de la promo 
		//pré : idPromo : entier > 0 
		//resultat : le nom du départementde la promo 
		//post : nom : String
		
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT nom FROM departement d, promo p WHERE d.id=idDep AND p.id=?');
		$req->execute(array($idPromo));
		$departement=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du département de la promo dans la base de données " );
	}

	return $departement[0];
}

function existeEtudiant($email,$password){
	//donnée : email de l'étudiant et son mot de passe crypté 
	//pré : email : String / password : String 
	//résultat : id de l'étudiant s'il existe, NULL sinon 
	//post : id : entier >0
		global $pdo;
		try{
			$req=$pdo->prepare('SELECT e.id FROM etudiant e, promo p WHERE email=? AND password=? AND p.id=idPromo');
			$req->execute(array($email,$password));
			$id=$req->fetch();
		} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'existence de l'étudiant dans la base de données " );
	}
		return $id[0];
}

function getAllChoixPromo($idPromo){
		//donnée : id de la promon
		//pré : idPromo : entier > 0 
		//resultat : moyenne des résultat de la promo
		//post : moyResultat : array : une ligne par groupe de proposition par étudiant (12*nombre étudiants),les trois choix de chaque étudiant à chaque question pour les colonnes 

	global $pdo;

	try{
		$req=$pdo->prepare('SELECT choix1, choix2, choix3 FROM choix, etudiant e WHERE e.id=idEtudiant AND e.idPromo=?');
		$req->execute(array($idPromo));
		$moyResultat=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des choix de la promo dans la base de données " );
	}

	return $moyResultat;

	}


function getNbTestEffectue($idPromo){
	//donnée : id de la promo
	//pré : idPromo : entier > 0 
	//résultat : nombre de tests effectués par les élèves de la promo 
	//post : compteur : entier [0,nombre étudiants de la promo]
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE idPromo=? && premierTest=false ');
		$req->execute(array($idPromo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors du comptage du nombre de tests effectués par la promo dans la base de données " );
	}
	return $compteur[0];
}


function getAllEtudiant($idPromo){
		//donnée : id d'une promo
		//pré : idPromo : entier > 0 
		//resultat : la liste des élèves de la promo
		//post : etudiants : array : un étudiant par ligne, (id,nom,prenom,premierTest) pour les colonnes 
	try{
	global $pdo;
		$req=$pdo->prepare('SELECT id,nom,prenom,premierTest FROM etudiant WHERE idPromo=?');
		$req->execute(array($idPromo));
		$etudiants=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des étudiants de la promo dans la base de données " );
	}

	return $etudiants;

}

function getAllEtudiantAyantTest($idPromo){
		//donnée : id d'une promo
		//pré : idPromo : entier >0 
		//resultat : la liste des élèves(id, mail et premierTest) ayant passé le test

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT id,nom,prenom,premierTest FROM etudiant WHERE idPromo=? AND premierTest=false');
		$req->execute(array($idPromo));
		$etudiants=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des élèves ayant déjà passé un test dans la base de données " );
	}

	return $etudiants;

}

function getAllEtudiantRecherche($idPromo,$typeRecherche,$rechercheTexte){
	//donnée : id d'une promo, le type de la recherche  et le texte à rechercher
	//pré : idPromo : entier >0  / typeRecherche : String : prenom ou nom ou premierTest /rechercheTexte : String
	//resultat : liste des étudiants dont la valeur du type de recherche contient au moins le texte à rechercher
	//post : etudiants : array : un étudiant par ligne, (id,nom,prenom,premierTest) pour les colonnes 
	global $pdo;
	try{
		$requete='SELECT id,nom,prenom,premierTest FROM etudiant WHERE idPromo=? AND '.$typeRecherche.' LIKE ?';
		$req=$pdo->prepare($requete);
		$rechercheTexte='%'.$rechercheTexte.'%';
		$req->execute(array($idPromo,$rechercheTexte));
		$etudiants=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du type d'élève cherché dans la base de données " );
	}

	return $etudiants;
}

function creerPromo($codePromo,$idDep,$datePromo){
			//donnée : la clef promo, le département et l'année où sera diplomée la promo
			//pré : codePromo : String / idDeo : entier >0 / datePromo : entier > 2016
			//resultat : la promo insérée dans la base de données

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO promo (codePromo,anneePromo,idDep) VALUES (?,?,?)');
		$req->execute(array($codePromo,$datePromo,$idDep));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la création de la promo dans la base de données " );
	}

}

function ajoutEtudiant($idPromo,$mail,$nom,$prenom,$mdp){
	//données : l'id de la promo, le mail de l'étudiant, le nom, le prénom de l'étudiant et le mdp crypté
	//pré : idPromo : entier >0 / mail : String / nom : String / prenom : String / mdp : String 
	//résultat : l'étudiant est ajouté à la base de donnée avec sa promo correspondante

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO etudiant (email,nom,prenom,premierTest,password,idPromo) VALUES (?,?,?,True,?,?)');
		$req->execute(array($mail,$nom,$prenom,$mdp,$idPromo));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout de l'étudiant dans la base de données " );
	}

	}

function getAllPromo(){
	//résultat : toutes les promos 
	//post : promos : array : une ligne par promo, (id,codePromo,nom,anneePromo) pour les colonnes 
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.id,codePromo,nom,anneePromo FROM promo p,departement d WHERE d.id=idDep');
		$req->execute();
		$promos=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des codes promos dans la base de données " );
	}

	return $promos;
}

function getAllPromoRecherche($typeRecherche,$rechercheTexte){
	//donnée : le type de la recherche et le texte à rechercher
	//pre : typeRecherche : String (département ou anneePromo ou codePromo) //rechercheTexte : String 
	//resultat : liste des promos dont la valeur du type de recherche contient au moins le texte à rechercher
	//post : promos : array : une ligne par promo, (id,nom,anneePromo) pour les colonnes 

	global $pdo;
	try{
		$requete='SELECT p.id,nom,anneePromo,codePromo FROM promo p,departement d WHERE d.id=idDep AND '.$typeRecherche.' LIKE ?';
		$req=$pdo->prepare($requete);
		$rechercheTexte='%'.$rechercheTexte.'%';
		$req->execute(array($rechercheTexte));
		$promos=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la recherche d'une promo en fonction d'un critère dans la base de données " );
	}

	return $promos;
}

function existePromoId($idPromo){
	//donnée : id promo de la promo
	//pré : idPromo : entier >0 
	//résultat : bool true si la promo éxiste, false sinon
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM promo WHERE id=?');
		$req->execute(array($idPromo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'existence d'une promo par son id dans la base de données " );
	}


	if($compteur[0]>0){return true;}
	else{return false;}
}

function existePromo($codePromo){
	//donnée : code promo de la promo
	//pré : codePromo : String 
	//résultat : bool true s'il existe une promo avec ce code promo, false sinon
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM promo WHERE codePromo=?');
		$req->execute(array($codePromo));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérification de l'existence de la promo par son code promo  dans la base de données " );
	}


	if($compteur[0]>0){return true;}
	else{return false;}
}

function getAnnee($idPromo){
	//donnée : id de la promo
	//pré : idPromo : entier >0 
	//résultat : année de la promo
	//post : annee : entier > 2016 
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT anneePromo FROM promo WHERE id=?');
		$req->execute(array($idPromo));
		$annee=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'année de la promo dans la base de données " );
	}
	return $annee[0];
}

function changerCode($idPromo,$nouveauCodePromo){
	//donnée : id de la promo et le nouveau code promo à mettre
	//pré : idPromo : entier >0 / nouveauCodePromo : String 
	//résultat : modification du codePromo de la promo concernée 
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Promo SET codePromo=? WHERE id=?');
		$req->execute(array($nouveauCodePromo,$idPromo));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modficifation du codepromo dans la base de données " );
	}
}

function supprimerPromo($idPromo){
	//donnée : id de la promo à supprimer
	//pré : idPromo : entier >0 
	//résultat : suppression de la promo de la base de données 
	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM promo WHERE id=?');
		$req->execute(array($idPromo));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de la promo dans la base de données " );
	}
}

function getNbPromo(){
	//résultat : renvoie le nomnbre de promo créées
	//post : compteur : entier >=0
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM promo');
		$req->execute();
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nombre de promo dans la base de données " );
	}
	return $compteur[0];
}
function getID($codePromo){
	//donnée : code de la promo
	//pré : codePromo : String 
	//resultat : id de la promo correspondant au code
	//post : id : entier >0

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT id FROM promo WHERE codePromo=?');
		$req-> execute(array($codePromo));
		$id=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la promo dans la base de données " );
	}

	return $id[0];

}

function setAnneePromo($idPromo,$nouvelleAnneePromo){
	//donnée : id de la promo et la nouvelle année de la promo
	//pré : idPromo : entier >0  / nouvelleAnneePromo : entier > 2016 

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE promo SET anneePromo=?  WHERE id=?');
		$req-> execute(array($nouvelleAnneePromo,$idPromo));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification de l'année de la promo dans la base de données " );
	}
}
?>
