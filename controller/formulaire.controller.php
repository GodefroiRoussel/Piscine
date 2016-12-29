<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/GroupeDeProposition.php');
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
          $id=$decoded_array['id'];

          // On initialise les string de résultat à une chaine de caractère initialisé à 0 (cela veut dire qu'aucun choix n'avait été fait avant).
          $res1="0";
          $res2="0";
          $res3="0";

          //Si les variables res1,res2 et res3 ont été envoyées par un ancien formulaire et ne sont pas nulles. On remplace les string initialisés précédemment.
          if (isset($_GET['res1']) && isset($_GET['res2']) && isset($_GET['res3'])){
            $res1=$_GET['res1'];
            $res2=$_GET['res2'];
            $res3=$_GET['res3'];
          }

          // Si la variable groupe n'existe pas
          if (!isset($_GET['groupe'])){
            $i=1;
          }
          // Si on a pas atteint le dernier groupe
          else if ($_GET['groupe']<12){
            $i=$_GET['groupe'];
          }
          // Si on est au dernier groupe
          else{
            $i=12;
          }

          $propositions=getPropositionsGroupe($i); //On a dans $propositions toutes les propositions du groupe x. C'est un array


          include('../Formulaire/formulaire.php');
        }
        else{
          echo "On vous redirige <br/>";
        }

      }

      else {

        echo "Mauvais token, veuillez vous reconnecter<br/>";

      }
    }
