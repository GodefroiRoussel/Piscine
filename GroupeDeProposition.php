//fonctions du type groupe de propositions 


function getNumGr($GdP){

	global $pdo;
	$req=$pdo->prepare('SELECT numGr FROM GroupesDeProposition WHERE GdP=?');
	$req->execute(array($GdP));
	$numGr=$req->fetch();
	
	return $numGr;




}

function getPropositions($GdP){

	global $pdo;
	$req=$pdo->prepare('SELECT * FROM GroupesDeProposition WHERE GdP=?');
	$req->execute(array($GdP));
	Propositions=$req->fetchAll();
	
	return $numGr;


}