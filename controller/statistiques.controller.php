<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Admin.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Promo.php');
  require_once('../model/fiche.php');
  require_once('../assets/functions/calculResultat.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté
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
        	$nbPromo= getNbPromo(); //on récupère le nombre de promo dans une variable
          $promos=getAllPromo();

				if (isset($_POST["promo2"]) && isset($_POST["promo1"])){ // On regarde si le formulaire a bien été rempli
          $nomPromo1= getCode($_POST["promo1"]);
          $nomPromo2= getCode($_POST["promo2"]);

          $resultPromo1=calculResultatPromo($_POST["promo1"]);
					$resultPromo2=calculResultatPromo($_POST["promo2"]); //on calcul les résultats de la promo selectionnée
				}
       
				include('../view/statistiques.php');

			}
			else{
				// Si un Etudiant essaie d'accéder aux résultats on le redirige
				header('Location:redirection.php');
			}
		}
	}
