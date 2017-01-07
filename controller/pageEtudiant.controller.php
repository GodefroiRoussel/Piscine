<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/etudiant.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion étudiant
            header('Location:connexionEtudiant.controller.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="etudiant"){
          $prenom=getPrenomEtudiant($decoded_array['id']);
          $nom=getNomEtudiant($decoded_array['id']);
          $premierTestBool=premierTest($decoded_array['id']);

          include('../view/pageEtudiant.php');
        }
        else{
          // On le redirige vers la page admin
          header('Location:redirection.php');
        }

      }

      else {
        // On le redirige et on enlève le cookie.
        header('Location:redirection.php');
      }
    }
