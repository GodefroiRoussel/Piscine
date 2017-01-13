<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/etudiant.php');
  require_once('../model/fiche.php');
  require_once('../assets/functions/calculResultat.php');
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

          // Si l'étudiant a déjà passé un test. On charge le nom de la fiche le nom de la fiche
          if(!$premierTestBool){
            // On charge les choix de l'étudiant qui sont dans la base de données
            $choice_tab=getAllChoix($decoded_array['id']); //C'est un tableau de tableau
            //On le fait passer en simple tableau
            for ($i=0;$i<12;$i++){
              $array_choice1[$i]=$choice_tab[$i][0];
              $array_choice2[$i]=$choice_tab[$i][1];
              $array_choice3[$i]=$choice_tab[$i][2];
            }
              // On calcule les résultats de l'élève
              $result=calculResultat($array_choice1,$array_choice2,$array_choice3);
              // On récupère la position du tableau où le résultat est le plus grand
              $id=0;
              for ($i=1;$i<6;$i++){
                if($result[$id]<$result[$i]){
                  $id=$i;
                }
              }
              $nomFiche=getNomFiche($id+1);
          }

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
