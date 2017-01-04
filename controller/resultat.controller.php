<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Proposition.php');
  require_once('../model/Promo.php');
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

            // Tableau regroupant tous les tableaux
            $array_choice=[$array_choice1,$array_choice2,$array_choice3];
            $result=[0,0,0,0,0,0]; // On stocke dans ce tableau les différents score de chaque fiche (initialisée à 0).

            //Double boucle pour parcourir tout le tableau $array_choice et ainsi permettre le calcul des résultats RIASEC
            for($j=0;$j<3;$j++){
              // Si j==0 c'est la proposition la plus importante donc elle vaut 3 points. Si j==1, la proposition vaut 2 points et si j==2, la proposition vaut 1 point.
              $val= 3 - $j;

              for($i=0;$i<=11;$i++){
                // On récupère l'id de la Fiche pour savoir à quelle case du tableau on va devoir ajouter les points
                $idFiche=getFicheAssociee($array_choice[$j][$i]);
                $result[$idFiche-1]= $result[$idFiche-1] + $val;
              }
            }

            //On fait passer chaque score en pourcentage
            for ($i=0;$i<6;$i++){
              $result[$i]= ($result[$i]/72)*100;
            }

            // Si c'est le premier test, on sauvegarde les résultats pour qu'il rentre dans les statistiques
            if(premierTest($id)){
              for($i=0;$i<6;$i++){
                ajouterResultat($id,$i+1,$result[$i]);
              }
              passerTest($id);
            }
          }
          else{
            // On charge les résultats qui sont dans la base de données
            $result_intermediaire=getAllResultat($id); //C'est un tableau de tableau
            //On le fait passer en tableau
            for ($i=0;$i<6;$i++){
              $result[$i]=$result_intermediaire[$i][0];
            }
          }

          // On récupère la moyenne de chaque score de la promo de l'élève
          $resultPromo=getmoyResultat(getCodePromo($id));

          include('../view/resultat.php');


        }
        else{
          echo "On vous redirige <br/>";
        }

      }

      else {

        echo "Mauvais token, veuillez vous reconnecter<br/>";

      }
    }
