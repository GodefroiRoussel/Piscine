<?php
//fonctions du type proposition


function getNumProposition($proposition){
    //Recoit la proposition
    //Retourne le num de proposition
    global $pdo;

    $req = $pdo->prepare('SELECT num FROM GroupeDeProposition WHERE proposition=? ');
    $req = execute(array($proposition));
    $num=$req->fetch();

	return $num;

}

function getContenuProposition($idProposition){
    //recoit la proposition
    //retourne le texte de la proposition
    global $pdo;

    //$req=$pdo->prepare('SELECT contenu FROM (SELECT GroupeDeProposition FROM GroupeDePropositions WHERE NumGroupPos= WHERE proposition=?')
    $req=$pdo->prepare('SELECT contenu FROM Proposition WHERE numGrpProp=?')
    $req->execute(array($idProposition))
    $contenu=$req->fetch();

    return $contenu;

}

function getTypeAssoc($proposition){
	global $pdo;

	$req=$pdo->prepare('SELECT type FROM GroupeDeProposition WHERE proposition=?')
    $req->execute(array($proposition))
    $type=$req->fetch();

    return $type;


}

function creerProposition($num,$contenu,$typeAssoc){
    //reçoit num un entier comprit entre 1 et 6 et un contenu (phrase de la proposition) de type string
    //insert la proposition dans la base de donnees


    global $pdo;

    $req=$pdo->prepare('INSERT INTO GroupeDeProposition(num, contenu) VALUES (?,?,?)');
    $red->execute(array($num,$contenu,$typeAssoc));




}

?>
