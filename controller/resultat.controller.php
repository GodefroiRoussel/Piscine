<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Promo.php');
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
          $id=$decoded_array['id'];

          //On vérifie que les derniers choix ont bien été envoyés (ce qui correspond au fait qu'il vient de passer un test)
          if (isset($_POST['rep1']) && isset($_POST['rep2']) && isset($_POST['rep3'])){
            $array_choice1=explode(",",$_POST['choix1']); //Contient tous les id qui ont été choisis en premier.
            $array_choice2=explode(",",$_POST['choix2']); //Contient tous les id qui ont été choisis en premier.
            $array_choice3=explode(",",$_POST['choix3']); //Contient tous les id qui ont été choisis en premier.

            // On ajoute le dernier choix dans les tableaux correspondants.
            $array_choice1[11] = $_POST['rep1'];
            $array_choice2[11] = $_POST['rep2'];
            $array_choice3[11] = $_POST['rep3'];

            // Si c'est le premier test, on sauvegarde les choix pour qu'il rentre dans les statistiques
            if(premierTest($id)){
              for($i=0;$i<12;$i++){
                ajouterChoix($id,$i+1,$array_choice1[$i],$array_choice2[$i],$array_choice3[$i]);
              }
              passerTest($id);
            }
          }
          else{
            // On charge les choix de l'étudiant qui sont dans la base de données
            $choice_tab=getAllChoix($id); //C'est un tableau de tableau
            //On le fait passer en simple tableau
            for ($i=0;$i<12;$i++){
              $array_choice1[$i]=$choice_tab[$i][0];
              $array_choice2[$i]=$choice_tab[$i][1];
              $array_choice3[$i]=$choice_tab[$i][2];
            }
          }
          // On calcule les résultats de l'élève
          $result=calculResultat($array_choice1,$array_choice2,$array_choice3);

          // On récupère l'id de la fiche correspondant au maximum des résultats de l'étudiant
          $idFiche=getIdFicheByResult($result);

          $nomFiche=getNomFiche($idFiche);
          $valeurFiche= getValeurFiche($idFiche);

          // On calcule les résultats de la promo à partir de l'id de l'étudiant
          $resultPromo=calculResultatPromo(getIdPromo($id));
          include('../view/resultat.php');


        }
        else{
          // Si un admin essaie d'accéder aux résultats on le redirige
          header('Location:redirection.php');
        }

      }

      else {
          // Si le token n'est pas valide, on redirige et détruit le cookie
          header('Location:redirection.php');
      }
    }
