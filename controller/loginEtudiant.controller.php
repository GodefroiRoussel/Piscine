<?php
  require_once('../vendor/autoload.php');
  require_once('../model/Promo.php');
  require_once('../model/connexionBD.php');
  use \Firebase\JWT\JWT;

  //Sécurisation des données saisies
  $email = htmlspecialchars ($_POST['email']);
  $password = htmlspecialchars ($_POST['passwd']);
  $clefPromo = htmlspecialchars ($_POST['clefPromo']);

  //TODO : mettre ces variables dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE";
  $validity_time=5400; //Validité d'une heure trente comme un cours à Polytech

   //On vérifie que l'utilisateur n'est pas déjà connecté
   if(!isset($_COOKIE["token"])){
            //On vérifie que les champs ne soient pas vide et non null.
            //TODO: A vérifier si ça marche toujours en passant par les variables
            if(isset($_POST['email']) && isset($_POST['clefPromo']) && isset($_POST['passwd']) && !empty($_POST['email']) && !empty($_POST['passwd']) && !empty($_POST['clefPromo'])){
                //On crypte le mot de passe avec un "grain de sel"
                $password = crypt($password,$keyCryptage);
                $id=existeEtudiant($email, $password, $clefPromo);
                $id=(int)$id;

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
                }
            }
            else{
                echo ("ERREUR : il faut remplir tous les champs ! Login, mot de passe et le code de ta clefPromo");
            }
    }
    else {
        echo ("ERREUR : tu es déjà connecté");
    }
