<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
  require_once('../model/Admin.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion étudiant
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion étudiant
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
          //cas où on veut supprimer une promo
          if(isset($_GET['refPromo'])){
            $refPromo=htmlspecialchars($_GET['refPromo']);
            if(existePromo($refPromo)){
              supprimerPromo($refPromo);
            }
            else{
              echo "Erreur : promo inéxistante";
              include("../view/administrerPromo.php");
            }
          }
          $promos=getAllPromo();//récupère toutes les promos de la BDD
          include("../view/administrerPromo.php");
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
