<?php
//fonctions d'accès à la base de données du compte administrateur


function getmdp($IdAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT mdp FROM Admin WHERE id=?');
	$req->execute(array($idEleve));
	$mdp=$req->fetch();

	return $mdp[0];


}

function getMail($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT email FROM admin WHERE id=?');
	$req->execute(array($idAdmin));
	$email=$req->fetch();

	return $email[0];
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


function modifPassword($idAdmin,$newmdp){
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

function modifMail($idAdmin,$newMail){
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

?>
