<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/connexionBD.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Proposition.php');
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
          $premierTest=premierTest($id);

          //Si les variables res1,res2 et res3 ont été envoyées par un ancien formulaire et ne sont pas nulles. On remplace les string initialisés précédemment.
          if (isset($_GET['res1']) && isset($_GET['res2']) && isset($_GET['res3'])){
            $array_choice1=explode(",",$_GET['res1']); //Contient tous les id qui ont été choisis en premier. array_choice1[0]==0
            $array_choice2=explode(",",$_GET['res2']); //Contient tous les id qui ont été choisis en premier. array_choice2[0]==0
            $array_choice3=explode(",",$_GET['res3']); //Contient tous les id qui ont été choisis en premier. array_choice3[0]==0

            $array_choice=[$array_choice1,$array_choice2,$array_choice3]; // Tableau regroupant tous les tableaux pour éviter une duplication de code du calcul RIASEC
            $result=[0,0,0,0,0,0]; // On stocke dans ce tableau les différents score de chaque fiche.

            //Double boucle pour parcourir tout le tableau $array_choice et ainsi permettre le calcul des résultats RIASEC
            for($j=0;$j<3;$j++){
              // Si j==0 alors c'est le premier choix et il vaut 3 points
              if($j==0){
                $val=3;
              }
              // Si j==1 alors c'est le deuxième choix et il vaut 2 points
              else if ($j==1){
                $val=2;
              }
              // Sinon c'est le troisième choix et il vaut 1 point
              else{
                $val=1;
              }
              for($i=1;$i<=12;$i++){
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
            if($premierTest){
              for($i=0;$i<6;$i++){
                ajouterResultat($id,$i+1,$result[$i]);
              }

            }
          }
          else{
            //TODO: charger par la base de données les résultats
          }

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
