function getNumProposition($proposition){
    //Recoit la proposition
    //Retourne le num de proposition
    global $pdo;
    $req = $pdo->prepare('SELECT num FROM proposition');
    $req = execute(array($proposition));
    $num=$req->fetch();
    
    
}

function getContenuProposition($proposition){
    //recoit la proposition
    //retourne le texte de la proposition
    global $pdo;
    
    $req=$pdo->prepare('SELECT num FROM proposition')
    $req->execute(array($proposition))
    $contenu=$req->fetch();
    
    return $contenu;
    
}

function creerProposition($num,$contenu){
    //reçoit num un entier comprit entre 1 et 6 et un contenu
    //insert la proposition dans la base de donnees
    
    global $pdo;
    
    $req=$pdo->prepare('INSERT INTO GroupeDeProposition') to be continued 
    
    
    
}
