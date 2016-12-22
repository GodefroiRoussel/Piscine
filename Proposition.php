//fonctions d'accès à la base de données du type Propositions 

<?php 

function creerProp($contenu,$idGroup,$idFiche){
	
	global $pdo;
	
	$req=$pdo->prepare('INSERT INTO proposition(contenu,idGroup,idFiche) VALUE (?,?,?) ');
	$req=execute(array($contenu,$idGroup,$idFiche)); 
	
		
}

function getContenu($idP){
	
		global $pdo;
	$req=$pdo->prepare('SELECT contenu FROM proposition WHERE idP=?');
	$req->execute(array($idP));
	$contenu=$req->fetch();
	
	return $contenu;

	
		
}
function modifContenu($idP,$newCont){
	
	
	global $pdo;
	$req=$pdo->prepare('UPDATE proposition SET contenu=? WHERE idP=?')
	$req->execute(array($newCont,$idP));
	
	
	
}

?> 