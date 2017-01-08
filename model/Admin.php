<?php
//fonctions d'accès à la base de données du compte administrateur


function getPasswordAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT password FROM admin WHERE id=?');
	$req->execute(array($idAdmin));
	$mdp=$req->fetch();

	return $mdp[0];


}

function getMailAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT email FROM admin WHERE id=?');
	$req->execute(array($idAdmin));
	$email=$req->fetch();

	return $email[0];
}

function getPrenomAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: le prénom de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT prenom FROM admin WHERE id=?');
	$req->execute(array($idAdmin));
	$prenom=$req->fetch();

	return $prenom[0];
}

function getNomAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM admin WHERE id=?');
	$req->execute(array($idAdmin));
	$nom=$req->fetch();

	return $nom[0];
}

function existeAdmin($email,$password){
		global $pdo;

		$req=$pdo->prepare('SELECT id FROM admin WHERE email=? AND password=?');
		$req->execute(array($email,$password));
		$id=$req->fetch();

		return $id[0];
}

function creerAdmin($nomdeCompte,$mdp){
	//donnée : nom de compte et mot de passe de l'admin
	//résultat : ajout de l'admin dans la base de données

	global $pdo;
	$req=$pdo->prepare('INSERT INTO Admin(email,password) VALUE (?,?)');
	if(!$req->execute(array($nomdeCompte,$mdp))){
		return False;
		}
	else{
		return True;
	}
}


function modifPasswordAdmin($idAdmin,$newmdp){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
	global $pdo;
	$req=$pdo->prepare('UPDATE Admin SET password= :newMdp WHERE id=:idAd');
  	if(!$req->execute(array(
		'newMdp' => $newmdp,
		'idAd' => $idAdmin
		))){
  		return False;
  	}
  	else{
  		return True;
  	}
}

function modifMailAdmin($idAdmin,$newMail){
	//données : id de l'admin qui veut modifier son mail et nouveau mail
	//résultat : modifie l'email actuel avec le nouveau mail
	global $pdo;
	$req=$pdo->prepare('UPDATE Admin SET email= :newMail WHERE id=:idAd');
  	if(!$req->execute(array(
			'newMail' => $newMail,
			'idAd' => $idAdmin
			))){
  		return False;
  	}
  	else{
  		return True;
  	}
}

function getNbAdmin(){
	global $pdo;
	$req=$pdo->prepare('SELECT COUNT(*) FROM admin');
  $req->execute();
	$nbAdmin=$req->fetch();

	return $nbAdmin[0];
}

?>
