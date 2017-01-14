<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/Etudiant.php');
  use \Firebase\JWT\JWT;

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
  }

  include('../view/contact.php')
 ?>
