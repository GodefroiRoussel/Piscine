<?php
//fonctions du type proposition


function getContenuProposition($idProposition){
    //données : id de la proposition
	//pre : idProposition : entier [1-72]
    //retourne le texte de la proposition
	//post : contenu : String
    global $pdo;
	try{
    //$req=$pdo->prepare('SELECT contenu FROM (SELECT GroupeDeProposition FROM GroupeDePropositions WHERE NumGroupPos= WHERE proposition=?')
		$req=$pdo->prepare('SELECT description FROM proposition WHERE id=?');
		$req->execute(array($idProposition));
		$contenu=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du contenu de la proposition dans la base de données " );
	}
    return $contenu[0];

}


function getFicheAssociee($idProposition){
	//données : id de la proposition
	//pre : idProposition : entier [1-72]
	//résultat : id de la fiche associée à la proposition
	//post : idFiche : entier >0
	global $pdo;
	try{
		$req=$pdo->prepare('SELECT idFiche FROM proposition WHERE id=?');
		$req->execute(array($idProposition));
		$idFiche=$req->fetch();
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la fiche associée à la proposition dans la base de données " );
	}
  return $idFiche[0];


}

function modifProposition($idP,$newCont){
	//données : id de la proposition
	//pre : idProposition : entier [1-72]
	//résultat : modification de la proposition avec son nouveau contenu

	global $pdo;
	try{
	$req=$pdo->prepare('UPDATE proposition SET description= :newDesc WHERE id= :idP');
	$req->execute(array(
    'newDesc' => $newCont,
    'idP' => $idP
    ));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la modification de la proposition dans la base de données " );
	}
}



?>
