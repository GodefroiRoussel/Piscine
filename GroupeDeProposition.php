//fonctions du type groupe de propositions 

<?php 






function getPropositions($idGdP){
	//donnée: id du groupe de propositions concerné 
	//résultat : les 6 propositions du groupe 
	
	global $pdo;
	$req=$pdo->prepare('SELECT * FROM proposition WHERE idGroup=?');
	$req->execute(array($idGdP));
	$propositions=$req->fetchAll();
	
	return $proposition;


}

function creerGdP($idGr,$propositions){
	
	global $pdo;
	
	$req=$pdo->prepare('INSERT INTO groupeprop(id) VALUE (?) ');
	$req=execute(array($idGr)); 
	
	
	
	
	
}

?>