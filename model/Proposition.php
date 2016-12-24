<?php
//fonctions du type proposition


//Surement inutile
function getNumProposition($proposition){
    //Recoit la proposition
    //Retourne le num de proposition
    global $pdo;

    $req = $pdo->prepare('SELECT num FROM proposition WHERE description=? ');
    $req = execute(array($proposition));
    $num=$req->fetch();

	return $num;

}

/* Je pense que cette fonction sera inutile
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

    //$req=$pdo->prepare('SELECT contenu FROM (SELECT GroupeDeProposition FROM GroupeDePropositions WHERE NumGroupPos= WHERE proposition=?')
    $req=$pdo->prepare('SELECT description FROM proposition WHERE id=?')
    $req->execute(array($idProposition))
    $contenu=$req->fetch();

    return $contenu;

}

// Je ne sais plus ce que doit faire cette fonction
function getTypeAssoc($proposition){
	global $pdo;

	$req=$pdo->prepare('SELECT type FROM groupeprop WHERE proposition=?')
  $req->execute(array($proposition))
  $type=$req->fetch();

  return $type;


}

function modifProposition($idP,$newCont){


	global $pdo;
	$req=$pdo->prepare('UPDATE proposition SET description= :newDesc WHERE idP= :id')
	$req->execute(array(
    'newDesc' => $newCont,
    'id' => $idP
    ));

  $proposition= $req->fetch();


  return $proposition;
}

/* normalement fonction inutile
function creerProposition($num,$contenu,$typeAssoc){
    //reçoit num un entier comprit entre 1 et 6 et un contenu (phrase de la proposition) de type string
    //insert la proposition dans la base de donnees


    global $pdo;

    $req=$pdo->prepare('INSERT INTO groupeprop (num, contenu) VALUES (?,?,?)');
    $red->execute(array($num,$contenu,$typeAssoc));
}
*/

?>
