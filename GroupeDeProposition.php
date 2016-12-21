//fonctions du type groupe de propositions 

<?php 
function getNumGr($GdP){
	//donnée : groupe de propositions
	//résultat : num du groupe de proposition passé en paramètre (entre 1 et 12)
	global $pdo;
	$req=$pdo->prepare('SELECT numGr FROM GroupesDeProposition WHERE GdP=?');
	$req->execute(array($GdP));
	$numGr=$req->fetch();
	
	return $numGr;




}

function getPropositions($GdP){
	//donnée: un groupe de proposition
	//résultat : les 6 propositions du groupe 
	
	global $pdo;
	$req=$pdo->prepare('SELECT * FROM GroupesDeProposition WHERE GdP=?');
	$req->execute(array($GdP));
	$propositions=$req->fetchAll();
	
	return $proposition;


}

function creerGdP($numGr,$propositions){
	
	global $pdo;
	
	$req=$pdo->prepare('INSERT INTO GroupesDePropositions(numGr,propositions) VALUE (?,?)');
	$req=array($numGr,$propositions); 
	
	
	
	
	
}

?>