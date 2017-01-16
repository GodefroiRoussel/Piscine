<?php
//fonctions du type groupe de propositions

function getPropositionsGroupe($idGdP){
	//donnée: id du groupe de propositions
	//pré : idGdp : entier [1-12]
	//résultat : les 6 descriptions des propositions du groupe avec leur id et l'id de la fiche associée
	//post : propositions : array : une proposition par ligne, (id,description,idFiche) pour les colonnes 

	global $pdo;
	try{
		$req=$pdo->prepare('SELECT p.id, description, idFiche FROM groupeprop g, proposition p WHERE g.id=? AND g.id=idGroupe');
		$req->execute(array($idGdP));
		$propositions=$req->fetchAll();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération des propositions du groupe dans la base de données " );
} 

	return $propositions;
}

?>
