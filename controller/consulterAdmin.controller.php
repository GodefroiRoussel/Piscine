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
      if($decoded_array['role']==="admin"){//cas où on veut supprimer un admin, on récupère son id
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

          $existeRecherche=False;//variable pour savoir si on devra ou non transmettre la recherche en cours
          $typeRecherche="default";//variable qui gardera la valeur de l'option dans tous les cas
          $rechercheTexte="";//
          if(isset($_POST['typeRecherche'])||isset($_GET['typeRecherche'])){
            if(isset($_POST['typeRecherche'])){//Si le type de recherche a été transmis par un POST (donc par la recherche directement)
              $typeRecherche=htmlspecialchars($_POST['typeRecherche']);
            }
            if(isset($_GET['typeRecherche'])){//Si le type de recherche a été transmis par un GET (donc par l'url d'un bouton de tri)
              $typeRecherche=htmlspecialchars($_GET['typeRecherche']);
            }
            if($typeRecherche!="default" && $typeRecherche!="sansTri"){
              if(isset($_POST['rechercheTexte'])){
                $existeRecherche=True;
                $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                $listeAdmins=getAllOtherAdminRecherche($decoded_array['id'],$typeRecherche,$rechercheTexte);//récupère tous les admins de la BDD sauf celui connecté en prenant compte de la recherche voulue
              }
              else if(isset($_GET['rechercheTexte'])){
                $existeRecherche=True;
                $rechercheTexte=htmlspecialchars($_GET['rechercheTexte']);
                $listeAdmins=getAllOtherAdminRecherche($decoded_array['id'],$typeRecherche,$rechercheTexte);//récupère tous les admins de la BDD sauf celui connecté en prenant compte de la recherche voulue
              }
              else{
                $listeAdmins=getAllOtherAdmin($decoded_array['id']);//récupère tous les admins de la BDD sauf celui connecté
              }
            }
            else{
              $listeAdmins=getAllOtherAdmin($decoded_array['id']);//récupère tous les admins de la BDD sauf celui connecté
            }
          }
          else{
            $listeAdmins=getAllOtherAdmin($decoded_array['id']);//récupère tous les admins de la BDD sauf celui connecté
          }
          $existeTri=isset($_GET['tri']);//Permet de pouvoir transporter le tri séléctionné d'une page à l'autre dans le cas d'une mise à jour de la page autre que par le tri
          if($existeTri){
              $tri=htmlspecialchars($_GET['tri']);
              $triPossible=array('prenomCroissant','prenomDecroissant','nomCroissant','nomDecroissant','emailCroissant','emailDecroissant');
              if(in_array($tri, $triPossible)){
                //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                foreach ($listeAdmins as $key => $row) {
                  $id[$key] = $row['id'];
                  $nom[$key]  = $row['nom'];
                  $prenom[$key] = $row['prenom'];
                  $email[$key] = $row['email'];
                }
                switch($tri){
                  case 'prenomCroissant' :
                    array_multisort($prenom, SORT_ASC, $listeAdmins);
                    break;

                  case 'prenomDecroissant' :
                    array_multisort($prenom, SORT_DESC, $listeAdmins);
                    break;

                  case 'nomCroissant' :
                    array_multisort($nom, SORT_ASC, $listeAdmins);
                    break;

                  case 'nomDecroissant' :
                    array_multisort($nom, SORT_DESC, $listeAdmins);
                    break;

                  case 'emailCroissant' :
                    array_multisort($email, SORT_ASC, $listeAdmins);
                    break;

                  case 'emailDecroissant' :
                    array_multisort($email, SORT_DESC, $listeAdmins);
                    break;
                }
              }  
              else{
                $existeTri=False;//si c'est un mauvais critère c'est comme si aucun tri n'était appliqué
                echo "Impossible de trier selon ce critère";
              }
            }

          include("../view/consulterAdmin.php");
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
