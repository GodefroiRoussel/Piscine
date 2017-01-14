<?php
  require_once('../vendor/autoload.php');
  require_once('../model/Promo.php');
  require_once('../model/connexionBD.php');
  use \Firebase\JWT\JWT;

  //TODO : mettre ces variables dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE";
  $validity_time=5400; //Validité d'une heure trente comme un cours à Polytech

   //On vérifie que l'utilisateur n'est pas déjà connecté
   if(!isset($_COOKIE["token"])){
            //On vérifie que les champs ne soient pas vide et non null.
            if(isset($_POST['email']) && isset($_POST['passwd']) && !empty($_POST['email']) && !empty($_POST['passwd']) ){

              //Sécurisation des données saisies
              $email = htmlspecialchars ($_POST['email']);
              $password = htmlspecialchars ($_POST['passwd']);

                //On crypte le mot de passe avec un "grain de sel"
                $password = crypt($password,$keyCryptage);
                $id=existeEtudiant($email, $password);

                //On vérifie que le login existe dans la table et que les informations soient exactes. (BD.password==passwd && BD.email==email)
                if ($id>0){
                    //On définit le token contenant les différentes informations.
                    $token = array(
                        "iss" => $_SERVER['HTTP_HOST'],
                        "exp" => time() + $validity_time,
                        "id" => $id,
                        "role" => "etudiant"
                    );

                    //On encode le token en JWT
                    $jwt = JWT::encode($token, $key);
                    JWT::$leeway = 60; // $leeway in seconds

                    //On conserve le token dans un cookie pour faciliter le passage des paramètres d'une page à une autre sans devoir utiliser des posts entre chaque page.
                    setcookie("token", $jwt, time()+$validity_time,"/", null, false, true);
                    header('Location:pageEtudiant.controller.php');
                }
                else{
                  echo ("ERREUR : tu as rentré un mauvais login/mot de passe");
                  include('../view/connexionEtudiant.php');
                }
            }//endif isset(variables)
            else {
              // Cas où la personne passe directement ici par l'url et n'est pas connecté
              header('Location:connexionEtudiant.controller.php');
            }
    } //endif !isset(COOKIE)
    else {
        // Cas où la personne est déjà connecté
        header('Location:redirection.php');
    }
