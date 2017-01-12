<?php
//fonctions d'accès à la base de données du compte administrateur


function getPasswordAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT password FROM admin WHERE id=?');
		$req->execute(array($idAdmin));
		$mdp=$req->fetch();
	}catch(PDOException $e){
      echo($e->getMessage());
      die(" Erreur lors de la récupération du mot de passe dans la base de données " );
	} 
	
	return $mdp[0];


}

function getMailAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT email FROM admin WHERE id=?');
		$req->execute(array($idAdmin));
		$email=$req->fetch();
	
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupéraion du mail dans la base de données " );
} 

	return $email[0];
}

function getPrenomAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: le prénom de l'admin concerné

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT prenom FROM admin WHERE id=?');
		$req->execute(array($idAdmin));
		$prenom=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du prénom de l'admin dans la table " );
} 
	return $prenom[0];
}

function getNomAdmin($idAdmin){
	//donnée: l'admin concerné
	//résultat: l'id de l'admin concerné

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT nom FROM admin WHERE id=?');
		$req->execute(array($idAdmin));
		$nom=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de l'admin  dans la table " );
} 
	return $nom[0];
}

function existeAdmin($email,$password){
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT id FROM admin WHERE email=? AND password=?');
		$req->execute(array($email,$password));
		$id=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de l'administrateur " );
} 

		return $id[0];
}

function existeAdminId($id){
	//donnée : code promo de la promo
	//résultat : bool true s'il éxiste une promo avec ce code promo, false sinon
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM admin WHERE id=?');
		$req->execute(array($id));
		$compteur=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de l'id de l'admin dans la base de données " );
} 	
		
	if($compteur[0]>0){return true;}
	else{return false;}
}

function creerAdmin($nomdeCompte,$mdp,$nom,$prenom){
	//donnée : nom de compte et mot de passe de l'admin
	//résultat : ajout de l'admin dans la base de données

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Admin(prenom,nom,email,password) VALUE (?,?,?,?)');
		$req->execute(array($prenom,$nom,$nomdeCompte,$mdp))
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de l'admin dans la base de données " );
} 
}

function supprimerAdmin($id){
	//donnée : id de la promo à supprimer
	global $pdo;
	try{
		$req=$pdo->prepare('DELETE FROM admin WHERE id=?');
		$req->execute(array($id));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors suppression de l'admin de la base de données " );
} 
}



function modifPasswordAdmin($idAdmin,$newmdp){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Admin SET password= :newMdp WHERE id=:idAd');
		$req->execute(array(
			'newMdp' => $newmdp,
			'idAd' => $idAdmin
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du mot de passe dans la table " );
} 

}

function modifMailAdmin($idAdmin,$newMail){
	//données : id de l'admin qui veut modifier son mail et nouveau mail
	//résultat : modifie l'email actuel avec le nouveau mail
	global $pdo;
	try{$req=$pdo->prepare('UPDATE Admin SET email= :newMail WHERE id=:idAd');
  	$req->execute(array(
			'newMail' => $newMail,
			'idAd' => $idAdmin
			))
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du mail dans la base de données " );
} 
}

function modifNomAdmin($idAdmin,$newNom){
	//données : id de l'admin qui veut modifier son mail et nouveau mail
	//résultat : modifie l'email actuel avec le nouveau mail
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Admin SET nom= :newNom WHERE id=:idAd');
		$req->execute(array(
			'newNom' => $newNom,
			'idAd' => $idAdmin
	))
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom de l'admin dans la base de données " );
} 
}

function modifPrenomAdmin($idAdmin,$newPrenom){
	//données : id de l'admin qui veut modifier son mail et nouveau mail
	//résultat : modifie l'email actuel avec le nouveau mail
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Admin SET prenom= :newPrenom WHERE id=:idAd');
		$req->execute(array(
			'newPrenom' => $newPrenom,
			'idAd' => $idAdmin
	))
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du prenom de l'admin dans la base de données " );
} 
}

function getNbAdmin(){
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT COUNT(*) FROM admin');
		$req->execute();
		$nbAdmin=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nombre d'admin dans la base de données " );
} 
	return $nbAdmin[0];
}

function getAllOtherAdmin($id){
	//résultat : renvoie les codePromo de toutes les promos de la BD
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT id,prenom,nom,email FROM admin WHERE id!=?');
		$req->execute(array($id));
		$admins=$req->fetchAll();
	} catch(PDOException $e){
				echo($e->getMessage());
				die(" Erreur lors de la récupéraion  des autres admins dans la base de données " );
} 
	return $admins;
}

?>
