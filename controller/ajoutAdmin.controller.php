<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/admin.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE";

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
      		//Si $_POST éxiste et qu'il n'est pas vide c'est à dire qu'on veut ajouter un admin
        	if(isset($_POST["email"]) and isset($_POST["passwd"]) and !empty($_POST["email"]) and !empty($_POST["passwd"])){
            // On sécurise contre l'injection sql
            $email= htmlspecialchars($_POST["email"]);
            $password= htmlspecialchars($_POST["passwd"]);

            //On crypte le mot de passe avec un "grain de sel"
            $password = crypt($password,$keyCryptage);
            //On stocke true si creerAdmin() ajoute l'admin à la BD, false s'il éxiste déjà
        		$ajoutReussi=creerAdmin($email,$password);
		        //Si l'admin n'a pas bien été ajouté dans la BD
        		if(!$ajoutReussi){
        			echo "ERREUR : l'email correspond à un administrateur déjà enregistré";
        		}
          }//endif isset

          include('../view/ajoutAdmin.php');
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
