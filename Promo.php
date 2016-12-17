//fonctions d'accès a la base de données du type Promo 
<?php
function getClef($promo){
	//donnée: une promo 
	//résuluat : la clef Promo permettant de s'authentifier dans une promo 
	
	
	global $pdo;
	$req=$pdo->prepare('SELECT clefPromo FROM promos WHERE promo=?');
	$req->execute(array($promo));
	$clef=$req->fetch();
	
	return $clef;



}

function getDepartement($promo){
		//donnée : une promo 
		//resultat : le departement de la promo 
	global $pdo;
	$req=$pdo->prepare('SELECT departement FROM promos WHERE promo=?');
	$req->execute(array($promo));
	$departement=$req->fetch();
	
	return $departement;





}

function getmoyResultat($promo){
		//donnée : une promo 
		//resultat : un resultat correspondant a la moyenne de la promo 
		
	global $pdo;
	$req=$pdo->prepare('SELECT moyResultat FROM promos WHERE promo=?');
	$req->execute(array($promo));
	$moyResultat=$req->fetch();
	
	return $moyResultat;

	}
	
	
function getEleves($promo){
		//donnée : une promo 
		//resultat : la liste des élèves de la promo 
		
	global $pdo;
	$req=$pdo->prepare('SELECT eleves FROM promos WHERE promo=?');
	$req->execute(array($promo));
	$eleves=$req->fetch();
	
	return $eleves;

}


function creerPromo($clef,$departement,$eleves){
			//donnée : la clef promo, le département et la liste des élèves de la promo
			//resultat : la promo 
	
	
	
	global $pdo;
	
	$req=$pdo->prepare('INSERT INTO Promos(clef,departement,eleves) VALUE (?,?,?)');
	$req=execute(array($clef,$departement,$eleves)); 
	

}	

function ajoutEleve($codepromo,$eleve){
	//donnée : la clef de la promo et l'élève à ajouter 
	//résultat : la promo avec l'élève ajouté 

	global $pdo;
	 $req=$pdo->prepare('INSERT INTO (SELECT * FROM promos WHERE clefpromo=?) VALUES eleve=?');
	 $req=execute(array($codepromo);
	 
	 
	}
	
function testMail($codepromo,$email){
	//donnée : code promo et eleve 
	//resultat : bool true si l'élève appartient a la promo, false sinon 
	
	global $pdo;
	$req->prepare('SELECT COUNT(*) FROM (SELECT * FROM promos WHERE clefpromo=?) WHERE mail=?');
	$req=execute(array($codepromo,$email));
	$count=$req-fetch();
	if(count>0){return true;}
	else{return false;}
	
	
	
}
	
?>	
	