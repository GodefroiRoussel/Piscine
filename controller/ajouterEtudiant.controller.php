<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');

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
          	$email=getMail($decoded_array['id']);
    		include('../view/AjouterEtudiant.php');
    	    else{
          		echo "On vous redirige <br/>";
    		}
		}
      	else {
			echo "Mauvais token, veuillez vous reconnecter<br/>";
      }
    }
?>