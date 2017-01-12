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

//On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion étudiant
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
        $modifReussiNom=null;

        if(isset($_GET['refDep'])) {
            $refDep =$_GET['refDep'];
        }else{
            echo "Erreur : pas de département sélectionné";
        }

        if($role==="admin"){
            $nom=getNomDepartement($refDep);
            // Si $_POST['email'] existe et qu'il n'est pas vide, on modifie l'adresse mail
            if(isset($_POST["nomFormulaire"]) && !empty($_POST["nomFormulaire"])) {
                $modifReussiNom = modifNomDepartement($refDep,$_POST["nomFormulaire"]);
            }
        }//endif admin
        $nom=getNomDepartement($refDep);
        $affichageMessage=false;
        // Si il existe une variable POST de passwd et que les modifs sont réussis OU si les modifications sont nulles alors on affichera le message
        if($modifReussiNom){
            $affichageMessage=true;
        }
        // Après avoir récupérer les valeurs chez étudiant ou admin, on vérifie si les 2 changements ont bien fonctionnés
        if(!$affichageMessage){
            echo "Erreur : la modification n'a pas été éffectuée";
        }
        include('../view/modifierDepartement.php');

    }//endif verificationToken
    else{
        header('Location:redirection.php');
    }
}//endelse
?>