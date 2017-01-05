<?php
//fonctions d'accès a la base de données du type etudiant


function getMailEtudiant($idEtudiant){
	//donnée : id de l'étudiant (entier)
	//resultat : mail de l'étudiant (texte)

	global $pdo;
	$req=$pdo->prepare('SELECT email FROM etudiant WHERE id=?');
	$req->execute(array($idEtudiant));
	$mail=$req->fetch();

	return $mail[0];
}

function modifPasswordEtudiant($idEtudiant,$newmdp){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET password= :newMdp WHERE id=:idEt');
  	if(!$req->execute(array(
		'newMdp' => $newmdp,
		'idEt' => $idEtudiant
		))){
  		return False;
  	}
  	else{
  		return True;
  	}
}

function getCodePromo($idEtudiant){
	//donnée : id de l'étudiant (entier)
	//resultat : mail de l'étudiant (texte)

	global $pdo;
	$req=$pdo->prepare('SELECT codePromo FROM etudiant WHERE id=?');
	$req->execute(array($idEtudiant));
	$codePromo=$req->fetch();

	return $codePromo[0];
}

function existeEtudiant($email,$password,$promo){
		global $pdo;

		$req=$pdo->prepare('SELECT id FROM etudiant WHERE email=? AND password=? AND codePromo=?');
		$req->execute(array($email,$password,$promo));
		$id=$req->fetch();

		return $id[0];
}

function getAllResultat($idetudiant){
	//donnée : id de l'élève
	//résultat : résultat de l'élève passé en paramètre (tableau avec 2 colonnes(id fiche, score de l'étudiant) et 6 ligne (une pour chaque type))

	global $pdo;
	$req=$pdo->prepare('SELECT score FROM correspondre ,etudiant WHERE id=? AND id=idEtudiant');
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

	return $premierTest[0];

}

function passerTest($idEtudiant){
	//donnée : id de l'élève
	//résultat : Passe le premierTest a false pour dire : Ce n'est pas le premier test de l'étudiant
	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET premierTest=false WHERE id=?');
	$req->execute(array($idEtudiant));

	$etudiant=$req->fetch();

	return $etudiant;
}

function resetpremierTest($idetudiant){
	//donnée : id de l'étudiant
	//résultat: réinitialise le premierTest de l'élève à true

	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET premierTest=true WHERE id=?');
	$req->execute(array($idetudiant));

	$etudiant=$req->fetch();

	return $etudiant;
}

function ajouterResultat($idEtudiant,$idFiche,$pourcentage){

	global $pdo;
	$req=$pdo->prepare('INSERT INTO correspondre(idEtudiant,idFiche,score) VALUES (?,?,?)');
	$req->execute(array($idEtudiant,$idFiche,$pourcentage));
}

function existeEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : bool s'il éxiste un étudiant, false sinon
	global $pdo;
	$req->prepare('SELECT COUNT(*) FROM etudiant WHERE id=?');
	$req=execute(array($id));
	$compteur=$req->fetch();
	if(compteur>0){return true;}
	else{return false;}
}

function supprimerEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : supprime l'étudiant ayant cet id
	global $pdo;
	$req=$pdo->prepare('DELETE FROM etudiant WHERE id=?');
	$req->execute(array($id));

}
/* Normalement n'a pas besoin de constructeur ici, dans promo cela est suffisant"
function creerEtudiant($mail,$codePromo){

	global $pdo;
	 $req=$pdo->prepare('INSERT INTO etudiant(email,premierTest,codePromo) VALUES (?,True,?)');
	 $req=execute(array($mail,$codePromo));

}
*/


?>
