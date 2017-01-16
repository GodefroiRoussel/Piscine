<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/Admin.php');
require_once('../model/Departement.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLERiasEcP0UrP1Sc1nE";
$keyCryptage= "P0lyP1sCinE";

//On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion admin
if(!isset($_COOKIE["token"])){
    // On le redirige vers la connexion admin
    header('Location:connexionAdmin.controller.php');
}
else{
    // On décode le token
    $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
    $decoded_array = (array) $decoded;

    // On vérifie que c'est un token valide
    if (verificationToken($decoded_array)){
        $role=$decoded_array['role'];

        // On récupère l'id du département auquel on souhaite modifier les informations
        if(isset($_GET['refDep'])) {
            $refDep =htmlspecialchars($_GET['refDep']);
        }else{
            echo "Erreur : pas de département sélectionné";
        }

        if($role==="admin"){
            // On récupère le nom actuel du département pour l'afficher dans le champ
            $nom=getNomDepartement($refDep);
            // Si $_POST['nomFormulaire'] existe et qu'il n'est pas vide, on modifie le nom du département
            if(isset($_POST["nomFormulaire"]) && !empty($_POST["nomFormulaire"])) {
               modifNomDepartement($refDep,$_POST["nomFormulaire"]);
            }
        }//endif admin
        // On récupère le nouveau nom du département pour l'afficher dans le champ de modification
        $nom=getNomDepartement($refDep);
        include('../view/modifierDepartement.php');

    }//endif verificationToken
    else{
        header('Location:redirection.php');
    }
}//endelse
?>
