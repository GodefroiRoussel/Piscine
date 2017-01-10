<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
  require_once('../model/Etudiant.php');
  require_once('../model/Admin.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion étudiant
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion étudiant
            header('Location:connexionAdmin.controller.php');
    }
    else{
    //On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;

      //On vérifie que c'est un token valide
      if (verificationToken($decoded_array)){
        if($decoded_array['role']==="admin"){
          $email=getMailAdmin($decoded_array['id']);
          //Vérification que la référence promo correspond à une promo éxistante
          if(isset($_GET['refPromo'])){
            $id=$_GET['refPromo'];
            if(existePromoId($id)){
              if(isset($_GET['refEtuMod'])){
                //Protéction contre les injections SQL
                $idEtuMod=htmlspecialchars(($_GET['refEtuMod']));
                //Vérification que la référence promo correspond à une promo éxistante 
                if(existeEtudiantId($idEtuMod)){
                  $email=getMailEtudiant($idEtuMod);
                  if(isset($_GET["email"]) & !empty($_GET["email"])){
                    $newEmail=htmlspecialchars($_GET['email']);
                    if(existeEtudiantMail($newEmail)){
                      if(modifMailEtudiant($idEtuMod,$newEmail)){
                        echo "Mail modifié";
                      }
                      else{
                        echo "Erreur, le mail n'a pu être modifié";
                      }
                    }
                    else{
                      echo "Erreur, mail déjà utilisé par un autre étudiant";
                    }
                  }
                  if(isset($_GET["passwd"]) & !empty($_GET["passwd"])){
                    $passwd=htmlspecialchars(($_GET['passwd']));
                    if(modifPasswordEtudiant($idEtuMod,$passwd)){
                      echo "Mot de passe modifé";
                    }
                    else{
                      echo "Erreur, le mot de passe n'a pu être modifé";
                    }
                  }
                  include ("../view/modifierEtudiant.php");
                }
                else{
                  echo "Erreur l'étudiant n'éxiste pas ... <br/>";
                  sleep(2);
                  header('Location::../controller/gererPromo.controller.php?$refPromo=$id');
                }
              }
              else{
                echo "Erreur l'étudiant n'éxiste pas ... <br/>";
                sleep(2);
                header('Location::../controller/gererPromo.controller.php?$refPromo=$id');
              }
            }
            else{
              echo "Erreur la promo n'existe pas ... <br/>";
              sleep(2);
              header('Location:../controller/administrerPromo.controller.php');
            }
          }
          else{
            echo "Erreur la promo n'existe pas ... <br/>";
            sleep(2);
            header('Location:../controller/administrerPromo.controller.php');
          }
        }
        else{
            echo "On vous redirige... <br/>";
            sleep(2);
            header('Location:../controller/redirection.php');
          }
      }
      else {
        echo "Mauvais token, veuillez vous reconnecter<br/>";
        sleep(2);
        header('Location:../controller/connexionAdmin.controller.php');
      }
    }
?>