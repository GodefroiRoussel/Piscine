<?php

        require_once('../vendor/autoload.php');
        require_once('../model/token.php');
        use \Firebase\JWT\JWT;

        //Si l'utilisateur n'est pas connecté
        if(!isset($_COOKIE["token"])){

                 // On le redirige vers la page d'accueil
                 include('../view/pageAccueil.php');
         }
         else{

           //TODO: mettre dans un fichier .env
           $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

           //On décode le token
           $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
           $decoded_array = (array) $decoded;

           //On vérifie que c'est un token valide
           if (verificationToken($decoded_array)){
             //Si c'est un étudiant on le redirige sur la page pageEtudiant.php
             if ($decoded_array["role"]==="etudiant"){
               header('Location:pageEtudiant.controller.php');
             }//endif
             //Sinon on le redirige sur la page pageAdmin.php
             else{
               header('Location:pageAdmin.controller.php');
             }//endelse

           }//endif
           //Cookie incorrect, on supprime le cookie et on renvoie l'utilisateur sur la page d'accueil
           else{
             // Suppression du cookie user
             // Set expiration time to -1hr (will cause browser deletion)
             setcookie('token', '', time()-10000000, '/');
             // Unset key
             unset($_COOKIE["token"]);
             header('Location:../view/accueil.php');
           }
         }
?>
