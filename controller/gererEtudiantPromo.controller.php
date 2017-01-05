<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
  require_once('../model/Etudiant.php');
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
        	$email=getMail($decoded_array['id']);
          if(isset($_GET['refPromo']) && isset($_GET['refEtu']) !empty($_GET['refPromo']) && !empty($_GET['refEtu']) && existeEtudiant($_GET['refEtu']) existePromo($_GET['refPromo'])){//cas où on veut reset le premier test
            resetPremierTest($_GET['refEtu']);
            echo "Reset éffectué";
            $etudiants=getAllEtudiants($_GET['refPromo']);//récupère tous les étudiants de la promo          
            include("../view/gererEtudiantPromo.php");
          if(isset($_GET['refPromo']) && !empty($_GET['refPromo']) && existePromo($_GET['refPromo'])){//cas où on veut pas modifier le premier test
            $etudiants=getAllEtudiants($_GET['refPromo']);//récupère tous les étudiants de la promo          
            include("../view/gererEtudiantPromo.php");
          }
          if(isset($_GET['refEtu']) && !empty($_GET['refEtu'])){//cas où on veut supprimer un élève
            supprimerEtudiant($_GET['id']);
            $etudiants=getAllEtudiants($_GET['refPromo']);//récupère tous les étudiants de la promo
            include("../view/gererEtudiantPromo.php");            
          }
          else{
            echo "Erreur la promo n'éxiste pas ... <br/>";
            sleep(2);
            header('Location:../controller/administrerPromo.controller.php');
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