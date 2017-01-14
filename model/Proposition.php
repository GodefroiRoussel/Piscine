<?php
//fonctions du type proposition


/* Je pense que ces fonctions seront inutiles
function getNumProposition($proposition){
    //Recoit la proposition
    //Retourne le num de proposition
    global $pdo;

    $req = $pdo->prepare('SELECT num FROM proposition WHERE description=? ');
    $req = execute(array($proposition));
    $num=$req->fetch();

	return $num[0];

}


function getAllProposition()
{
    global $pdo;


    $req = $pdo->prepare('SELECT id, description, idGroup, idFiche FROM proposition');
    $req->execute();
    $propositions = $req->fetchAll();

    return $propositions;
}
*/

function getContenuProposition($idProposition){
    //recoit la proposition
    //retourne le texte de la proposition
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

// Renvoie le numéro de fiche associé à cette proposition
function getFicheAssociee($idProposition){
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


/* normalement fonction inutile
function creerProposition($num,$contenu,$typeAssoc){
    //reçoit num un entier comprit entre 1 et 6 et un contenu (phrase de la proposition) de type string
    //insert la proposition dans la base de donnees


    global $pdo;

    $req=$pdo->prepare('INSERT INTO groupeprop (num, contenu) VALUES (?,?,?)');
    $red->execute(array($num,$contenu,$typeAssoc));
}

global $pdo;
$req=$pdo->prepare('UPDATE Admin SET password= :newMdp WHERE id=:idAd');
  if(!$req->execute(array(
  'newMdp' => $newmdp,
  'idAd' => $idAdmin
  ))){
    return False;
  }
  else{
    return True;
  }

Vous aimez avoir des activités à l'extérieur, travailler en plein air
*/

?>
