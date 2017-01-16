<?php
//fonctions d'accès à la base de données du compte administrateur


function getPasswordAdmin($idAdmin){
	//donnée: id de l'admin 
	//pré : idAdmin : entier >0
	//résultat: lt de passe crypté de l'admin concerné 
	//post : mdp : String 

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
	//donnée: id de l'admin 
	//pré : idAdmin : entier >0	
	//résultat: mail de l'admin concerné
	//post : email : String 

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
	//donnée: id de l'admin
	//pré : idAdmin : entier >0
	//résultat: le prénom de l'admin concerné
	//post : prenom : String

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
	//donnée: id de l'admin
	//pré : idAdmin : entier >0
	//résultat: le nom de l'admin concerné
	//post : nom : String 
	

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
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon 
	//post : id : entier >0
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
	//donnée: id de l'admin
	//pré : id : entier >0
	//résultat : bool true s'il existe un admin avec cet id, false sinon 
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
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin 
	//pré : nomdeCompte,mdp,nom,prenom : String 
	//résultat : ajout de l'admin dans la base de données

	global $pdo;
	try{
		$req=$pdo->prepare('INSERT INTO Admin(prenom,nom,email,password) VALUE (?,?,?,?)');
		$req->execute(array($prenom,$nom,$nomdeCompte,$mdp));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de l'admin dans la base de données " );
} 
}

function supprimerAdmin($id){
	//donnée: id de l'admin
	//pré : idAdmin : entier >0
	//résultat : suppression de l'admin de la base de données 
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
	//pré : idAdmin : entier > 0 / newMdp : String 
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
	//pré : idAdmin : entier > 0 / newMail : String
	//résultat : modifie l'email actuel avec le nouveau mail
	global $pdo;
	try{$req=$pdo->prepare('UPDATE Admin SET email= :newMail WHERE id=:idAd');
  	$req->execute(array(
			'newMail' => $newMail,
			'idAd' => $idAdmin
			));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du mail dans la base de données " );
} 
}

function modifNomAdmin($idAdmin,$newNom){
	//données : id de l'admin qui veut modifier son nom et nouveau nom
	//pre : idAdmin : entier > 0 / newNom : String
	//résultat : modifie le nom avec le nouveau nom dans la base de données 
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Admin SET nom= :newNom WHERE id=:idAd');
		$req->execute(array(
			'newNom' => $newNom,
			'idAd' => $idAdmin
	));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom de l'admin dans la base de données " );
} 
}

function modifPrenomAdmin($idAdmin,$newPrenom){
	//données : id de l'admin qui veut modifier son prenom et nouveau prenom
	//pré : idAdmin : entier > 0/newPrenom : String 
	//résultat : modifie le prenom actuel avec le nouveau prenom
	global $pdo;
	try{
		$req=$pdo->prepare('UPDATE Admin SET prenom= :newPrenom WHERE id=:idAd');
		$req->execute(array(
			'newPrenom' => $newPrenom,
			'idAd' => $idAdmin
	));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification du prenom de l'admin dans la base de données " );
} 
}

function getNbAdmin(){
	//résultat :  nombre d'admins dans la base de données 
	//post : ndAdmin : entier >=0
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
	//données : id de l'admin 
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre 
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes 
	
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

function getAllOtherAdminRecherche($id,$typeRecherche,$rechercheTexte){ 
  //donnée : id d'un admin, le type de la recherche  et le texte à rechercher 
  //pre : idAdmin : entier > 0 / typeRecherche : String (prenom ou nom ou email )/rechercheTexte : String 
  //resultat : liste des admins sauf l'admin avec l'id passé en paramètre dont la valeur du type de recherche contient au moins le texte à rechercher 
 
  global $pdo; 
  try{ 
    $requete='SELECT id,nom,prenom,email FROM admin WHERE id!=? AND '.$typeRecherche.' LIKE ?'; 
    $req=$pdo->prepare($requete); 
    $rechercheTexte='%'.$rechercheTexte.'%'; 
    $req->execute(array($id,$rechercheTexte)); 
    $admin=$req->fetchAll(); 
  } catch(PDOException $e){ 
      echo($e->getMessage()); 
      die(" Erreur lors de la récupération du type d'admin cherché dans la base de données " ); 
  } 
   
  return $admin; 
} 

?>
