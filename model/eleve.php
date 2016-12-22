<?php
//fonctions d'accès a la base de données du type Eleve


function getMail($idEleve){
	//donnée : un élève et la clef de la promo a laquelle il appartient
	//resultat : le mail de l'élève concerné

	global $pdo;
	$req=$pdo->prepare('SELECT mail FROM Etudiant WHERE idEleve=?');
	$req->execute(array($idEleve));
	$mail=$req->fetch();

	return $mail;

	}

function getResultat($idEleve,$idFiche){
	//donnée : id de l'élève et la clef de la promo a laquelle il appartient
	//résultat : résultat de l'élève passé en paramètre

	global $pdo;
	//$req=$pdo->prepare('SELECT resultat FROM (SELECT * FROM promos WHERE codepromo=?) WHERE ideleve=?');
	$req=$pdo->prepare('SELECT pourcentage FROM Correspondre WHERE idEtudiant=? AND idFiche=?')
	$req->execute(array($idEleve, $idFiche));
	//$resultat=$req->fetchAll();
	$resultat=$req->fetch();

	return $resultat;


	}


function premierTest($idEleve){
	global $pdo;
	$req=$pdo->prepare('SELECT premierTest FROM Etudiant WHERE idEleve=?');
	$req->execute(array($idEleve));
	$resultat=$req->fetch();
}

function resetPremierTest($ideleve,$clefpromo){
	//donnée : id de l'élève et la clef de la promo a laquelle il appartient
	//résultat: réinitialise le premiertest de l'élève à false

	global $pdo;
	$req=$pdo->prepare('UPDATE (SELECT * FROM  SET premiertest='true' WHERE idEleve=?')
	$req->execute(array($clefpromo,$ideleve));


}

function updateOffre($ref, $lieu, $dateDeb, $dateFin, $domaine, $experience, $diplome, $salaire){
	global $pdo;

    $req = $pdo->prepare('UPDATE mission SET lieu = :nvlieu, dateDeb = :nvdateDeb, dateFin= :nvdateFin, domaine = :nvdomaine, experience = :nvexperience, diplome = :nvdiplome, salaire= :nvsalaire WHERE refMission = :refM');
    $req->execute(array(
	'nvlieu' => $lieu,
	'nvdateDeb' => $dateDeb,
	'nvdateFin' => $dateFin,
	'nvdomaine' => $domaine,
	'nvexperience' => $experience,
	'nvdiplome' => $diplome,
	'nvsalaire' => $salaire,
	'refM' => $ref
	));
    $offre= $req->fetch();


    return $offre;
}

function creerEleve($)






?>
