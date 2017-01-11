<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/Admin.php');
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
        $modifReussiMail=null;
        $modifReussiPasswd=null;
        $modifReussiNom=null;
        $modifReussiPrenom=null;

        if(isset($_GET['refAdmin'])) {
            $refAdmin =$_GET['refAdmin'];
        }else{
            echo "Erreur : pas d'admin sélectionné";
        }

        if($role==="admin"){
            $email=getMailAdmin($refAdmin);
            $prenom=getPrenomAdmin($refAdmin);
            $nom=getNomAdmin($refAdmin);
            // Si $_POST['email'] existe et qu'il n'est pas vide, on modifie l'adresse mail
            if(isset($_POST["email"]) && !empty($_POST["email"])) {
                $email = htmlspecialchars ($_POST['email']);
                $modifReussiMail = modifMailAdmin($refAdmin,$_POST["email"]);
            }


            if (isset($_POST["passwd"]) && !empty($_POST["passwd"])){
                $password= htmlspecialchars ($_POST['passwd']);
                $_POST["futur"]= htmlspecialchars($_POST["futur"]);
                // On cripte le password avant de le rentrer dans la BDD
                $password = crypt($password,$keyCryptage);
                // On modifie le mot de passe et on stocke dans une variable le booléen renvoyée pour vérifier que la modification a bien été éfféctuée
                $modifReussiPasswd = modifPasswordAdmin($refAdmin,$password);
            }

            if(isset($_POST["nomFormulaire"]) && !empty($_POST["nomFormulaire"])) {
                $nomFormulaire = htmlspecialchars ($_POST['nomFormulaire']);
                $modifReussiNom = modifNomAdmin($refAdmin,$_POST["nomFormulaire"]);
            }


            if (isset($_POST["prenomFormulaire"]) && !empty($_POST["prenomFormulaire"])){
                $prenomFormulaire= htmlspecialchars ($_POST['prenomFormulaire']);
                $modifReussiPrenom = modifPrenomAdmin($refAdmin,$_POST["prenomFormulaire"]);
            }
        }//endif admin
        $email=getMailAdmin($refAdmin);
        $prenom=getPrenomAdmin($refAdmin);
        $nom=getNomAdmin($refAdmin);
        $affichageMessage=false;
        // Si il existe une variable POST de passwd et que les modifs sont réussis OU si les modifications sont nulles alors on affichera le message
        if(($modifReussiMail && $modifReussiPasswd && $modifReussiNom && $modifReussiPrenom) || (is_null($modifReussiPasswd)) && is_null($modifReussiMail) && is_null($modifReussiNom) && is_null($modifReussiPrenom)){
            $affichageMessage=true;
        }
        // Sinon si la variable POST de passwd est vide pas et que la modification a été réalisée OU si la variable POST de passwd est vide et la modification est nulle alors on affichera le message
        else if ((empty($_POST["passwd"]) && $modifReussiMail && $modifReussiNom && $modifReussiPrenom) || (empty($_POST["passwd"]) && is_null($modifReussiMail) && is_null($modifReussiNom) && is_null($modifReussiPrenom))){
            $affichageMessage=true;
        }
        // Après avoir récupérer les valeurs chez étudiant ou admin, on vérifie si les 2 changements ont bien fonctionnés
        if(!$affichageMessage){
            echo "Erreur : Une modification n'a pas été éffectuée";
        }
        include('../view/modifierAdmin.php');

    }//endif verificationToken
    else{
        header('Location:redirection.php');
    }
}//endelse
?>
