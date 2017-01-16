<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Admin.php');
  require_once('../model/Promo.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion admin
            header('Location:connexionAdmin.controller.php');
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
          $prenom=getPrenomAdmin($decoded_array['id']);
          $nom=getNomAdmin($decoded_array['id']);
          $nbPromo=getNbPromo();
          $anneePromo=getAnneePlusAnciennePromo();
          $nbAdmin=getNbAdmin();
          include('../view/pageAdmin.php');
        }
        else{//On est sur la page admin alors qu'on n'est pas admin
          header('Location:../controller/redirection.php');
        }
      }
      else {//Mauvais token
        header('Location:../controller/redirection.php');
      }
    }
