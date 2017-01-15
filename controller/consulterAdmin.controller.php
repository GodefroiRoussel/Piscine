<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/Admin.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLERiasEcP0UrP1Sc1nE";

//On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion admin
if(!isset($_COOKIE["token"])){

    // On le redirige vers la connexion admin
    header('Location:connexionAdmin.controller.php');
}
else{
    //On décode le token
    $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
    $decoded_array = (array) $decoded;

    //On vérifie que c'est un token valide
    if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
            //cas où on veut supprimer un admin, on récupère son id
            if(isset($_GET['refAdmin'])){
                $refAdmin=$_GET['refAdmin'];
                if(existeAdminId($refAdmin)){//Si il existe un admin correspondant à l'id, on le supprime avec la fonction sql
                    supprimerAdmin($refAdmin);
                }
                else{
                    echo "Erreur : admin inéxistant";
                }
            }
            $listeAdmins=getAllOtherAdmin($decoded_array['id']);//récupère tous les admins de la BDD sauf celui connecté pour pouvoir les afficher dans la vue

            include("../view/consulterAdmin.php");
        }
        else{
            echo "On vous redirige... <br/>";
            sleep(2);
            header('Location:../controller/redirection.php');
        }
    }
    else {
        echo "Mauvais token, veuillez vous reconnecter<br/>";
        sleep(2);
        header('Location:../controller/connexionAdmin.controller.php');
    }
}
?>
