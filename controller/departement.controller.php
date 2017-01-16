<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Admin.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Promo.php');
  require_once('../model/fiche.php');
  require_once('../model/Departement.php');
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
        $departs=getAllDepartement(); //On récupère tous les départements dans le tableau de tableau
				if (isset($_POST["depart"])){ //On regarde si une information a été envoyée via le formulaire
					$resultDepart=calculResultatDepartement($_POST["depart"]); //On récupère le résultat des départements calculé par la fonction calculResultatDepart()
					$NomDep=getNomDepartement($_POST["depart"]);
				}
				
				include('../view/departement.php');
			}
			else{
				// Si un Etudiant essaie d'accéder aux résultats on le redirige
				header('Location:redirection.php');
			}
		}
	}
?>
