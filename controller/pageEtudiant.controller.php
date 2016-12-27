<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion étudiant
            echo "Tu n'as pas de cookie";
    }
    else{
      //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        //On fait les choses
        include_once('../view/pageAdmin.php');
      }

      else {
        echo gettype($decoded_array['id']);
        echo "Mauvais token, veuillez vous reconnecter<br/>";
        echo $decoded_array["iss"];
        echo "   vs  ".$_SERVER['HTTP_HOST'];
          echo "<br/>Résultat : ".$decoded_array['iss']==$_SERVER['HTTP_HOST']."<br/>";
        echo "<br/>---------------------------<br/>";
        echo $decoded_array["exp"];
        echo "   vs  ".time();
        echo "<br/>---------------------------<br/>";
        echo  $decoded_array["id"];
        echo "   vs  0";
        //echo $_COOKIE["id"];
        echo "<br/>---------------------------<br/>";
        echo $decoded_array["role"];
        echo "   vs  0";
      }
    }
