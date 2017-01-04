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
        	//Si $_POST éxiste et qu'il n'est pas vide c'est à dire qu'on veut ajouter un admin
        	if(isset($_POST["email"]) and isset($_POST["passwd"]) and !empty($_POST["email"]) and !empty($_POST["passwd"])){
	            //On cripte le password avant de le rentrer dans la BDD
	            $password = crypt($password,$keyCryptage);
              //on modifie le mail et on stocke dans une variable le booléen renvoyée pour vérifier que la modification a bien été éfféctuée
	            $modifReussiPasswd = modifPassword($decoded_array['id'],$password);
              $modifReussiMail = modifMail($decoded_array['id'],$_POST["email"]);
              if($modifReussiPasswd && $modifReussiMail){
                include('../view/modifierCompte.php');
              }
	        	  else{
                echo "Erreur : les modifications n'ont pas été éffectuées";
                include('../view/modifierCompte.php');
              }
          }
          else{
            include('../view/modifierCompte.php');
          }
        }
        else{
            echo "On vous redirige... <br/>";
            sleep(2);
            header('../index.php');
        }
      }
      else {
        echo "Mauvais token, veuillez vous reconnecter<br/>";
        sleep(2);
        header('../controller/connexionAdmin.controller.php');
      }
    }
?>
