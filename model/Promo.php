<?php
//fonctions d'accès a la base de données du type Promo

function getCode($annee,$idDep){
	//donnée: l'année et l'id du département de la promo
	//résuluat : la clef Promo permettant de s'authentifier dans une promo


	global $pdo;
	$req=$pdo->prepare('SELECT codePromo FROM promo WHERE anneePromo=? AND idDep=?');
	$req->execute(array($annee,$idDep));
	$clef=$req->fetch();

	return $clef;



}

function getNomDepartement($codePromo){
		//donnée : le code de la promo (entier)
		//resultat : le nom du département departement de la promo (string)
	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM departement, promo WHERE id=idDep AND codePromo=?');
	$req->execute(array($codepromo));
	$departement=$req->fetch();

	return $departement;
}

function getmoyResultat($codePromo){
		//donnée : un code promo entier
		//resultat :un tableau de 6 cases chacune correspondant a la moyenne des types RIASEC de la promo

	global $pdo;


	$req=$pdo->prepare('SELECT AVG(score) FROM correspondre, etudiant e WHERE e.id=idEtudiant AND e.codePromo=? GROUP BY idFiche');
	$req->execute(array($codePromo));
	$moyResultat=$req->fetchAll();

	return $moyResultat;

	}


function getAllEtudiant($codePromo){
		//donnée : une promo
		//resultat : la liste des élèves(id, mail et premierTest) de la promo

	global $pdo;
	$req=$pdo->prepare('SELECT id,email,premierTest FROM etudiant WHERE codePromo=?');
	$req->execute(array($codePromo));
	$etudiants=$req->fetchAll();

	return $etudiants;

}


function creerPromo($codePromo,$idDep,$anneePromo){
			//donnée : la clef promo, le département et l'année où sera diplomée la promo
			//resultat : la promo insérée dans la base de données



	global $pdo;

	$req=$pdo->prepare('INSERT INTO Promo (codePromo,anneePromo,idDep) VALUE (?,?,?)');
	$req=execute(array($codePromo,$anneePromo,$idDep));


}

function ajoutEtudiant($codepromo,$mail){
	//donnée : la clef de la promo et le mail de l'étudiant à ajouter
	//résultat : l'étudiant est ajouté à la base de donnée avec sa promo correspondante

	global $pdo;
	 $req=$pdo->prepare('INSERT INTO etudiant (email,premierTest,codePromo) VALUES (?,True,?)');
	 $req=execute(array($mail,$codepromo));


	}

function testMail($codepromo,$mail){
	//donnée : code promo et eleve
	//resultat : bool true si l'élève appartient a la promo, false sinon

	global $pdo;
	$req->prepare('SELECT COUNT(*) FROM etudiant WHERE codePromo=? AND email=?');
	$req=execute(array($codepromo,$mail));
	$compteur=$req->fetch();
	if(compteur>0){return true;}
	else{return false;}



}

?>
