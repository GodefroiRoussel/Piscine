<?php
//fonctions d'accès a la base de données du type etudiant


function getMail($idEtudiant){
	//donnée : id de l'étudiant (entier)
	//resultat : mail de l'étudiant (texte)

	global $pdo;
	$req=$pdo->prepare('SELECT email FROM etudiant WHERE id=?');
	$req->execute(array($idEtudiant));
	$mail=$req->fetch();

	return $mail;



	}

function getAllResultat($idetudiant){
	//donnée : id de l'élève
	//résultat : résultat de l'élève passé en paramètre (tableau avec 2 colonnes(id fiche, score de l'étudiant) et 6 ligne (une pour chaque type))

	global $pdo;
	$req=$pdo->prepare('SELECT idFiche, score FROM correspondre ,etudiant WHERE id=? AND id=idEtudiant');
	$req->execute(array($idetudiant));
	$resultat=$req->fetchAll();

	return $resultat;


	}


function premierTest($idetudiant){
	//donnée : id de l'élève
	//résultat : bool, false si l'élève a déjà fait un vrai test, true sinon

	global $pdo;
	$req=$pdo->prepare('SELECT premierTest FROM etudiant WHERE id=?');
	$req->execute(array($idetudiant));
	$premierTest=$req->fetch();

	return $premierTest;

}

function resetpremierTest($idetudiant){
	//donnée : id de l'étudiant
	//résultat: réinitialise le premierTest de l'élève à false

	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET premierTest=true WHERE id=?')
	$req->execute(array($idetudiant));

	$etudiant=$req->fetch();

	return $etudiant;
}

/* Normalement n'a pas besoin de constructeur ici, dans promo cela est suffisant"
function creerEtudiant($mail,$codePromo){

	global $pdo;
	 $req=$pdo->prepare('INSERT INTO etudiant(email,premierTest,codePromo) VALUES (?,True,?)');
	 $req=execute(array($mail,$codePromo);

}
*/


?>