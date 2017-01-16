<?php
function getNomFiche($idFiche){
	//donnée : id de la fiche 
	//pré : idFiche : entier >0
	//résultat : nom de la fiche 
	//post : nomFiche : String 
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT nom FROM fiche WHERE id=?');
		$req->execute(array($idFiche));
		$nomFiche=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupéraion du nom de la fiche dans la base de données " );
} 

	return $nomFiche[0];
}

function getValeurFiche($idFiche){
	//donnée : id de la fiche 
	//pré : idFiche : entier >0
	//résultat : description rapide de la fiche concernée 
	//post : valeurFiche : String 
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT descValeurs FROM fiche WHERE id=?');
		$req->execute(array($idFiche));
		$valeurFiche=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la valeur de la fiche dans la base de données " );
} 
	return $valeurFiche[0];
}

?>
