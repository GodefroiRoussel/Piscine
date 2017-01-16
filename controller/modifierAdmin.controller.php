<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/Admin.php');
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

        // On récupère l'id de l'admin auquel on veut modifier les informations
        if(isset($_GET['refAdmin'])) {
            $refAdmin =$_GET['refAdmin'];
        }else{
            echo "Erreur : pas d'admin sélectionné";
        }

        if($role==="admin"){
            //On récupère les informations de l'admin auquel on a récupéré l'id afin de les afficher dans les champs de modification
            $email=getMailAdmin($refAdmin);
            $prenom=getPrenomAdmin($refAdmin);
            $nom=getNomAdmin($refAdmin);
            // Si $_POST['email'] existe et qu'il n'est pas vide, on modifie l'adresse mail
            if(isset($_POST["email"]) && !empty($_POST["email"])) {
                $email = htmlspecialchars ($_POST['email']);
                modifMailAdmin($refAdmin,$email);
            }

            // Si $_POST['passwd'] existe et qu'il n'est pas vide, on modifie le mot de passe
            if (isset($_POST["passwd"]) && !empty($_POST["passwd"])){
                $password= htmlspecialchars ($_POST['passwd']);
                $_POST["futur"]= htmlspecialchars($_POST["futur"]);
                // On cripte le password avant de le rentrer dans la BDD
                $password = crypt($password,$keyCryptage);
                modifPasswordAdmin($refAdmin,$password);
            }

            // Si $_POST['nomFormulaire'] existe et qu'il n'est pas vide, on modifie le nom de l'admin
            if(isset($_POST["nomFormulaire"]) && !empty($_POST["nomFormulaire"])) {
                $nomFormulaire = htmlspecialchars ($_POST['nomFormulaire']);
                $modifReussiNom = modifNomAdmin($refAdmin,$nomFormulaire);
            }

            // Si $_POST['prenomFormulaire'] existe et qu'il n'est pas vide, on modifie le prenom de l'admin
            if (isset($_POST["prenomFormulaire"]) && !empty($_POST["prenomFormulaire"])){
                $prenomFormulaire= htmlspecialchars ($_POST['prenomFormulaire']);
                modifPrenomAdmin($refAdmin,$prenomFormulaire);
            }
        }//endif admin
        //On récupère les nouvelles informations de l'admin auquel on a récupéré l'id afin de les afficher dans les champs de modification
        $email=getMailAdmin($refAdmin);
        $prenom=getPrenomAdmin($refAdmin);
        $nom=getNomAdmin($refAdmin);

        include('../view/modifierAdmin.php');

    }//endif verificationToken
    else{
        header('Location:redirection.php');
    }
}//endelse
?>
