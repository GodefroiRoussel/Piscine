//fonctions d'accès a la base de données du type etudiant


<?php   

function getMail($idE){
	//donnée : id de l'étudiant (entier)
	//resultat : mail de l'étudiant (texte)
	
	global $pdo;
	$req=$pdo->prepare('SELECT email FROM etudiant WHERE id=?');
	$req->execute(array($idE));
	$mail=$req->fetch();
	
	return $mail;
	
	
	
	}
	
function getResultat($idetudiant){
	//donnée : id de l'élève 
	//résultat : résultat de l'élève passé en paramètre (tableau avec 3 colonnes(id fiche, nom fiche, score de l'étudiant) et 6 ligne (une pour chaque type))
		
	global $pdo; 
	$req=$pdo->prepare('SELECT f.id,f.nom c.score FROM correspondre c,etudiant e,fiche f WHERE e.id=? AND f.id=idFiche');
	$req->execute(array($idetudiant));
	$resultat=$req->fetchAll();
	
	return $resultat;	
		
		
	}


function premierTest($idetudiant){
	//donnée : id de l'élève 
	//résultat : bool, true si l'élève a déjà fait un vrai test, false sinon 
		
	global $pdo; 
	$req=$pdo->prepare('SELECT premierTest FROM etudiant WHERE id=?');
	$req->execute(array($idetudiant));
	$premierTest=$req->fetch();
	
	return $premierTest;
		
}

function resetpremierTest($idetudiant){
	//donnée : id de l'étudiant
	//résultat: réinitialise le premierTest de l'élève à false 
	
	global $pdo;
	$req=$pdo->prepare('UPDATE etudiant SET premierTest=true WHERE id=?')
	$req->execute(array($idetudiant));
	

}

function creerEtudiant($mail,$codePromo){
	
	global $pdo;
	 $req=$pdo->prepare('INSERT INTO etudiant(email,premierTest,codePromo) VALUES (?,False,?)');
	 $req=execute(array($mail,$codePromo);
	
	
}






?>