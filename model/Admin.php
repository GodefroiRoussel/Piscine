<?php
//fonctions d'accès à la base de données du compte administrateur


function getmdp($IdAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	$req=$pdo->prepare('SELECT mdp FROM Admin WHERE idAdmin=?');
	$req->execute(array($idEleve));
	$mdp=$req->fetch();

	return $mdp;


}

function existeAdmin($email,$password){
		global $pdo;

		$req=$pdo->prepare('SELECT id FROM admin WHERE email=? AND password=?');
		$req->execute(array($email,$password));
		$id=$req->fetch();

		return $id;
}

function creerAdmin($nomdeCompte,$mdp){
	//donnée : nom de compte et mot de passe de l'admin
	//résultat : ajout de l'admin dans la base de données

	global $pdo;
	$req=$pdo->prepare('INSERT INTO Admin(email,mdp) VALUE (?,?)');
	$req=array($nomdeCompte,$mdp);


}


function modifMDP($idAdmin,$newmdp){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//résultat : modifie le mot de passe avctuel avec le nouveau mdp
	global $pdo;
	$req=$pdo->prepare('UPDATE Admin SET mdp= :newMdp WHERE idAdmin=:idAd');
  $req->execute(array(
		'newMdp' => $newmdp,
		'idAd' => $idAdamin
		));
  $admin= $req->fetch();


  return $admin;


}

?>
