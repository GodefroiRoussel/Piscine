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
	//donnée : id de l'étudiant qui veut modifier son mdp et nouveau mdp
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

function modifMailEtudiant($idEtudiant,$newMail){
	//donnée : id de l'étudiant qui veut modifier son mail et nouveau mail
	//résultat : modifie le mail aactuel avec le nouveau mail
	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET email= :newMail WHERE id=:idEt');
  	if(!$req->execute(array(
		'newMdp' => $newMail,
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

function existeEtudiantMail($email){
	//donnée : email de l'étudiant
	//résultat : True si l'étudiant éxiste, False sinon
	global $pdo;

	$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE email=?');
	$req->execute(array($email));
	$compteur=$req->fetch();
	if($compteur[0]>0){
		return True;
	}
	else{
		return False;
	}
}

function existeEtudiantId($idEtudiant){
	//donnée : id de l'étudiant
	//résultat : True si l'étudiant éxiste, False sinon
	global $pdo;

	$req=$pdo->prepare('SELECT COUNT(*) FROM etudiant WHERE id=?');
	$req->execute(array($idEtudiant));
	$compteur=$req->fetch();
	if($compteur[0]>0){
		return True;
	}
	else{
		return False;
	}

}

function getAllChoix($idetudiant){
	//donnée : id de l'élève
	//résultat : résultat de l'élève passé en paramètre (tableau avec 2 colonnes(id fiche, score de l'étudiant) et 6 ligne (une pour chaque type))

	global $pdo;
	$req=$pdo->prepare('SELECT choix1, choix2, choix3 FROM choix ,etudiant WHERE id=? AND id=idEtudiant');
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
	$req=$pdo->prepare('UPDATE etudiant SET premierTest=True WHERE id=?');
	$req->execute(array($idetudiant));
	$etudiant=$req->fetch();
	$req=$pdo->prepare('DELETE FROM choix WHERE idEtudiant=?');
	$req->execute(array($idetudiant));

	return $etudiant;
}

function ajouterChoix($idEtudiant,$idGroupe,$choix1,$choix2,$choix3){

	global $pdo;
	$req=$pdo->prepare('INSERT INTO choix(idEtudiant,idGroupe,choix1,choix2,choix3) VALUES (?,?,?,?,?)');
	$req->execute(array($idEtudiant,$idGroupe,$choix1,$choix2,$choix3));
}

function supprimerEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : supprime l'étudiant ayant cet id
	global $pdo;
	$req=$pdo->prepare('DELETE FROM etudiant WHERE id=?');
	$req->execute(array($id));

}

function getPrenomEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : renvoie le prénom de l'étudiant
	global $pdo;
	$req=$pdo->prepare('SELECT prenom FROM etudiant WHERE id=?');
	$req->execute(array($id));
	$prenom=$req->fetch();

	return $prenom[0];
}

function getNomEtudiant($id){
	//donnée : id de l'étudiant
	//résultat : renvoie le nom de l'étudiant
	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM etudiant WHERE id=?');
	$req->execute(array($id));
	$nom=$req->fetch();

	return $nom[0];
}

function getIdPromo($idEtudiant){
	//donnée : le code de la promo (entier)
	//resultat : l'id de la promo dans laquelle appartient l'étudiant (string)
	global $pdo;
	$req=$pdo->prepare('SELECT idPromo FROM etudiant WHERE id=?');
	$req->execute(array($idEtudiant));
	$idPromo=$req->fetch();

	return $idPromo[0];
}


/* Normalement n'a pas besoin de constructeur ici, dans promo cela est suffisant"
function creerEtudiant($mail,$codePromo){

	global $pdo;
	 $req=$pdo->prepare('INSERT INTO etudiant(email,premierTest,codePromo) VALUES (?,True,?)');
	 $req=execute(array($mail,$codePromo));

}
*/


?>
