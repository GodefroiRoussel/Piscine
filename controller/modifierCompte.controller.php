<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Admin.php');
  require_once('../model/Etudiant.php');
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
      	if($role==="admin"){
        	$email=getMailAdmin($decoded_array['id']);
          $prenom=getPrenomAdmin($decoded_array['id']);
          $nom=getNomAdmin($decoded_array['id']);
        	// Si $_POST['email'] existe et qu'il n'est pas vide, on modifie l'adresse mail
        	if(isset($_POST["email"]) && !empty($_POST["email"])) {
              $email = htmlspecialchars ($_POST['email']);
              modifMailAdmin($decoded_array['id'],$email);
          }


          if (isset($_POST["passwd"]) && !empty($_POST["passwd"])){
            $password= htmlspecialchars ($_POST['passwd']);
            $_POST["futur"]= htmlspecialchars($_POST["futur"]);
            // On cripte le password avant de le rentrer dans la BDD
            $password = crypt($password,$keyCryptage);
            modifPasswordAdmin($decoded_array['id'],$password);
          }
        }//endif admin
        // On fait la même chose mais si c'est un étudiant
        else if($role==="etudiant"){
          $email=getMailEtudiant($decoded_array['id']);
          $prenom=getPrenomEtudiant($decoded_array['id']);
          $nom=getNomEtudiant($decoded_array['id']);

          // Par contre il peut changer son mot de passe
          if (isset($_POST["passwd"]) && !empty($_POST["passwd"])){
            $password= htmlspecialchars ($_POST['passwd']);
            // On cripte le password avant de le rentrer dans la BDD
            $password = crypt($password,$keyCryptage);
            modifPasswordEtudiant($decoded_array['id'],$password);
          }

        }//endif etudiant
        include('../view/modifierCompte.php');

      }//endif verificationToken
      else{
          header('Location:redirection.php');
      }
    }//endelse
?>
