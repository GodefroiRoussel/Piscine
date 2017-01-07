<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/GroupeDeProposition.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers vers la page d'accueil
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la page d'accueil
            header('Location:redirection.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
          $id=$decoded_array['id'];

          // Si la variable groupe n'existe pas
          //TODO: Faire vérif pour si ce n'est pas un entier entre 1 et 12
          if (!isset($_GET['numGroupe'])){
            $i=1;
          }
          // Si on a pas atteint le dernier groupe
          else {
            $i=$_GET['numGroupe'];
          }

          //On a dans $propositions toutes les propositions du groupe x. C'est un array
          $propositions=getPropositionsGroupe($i);


          include('../view/afficherQuestionnaire.php');
        }//endif admin
        else{
          echo "On vous redirige <br/>";
        }

      }

      else {

        echo "Mauvais token, veuillez vous reconnecter<br/>";

      }
    }
