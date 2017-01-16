<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/GroupeDeProposition.php');
  require_once('../model/Etudiant.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion étudiant
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
          $id=$decoded_array['id'];

          // Si la variable groupe n'existe pas
          if (!isset($_POST['numGroupe'])){
            $i=1;
          }
          // Si on a pas atteint le dernier groupe
          else {
            $i=$_POST['numGroupe'];
          }



          // Si on a déjà les anciens choix en "mémoire" on les remet sous forme de tableau (en explodant la chaîne de caractères) sinon on initialise un tableau de taille 12
          // comportant que des 0 (signification qu'il n'a pas répondu à la question encore)
          if (isset($_POST['choix1']) && isset($_POST['choix2']) && isset($_POST['choix3'])){
            $choix1=explode(",",$_POST['choix1']);
            $choix2=explode(",",$_POST['choix2']);
            $choix3=explode(",",$_POST['choix3']);
          }
          else {
            $choix1=[0,0,0,0,0,0,0,0,0,0,0,0];
            $choix2=[0,0,0,0,0,0,0,0,0,0,0,0];
            $choix3=[0,0,0,0,0,0,0,0,0,0,0,0];
          }


          //Si les variables res1,res2 et res3 ont été envoyées par un ancien formulaire et ne sont pas nulles.
          if (isset($_POST['rep1']) && isset($_POST['rep2']) && isset($_POST['rep3'])){
            // Ici on fait -2 car $i commence à 1 et nous ne sauvegardons les choix localement qu'à partir du groupe 2 donc pour atteindre la première case du tableau il faut faire -2
            // On ne rentrera pas la dernière valeur qui aura lieu dans le resultat.controller
            $choix1[$i-2]=$_POST['rep1'];
            $choix2[$i-2]=$_POST['rep2'];
            $choix3[$i-2]=$_POST['rep3'];
          }

          $propositions=getPropositionsGroupe($i); //On a dans $propositions toutes les propositions du groupe x. C'est un array


          include('../view/formulaire.php');
        }
        else{
          header('Location:../controller/redirection.php');
        }

      }

      else {
        header('Location:../controller/redirection.php');
      }
    }
