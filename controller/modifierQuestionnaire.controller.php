<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/GroupeDeProposition.php');
  require_once('../model/Proposition.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la page d'accueil
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
          //TODO: Faire vérif que c'est bien un entier
          if (!isset($_GET['numGroupe'])){
            $i=1;
          }
          // Sinon on récupère la valeur
          else {
            $i=$_GET['numGroupe'];
          }

          // Si on a une variable en post alors on a modifier une proposition et on va envoyer les modifications sur la bd
          // Comme il y a une vérification en js pour vérifier qu'il n'y ait pas de champs vide, le fait d'avoir une variable signifie qu'on a tous les post
          if(isset($_POST['proposition1']) ){
            $newContent=[$_POST['proposition1'],$_POST['proposition2'],$_POST['proposition3'],$_POST['proposition4'],$_POST['proposition5'],$_POST['proposition6']];
            $idProp=($i-1)*6; //On commence à l'id correspondant au premier id du groupe $i
            for ($j=1;$j<=6;$j+=1){
              modifProposition($idProp+$j,$newContent[$j-1]);
            }

          }

          //On a dans $propositions toutes les propositions du groupe x. C'est un array
          $propositions=getPropositionsGroupe($i);


          include('../view/modifierQuestionnaire.php');
        }//endif admin
        else{//On est sur la page admin alors qu'on n'est pas admin
          header('Location:../controller/redirection.php');
        }
      }
      else {//Mauvais token
        header('Location:../controller/redirection.php');
      }
    }
