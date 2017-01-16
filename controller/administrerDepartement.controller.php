<?php
require_once('../vendor/autoload.php');
require_once('../model/connexionBD.php');
require_once('../model/token.php');
require_once('../model/Admin.php');
require_once('../model/Departement.php');
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
            //cas où on veut supprimer un Département, on récupère l'id du département à supprimer
            if(isset($_GET['refDep'])){
                $refDep=$_GET['refDep'];
                if(existeDepartement($refDep)){//Si un département avec l'id récupéré existe, on appelle la fonction sql SupprimerDepartement()
                    supprimerDepartement($refDep);
                }
                else{
                    echo "Erreur : département inéxistant";
                }
            }
            $listeDeps=getAllDepartement();//récupère tous les départements de la BDD
             $existeTri=isset($_GET['tri']);//Permet de pouvoir transporter le tri séléctionné d'une page à l'autre dans le cas d'une mise à jour de la page autre que par le tri
            if($existeTri){ 
                $tri=htmlspecialchars($_GET['tri']); 
                $triPossible=array('departementCroissant','departementDecroissant'); 
                if(in_array($tri, $triPossible)){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($listeDeps as $key => $row) {
                        $idPromo[$key] = $row['id'];
                        $nom[$key]  = $row['nom'];
                    } 
                }
                switch($tri){
                    case 'departementCroissant' :
                        array_multisort($nom, SORT_ASC, $listeDeps);
                    break;
 
                    case 'departementDecroissant' :
                      array_multisort($nom, SORT_DESC, $listeDeps);
                      break;
                }
            }
            include("../view/administrerDepartement.php");
        }
        else{//On est sur la page admin alors qu'on n'est pas admin
            header('Location:../controller/redirection.php');
        }
    }
    else {//Mauvais token
        header('Location:../controller/redirection.php');
    }
}
?>
