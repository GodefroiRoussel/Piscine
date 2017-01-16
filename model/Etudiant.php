<?php
//fonctions d'accès a la base de données du type etudiant


function getMailEtudiant($idEtudiant){
	//donnée : id de l'étudiant
	//pre : idEtudiant : entier >0
	//resultat : mail de l'étudiant
	//post : mail : String

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT email FROM etudiant WHERE id=?');
		$req->execute(array($idEtudiant));
		$mail=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du mail de l'étudiant dans la base de données " );
}

	return $mail[0];
}

function modifPasswordEtudiant($idEtudiant,$newmdp){
	//donnée : id de l'étudiant qui veut modifier son mdp et nouveau mdp
	//pré : idEtudiant : entier >0 / newmdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp


	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET password= :newMdp WHERE id=:idEt');
		$req->execute(array(
			'newMdp' => $newmdp,
			'idEt' => $idEtudiant
		));
  	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modificaton du mot de passe de l'étudiant dans la base de données " );
}
}

function modifMailEtudiant($idEtudiant,$newMail){
	//donnée : id de l'étudiant qui veut modifier son mail et nouveau mail
	//pré : idEtudiant : entier >0 / newMail : String
	//résultat : modifie le mail actuel avec le nouveau mail
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET email= :newMail WHERE id=:idEt');
		$req->execute(array(
			'newMail' => $newMail,
			'idEt' => $idEtudiant
			));
  	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du mail de l'étudiant dans la base de données " );
}
}

function modifNomEtudiant($idEtudiant,$newNom){
	//donnée : id de l'étudiant qui veut modifier son nom et nouveau nom
	//pré : id : entier >0 / newNom : String
	//résultat : modifie le nom actuel avec le nouveau nom
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET nom= :newNom WHERE id=:idEt');
		$req->execute(array(
			'newNom' => $newNom,
			'idEt' => $idEtudiant
			));
  	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du nom de l'étudiant dans la base de données " );
}
}

function modifPrenomEtudiant($idEtudiant,$newPrenom){
	//donnée : id de l'étudiant qui veut modifier son prenom et nouveau prenom
	//pré : idEtudiant : entier >0 / newPrenom : String
	//résultat : modifie le prénom actuel avec le nouveau prénom
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET prenom= :newPrenom WHERE id=:idEt');
		$req->execute(array(
			'newPrenom' => $newPrenom,
			'idEt' => $idEtudiant
			));
  	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du prénom de l'étudiant dans la base de données " );
}
}

function modifIdPromoEtudiant($idEtudiant,$newIdPromo){
	//donnée : id de l'étudiant qui veut modifier son idPromo et son nouvel idPromo
	//pré : idEtudiant : entier >0 / newIdPromo: entier > 0
	//résultat : modifie l'idPromo actuel avec le nouvel id de la promo passé en paramètre
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET idPromo=:newIdPromo WHERE id=:idEt');
		$req->execute(array(
			'newIdPromo' => $newIdPromo,
			'idEt' => $idEtudiant
			));
  	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du prénom de l'étudiant dans la base de données " );
}
}

function existeEtudiantMail($email){
	//donnée : email de l'étudiant
	//pré : email : String
	//résultat : bool : True si l'étudiant éxiste, False sinon
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE email=?');
		$req->execute(array($email));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la vérifiation de l'existence de l'étudiant par son mail dans la base de données " );
}

	if($compteur[0]>0){
		return True;
	}
	else{
		return False;
	}
}

function existeEtudiantId($idEtudiant){
	//donnée : id de l'étudiant
	//pré : idEtudiant : entier >0
	//résultat : bool : True si l'étudiant éxiste, False sinon
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE id=?');
		$req->execute(array($idEtudiant));
		$compteur=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de vérification de l'existence de l'étudiant par son id dans la base de données " );
}

	if($compteur[0]>0){
		return True;
	}
	else{
		return False;
	}

}

function getAllChoix($idetudiant){
	//donnée : id de l'élève
	//pré : idetudiant : entier >0
	//résultat : résultat de l'élève passé en paramètre
	//post : resultat : array :  2 colonnes(id fiche, score de l'étudiant) et 6 lignes (une pour chaque type RIASEC))

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT choix1, choix2, choix3 FROM choix ,etudiant WHERE id=? AND id=idEtudiant');
		$req->execute(array($idetudiant));
		$resultat=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des choix de l'étudiant dans la base de données " );
}
	return $resultat;

}

function premierTest($idetudiant){
	//donnée : id de l'élève
	//pré : idEtudiant : entier >0
	//résultat : bool, false si l'élève a déjà fait un vrai test, true sinon

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT premierTest FROM etudiant WHERE id=?');
		$req->execute(array($idetudiant));
		$premierTest=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupéraion du booleen premier test dans la base de données " );
}
	return $premierTest[0];

}

function passerTest($idEtudiant){
	//donnée : id de l'élève
	//pré : idEtudiant : entier >0
	//résultat : Passe le premierTest a false pour dire : Ce n'est pas le premier test de l'étudiant
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET premierTest=false WHERE id=?');
		$req->execute(array($idEtudiant));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors du passage du premier test de l'étudiant dans la base de données " );
		}
}

function resetpremierTest($idetudiant){
	//donnée : id de l'étudiant
	//pré : idEtudiant : entier >0
	//résultat: réinitialise le premierTest de l'élève à true

	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE etudiant SET premierTest=true WHERE id=?');
		$req->execute(array($idetudiant));
		$req=$pdo->prepare('DELETE FROM choix WHERE idEtudiant=?');
		$req->execute(array($idetudiant));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la réinitialisation du test de l'étudiant dans la base de données " );
	}

}

function ajouterChoix($idEtudiant,$idGroupe,$choix1,$choix2,$choix3){
	//données : id de l'étudiant concerné, id du groupe de proposition concerné et les id des propositions choisies pour ce groupe
	//pré : idEtudiant : entier >0 / idGroupe : entier [1,12] / choix : entier [1-72]
	//résultat : insertion d'un nouveau choix dans la base de données
	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO choix(idEtudiant,idGroupe,choix1,choix2,choix3) VALUES (?,?,?,?,?)');
		$req->execute(array($idEtudiant,$idGroupe,$choix1,$choix2,$choix3));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de l'ajout d'un choix de l'étudiant dans la base de données " );
		}
}

function supprimerEtudiant($id){
	//donnée : id de l'étudiant
	//pré : id : entier >0
	//résultat : supprime l'étudiant ayant cet id
	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM etudiant WHERE id=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de l'étudiant dans la base de données " );
}
}

function getPrenomEtudiant($id){
	//donnée : id de l'étudiant
	//pré : id : entier >0
	//résultat : renvoie le prénom de l'étudiant
	//post : prenom : String
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT prenom FROM etudiant WHERE id=?');
		$req->execute(array($id));
		$prenom=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du prénom de l'étudiant dans la base de données " );
}
	return $prenom[0];
}

function getNomEtudiant($id){
	//donnée : id de l'étudiant
	//pré : id : entier >0
	//résultat : renvoie le nom de l'étudiant
	//post : nom : String
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT nom FROM etudiant WHERE id=?');
		$req->execute(array($id));
		$nom=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de l'étudiant dans la base de données " );
}
	return $nom[0];
}

function getIdPromo($idEtudiant){
	//donnée : id de l'étudiant
	//pré : idEtudiant : entier >0
	//resultat : l'id de la promo à laquelle appartient l'étudiant
	//post : idPromo : entier >0
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT idPromo FROM etudiant WHERE id=?');
		$req->execute(array($idEtudiant));
		$idPromo=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id promo dans la base de données " );
}
	return $idPromo[0];
}

?>
