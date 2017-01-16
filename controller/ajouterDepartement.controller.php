<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/departement.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLERiasEcP0UrP1Sc1nE";
$keyCryptage= "P0lyP1sCinE";

//On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion Admin
if(!isset($_COOKIE["token"])){
    header('Location:connexionAdmin.controller.php');
}
else{
    //On décode le token
    $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
    $decoded_array = (array) $decoded;

    //On vérifie que c'est un token valide
    if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
            //Si $_POST éxiste et qu'il n'est pas vide c'est à dire qu'on veut ajouter une promo
            if(isset($_POST["nomDep"]) and !empty($_POST["nomDep"])){
                // On sécurise contre l'injection sql
                $nomDep= htmlspecialchars($_POST["nomDep"]);
                $ajoutReussi=creerDepartement($nomDep);
                //Si la promo n'a pas bien été ajouté dans la BD
                if(!$ajoutReussi){
                    echo "ERREUR, ajout raté";
                }
            }//endif isset

            include('../view/ajoutDepartement.php');
        }//end admin
        // Si c'est un étudiant qui a essayé d'outrepasser ses droits
        else{
            header('Location:../controller/redirection.php');
        }
    }//endif verificationToken
    else {
        header('Location:../controller/redirection.php');
    }
}//endelse
?>
