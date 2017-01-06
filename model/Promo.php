<?php
//fonctions d'accès a la base de données du type Promo

function getCode($idPromo){
	//donnée: le code de la promo du département de la promo
	//résuluat : la clef Promo permettant de s'authentifier dans une promo


	global $pdo;
	$req=$pdo->prepare('SELECT codePromo FROM promo WHERE id=?');
	$req->execute(array($idPromo));
	$codePromo=$req->fetch();

	return $codePromo[0];
}

function getNomDepartement($idPromo){
		//donnée : le code de la promo (entier)
		//resultat : le nom du département departement de la promo (string)
	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM departement d, promo p WHERE d.id=idDep AND p.id=?');
	$req->execute(array($idPromo));
	$departement=$req->fetch();

	return $departement[0];
}

function existeEtudiant($email,$password,$promo){
		global $pdo;

		$req=$pdo->prepare('SELECT e.id FROM etudiant e, promo p WHERE email=? AND password=? AND codePromo=? AND p.id=idPromo');
		$req->execute(array($email,$password,$promo));
		$id=$req->fetch();

		return $id[0];
}

function getAllChoixPromo($codePromo){
		//donnée : un code promo entier
		//resultat :un tableau de 6 cases chacune correspondant a la moyenne des types RIASEC de la promo

	global $pdo;


	$req=$pdo->prepare('SELECT choix1, choix2, choix3 FROM choix, etudiant e WHERE e.id=idEtudiant AND e.codePromo=?');
	$req->execute(array($codePromo));
	$moyResultat=$req->fetchAll();

	return $moyResultat;

	}


function getAllEtudiant($idPromo){
		//donnée : une promo
		//resultat : la liste des élèves(id, mail et premierTest) de la promo

	global $pdo;
	$req=$pdo->prepare('SELECT id,nom,prenom,premierTest FROM etudiant WHERE idPromo=?');
	$req->execute(array($idPromo));
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
	$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE codePromo=? AND email=?');
	$req->execute(array($codepromo,$mail));
	$compteur=$req->fetch();
	if(compteur>0){return true;}
	else{return false;}
}

function getAllPromo(){
	//résultat : renvoie les codePromo de toutes les promos de la BD
	global $pdo;
	$req=$pdo->prepare('SELECT p.id,codePromo,nom,anneePromo FROM promo p,departement d WHERE d.id=idDep');
	$req->execute();
	$promos=$req->fetchAll();

	return $promos;
}

function existePromo($codepromo){
	//donnée : code promo de la promo
	//résultat : bool true si la promo éxiste, false sinon
	global $pdo;
	$req=$pdo->prepare('SELECT COUNT(*) FROM promo WHERE codePromo=?');
	$req->execute(array($codepromo));
	$compteur=$req->fetch();
	if($compteur>0){return true;}
	else{return false;}
}

function getAnnee($idPromo){
	//donnée : id de la promo
	//résultat : année de la promo
	global $pdo;
	$req=$pdo->prepare('SELECT anneePromo FROM promo WHERE id=?');
	$req->execute(array($idPromo));
	$annee=$req->fetch();

	return $annee[0];
}

function changerCode($idPromo,$NouveauCodePromo){
	//donnée : id de la promo et le nouveau code promo à mettre
	global $pdo;
	$req=$pdo->prepare('UPDATE Promo SET codePromo=? WHERE id=?');
	$req->execute(array($NouveauCodePromo,$idPromo));
}

/* Fontion non nécessaire si on passe par un post
function existeEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : bool s'il éxiste un étudiant, false sinon
	global $pdo;
	$req=prepare('SELECT COUNT(*) FROM etudiant WHERE id=?');
	$req=execute(array($id));
	$compteur=$req->fetch();
	if(compteur>0){return true;}
	else{return false;}
}
*/
?>
