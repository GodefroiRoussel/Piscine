<?php
function getNomFiche($idFiche){
	global $pdo;
	$req=$pdo->prepare('SELECT nom FROM fiche WHERE id=?');
	$req->execute(array($idFiche));
	$nomFiche=$req->fetch();

	return $nomFiche[0];
}


?>
