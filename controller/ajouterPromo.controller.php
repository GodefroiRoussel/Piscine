<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/admin.php');
require_once('../model/promo.php');
require_once('../model/departement.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLERiasEcP0UrP1Sc1nE";
$keyCryptage= "P0lyP1sCinE";

//On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion Admin
if(!isset($_COOKIE["token"])){

    // On le redirige vers la connexion Admin
    header('Location:connexionAdmin.controller.php');
}
else{
    //On décode le token
    $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
    $decoded_array = (array) $decoded;

    //On vérifie que c'est un token valide
    if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
            $email=getMailAdmin($decoded_array['id']);
            //On charge une liste de tous les départements
            $AllDepartements=getAllDepartement();
            $listeDepartements="";
            //On construit la syntaxe d'une liste déroulante avec la liste des départements
            foreach($AllDepartements as $valeur)
                $listeDepartements=$listeDepartements."<option value=\"".$valeur[0]."\">".$valeur[0]."</option>\n";
            //Si $_POST éxiste et qu'il n'est pas vide c'est à dire qu'on veut ajouter une promo
            if(isset($_POST["codePromo"]) and isset($_POST["annee"]) and isset($_POST["departement"]) and !empty($_POST["codePromo"]) and !empty($_POST["annee"]) and !empty($_POST["departement"])){
                // On sécurise contre l'injection sql
                $codePromo= htmlspecialchars($_POST["codePromo"]);
                $annee= intval(htmlspecialchars($_POST["annee"]));
                $departement= htmlspecialchars($_POST["departement"]);
                //On récupère l'id correspondant au département sélectionné
                $idDep=intval(getIdDepartement($departement));
                //On stocke true si creerPromo() ajoute la promo à la BD, false s'il éxiste déjà
                $ajoutReussi=creerPromo($codePromo,$idDep,$annee);
                //Si la promo n'a pas bien été ajouté dans la BD
                if(!$ajoutReussi){
                    echo "ERREUR, ajout raté";
                }
            }//endif isset

            include('../view/ajoutPromo.php');
        }//end admin
        // Si c'est un étudiant qui a essayé d'outrepasser ses droits
        else{
            echo "On vous redirige... <br/>";
            sleep(2);
            header('Location:../controller/redirection.php');
        }
    }//endif verificationToken
    else {
        echo "Mauvais token, veuillez vous reconnecter<br/>";
        sleep(2);
        header('Location:../controller/connexionAdmin.controller.php');
    }
}//endelse
?>
