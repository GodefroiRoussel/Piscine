<?php
//fonctions du type groupe de propositions


function getNumGr($GdP){
	//donnée : groupe de propositions
	//résultat : num du groupe de proposition passé en paramètre (entre 1 et 12)
	global $pdo;
	$req=$pdo->prepare('SELECT numGr FROM groupeprop WHERE GdP=?');
	$req->execute(array($GdP));
	$numGr=$req->fetch();

	return $numGr;
	//pas fan pour le moment
}

function getPropositionsGroupe($GdP){
	//donnée: un groupe de proposition
	//résultat : les 6 descriptions des propositions du groupe

	global $pdo;
	$req=$pdo->prepare('SELECT description FROM groupeprop g, proposition WHERE g.id=? AND g.id=idGroup');
	$req->execute(array($GdP));
	$propositions=$req->fetchAll();

	return $propositions;
}
/*
Fonctionnalité non nécessaire normalement
function creerGdP($numGr,$propositions){
	global $pdo;

	$req=$pdo->prepare('INSERT INTO groupeprop(numGr,propositions) VALUE (?,?)');
	$req=array($numGr,$propositions);

}
*/
?>
