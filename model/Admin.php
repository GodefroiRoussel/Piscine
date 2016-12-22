//fonctions d'accès à la base de données du compte administrateur 

<?php 

function getmdp($IdAdmin){
	//donnée: l'admin concerné 
	//résultat: l'id de l'admin concerné 
	
	global $pdo;
	$req=$pdo->prepare('SELECT mdp FROM Admins WHERE idAdmin=?');
	$req->execute(array($codepromo,$eleve));
	$mdp=$req->fetch();
	
	return $mdp;
	
	
}

function creerAdmin($nomdeCompte,$mdp){
	//donnée : nom de compte et mot de passe de l'admin 
	//résultat : ajout de l'admin dans la base de données
	
	global $pdo;
	$req=$pdo->prepare('INSERT INTO Admins($nomdeCompte,mdp) VALUE (?,?)');
	$req=array($nomdeCompte,$mdp); 
	
	
}
function modifMDP($idAdmin,$newmdp){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp 
	//résultat : modifie le mot de passe avctuel avec le nouveau mdp 
	global $pdo;
	$req=$pdo->prepare('UPDATE');
	$req=array($numGr,$propositions); 
	
	
	
}

?> 

