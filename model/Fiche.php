<?php
function getNomFiche($idFiche){
	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM fiche WHERE id=?');
	$req->execute(array($idFiche));
	$nomFiche=$req->fetch();

	return $nomFiche[0];
}

function getValeurFiche($idFiche){
	global $pdo;
	$req=$pdo->prepare('SELECT descValeurs FROM fiche WHERE id=?');
	$req->execute(array($idFiche));
	$valeurFiche=$req->fetch();

	return $valeurFiche[0];
}

?>
