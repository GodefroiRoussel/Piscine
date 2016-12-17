//fonctions d'accès a la base de données du type Eleve


<?php   

function getMail($eleve,$clefpromo){
	//donnée : un élève et la clef de la promo a laquelle il appartient 
	//resultat : le mail de l'élève concerné 
	
	global $pdo;
	$req=$pdo->prepare('SELECT mail FROM (SELECT * FROM promos WHERE clefpromo=?  ) WHERE eleve=?');
	$req->execute(array($codepromo,$eleve));
	$mail=$req->fetch();
	
	return $mail;
	
	
	
	}
	
function getResultat($ideleve,$clefpromo){
	//donnée : id de l'élève et la clef de la promo a laquelle il appartient 
	//résultat : résultat de l'élève passé en paramètre
		
	global $pdo; 
	$req=$pdo->prepare('SELECT resultat FROM (SELECT * FROM promos WHERE codepromo=?) WHERE ideleve=?');
	$req->execute(array($clefpromo,$ideleve));
	$resultat=$req->fetchAll();
	
	return $resultat;	
		
		
	}


function premierTest($ideleve,$clefpromo){
	//donnée : id de l'élève et la clef de la promo a laquelle il appartient 
	//résultat : bool, true si l'élève a déjà fait un vrai test, false sinon 
		
	global $pdo; 
	$req=$pdo->prepare('SELECT premiertest FROM (SELECT * FROM promos WHERE codepromo=?) WHERE ideleve=?');
	$req->execute(array($clefpromo,$ideleve));
	$premiertest=$req->fetchAll();
	
	return $premiertest;
		
}

function resetPremierTest($ideleve,$clefpromo){
	//donnée : id de l'élève et la clef de la promo a laquelle il appartient 
	//résultat: réinitialise le premiertest de l'élève à false 
	
	global $pdo;
	$req=$pdo->prepare('UPDATE (SELECT * FROM promos WHERE clefpromo=?) SET premiertest='true' WHERE ideleve=?')
	$req->execute(array($clefpromo,$ideleve));
	

}

function creerEleve($)






?>