<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
  require_once('../model/Etudiant.php');
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
          //TODO: protéger contre l'injection sql
          if(isset($_GET['refPromo']) && existePromo($_GET['refPromo'])){
            // Cas où on veut reset le premier test
            if(isset($_GET['refEtuTest']) && !empty($_GET['refEtuTest']) && existeEtudiant($_GET['refEtuTest'])){
              resetPremierTest($_GET['refEtuTest']);
              echo "Reset effectué";
            }
            //cas où on veut supprimer un élève
            if(isset($_GET['refEtuSupp']) && !empty($_GET['refEtuSupp']) && existeEtudiant($_GET['refEtuSupp'])){
              supprimerEtudiant($_GET['refEtuSupp']);
            }
            $etudiants=getAllEtudiant($_GET['refPromo']);//récupère tous les étudiants de la promo
            include("../view/gererEtudiantPromo.php");
          }
        else{
          echo "Erreur la promo n'existe pas ... <br/>";
          sleep(2);
          header('Location:../controller/administrerPromo.controller.php');
        }
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
