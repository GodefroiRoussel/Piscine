<?php
  require_once('../vendor/autoload.php');
  require_once('../model/Etudiant.php');
  use \Firebase\JWT\JWT;

  //Sécurisation des données saisies
  $email = htmlspecialchars ($_POST['email']);
  $password = htmlspecialchars ($_POST['passwd']);
  $clefPromo = htmlspecialchars ($_POST['clefPromo']);


  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE"
  $validity_time=5400; //Validité d'une heure trente comme un cours à Polytech

   //On vérifie que l'utilisateur n'est pas déjà connecté
   if(!isset($_COOKIE["token"])){
            //On vérifie que les champs ne soient pas vide et non null.
            // A vérifier si ça marche toujours en passant par les variables
            if(isset($_POST['email']) && isset($_POST['clefPromo']) && isset($_POST['passwd']) && !empty($_POST['email']) && !empty($_POST['passwd']) && !empty($_POST['clefPromo'])){
                //On crypte le mot de passe avec un "grain de sel"
                $password = crypt($password,$keyCryptage);
                $id=existeEtudiant($email, $password, $clefPromo);
                //On vérifie que le login existe dans la table et que les informations soient exactes. (BD.password==passwd && BD.email==email)
                if ($id>0){
                    //On définit le token contenant les différentes informations.
                    $token = array(
                        "iss" => "http://example.org",
                        "aud" => "http://example.com",
                        "iat" => time(),
                        "nbf" => time() +10,
                        "id" => $id,
                        "role" => "etudiant"
                    );

                    $jwt = JWT::encode($token, $key);
                    JWT::$leeway = 60; // $leeway in seconds

                    /*$decoded = JWT::decode($jwt, $key, array('HS256'));
                    $decoded_array = (array) $decoded;
                    */
                    setcookie("token", $jwt, time()+$validity_time);
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


  include_once(../view/pageEtudiant.php);
