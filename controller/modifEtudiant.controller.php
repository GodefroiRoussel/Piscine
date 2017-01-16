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
  $keyCryptage= "P0lyP1sCinE";

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
            $id=htmlspecialchars($_GET['refPromo']);
            if(existePromoId($id)){
              if(isset($_GET['refEtuMod'])){
                //Protection contre les failles XSS
                $idEtuMod=htmlspecialchars(($_GET['refEtuMod']));
                //Vérification que la référence promo correspond à une promo éxistante
                if(existeEtudiantId($idEtuMod)){
                  if(getIdPromo($idEtuMod)==$id){
                    if(isset($_POST["email"]) & !empty($_POST["email"])){
                      $newEmail=htmlspecialchars($_POST['email']);
                      if(!existeEtudiantMail($newEmail)){
                        modifMailEtudiant($idEtuMod,$newEmail);
                      }
                      else{
                        echo "Erreur, l'email est déjà utilisé";
                      }
                    }
                    if(isset($_POST["passwd"]) & !empty($_POST["passwd"])){
                      $password= htmlspecialchars ($_POST['passwd']);
                      $_POST["futur"]= htmlspecialchars($_POST["futur"]);
                      // On cripte le password avant de le rentrer dans la BD
                      $password = crypt($password,$keyCryptage);
                      modifPasswordEtudiant($idEtuMod,$password);
                    }
                    if(isset($_POST["nom"]) & !empty($_POST["nom"])){
                      $nom=htmlspecialchars(($_POST['nom']));
                      modifNomEtudiant($idEtuMod,$nom);
                    }
                    if(isset($_POST["prenom"]) & !empty($_POST["prenom"])){
                      $prenom=htmlspecialchars(($_POST['prenom']));
                      modifPrenomEtudiant($idEtuMod,$prenom);
                    }
                    if(isset($_POST["codePromo"]) & !empty($_POST["codePromo"]) && $_POST["codePromo"]!=getCode(getIdPromo($idEtuMod)) ){
                      $codePromo=htmlspecialchars(($_POST['codePromo']));
                      $idPromo=getID($codePromo);
                      modifIdPromoEtudiant($idEtuMod,$idPromo);
                      header('Location:administrerPromo.controller.php');
                    }
                    $idPromo=getIdPromo($idEtuMod);
                    $codePromo=getCode($idPromo);
                    $email=getMailEtudiant($idEtuMod);
                    $prenom=getPrenomEtudiant($idEtuMod);
                    $nom=getNomEtudiant($idEtuMod);
                    include ("../view/modifierEtudiant.php");
                  }
                  else{//L'étudiant n'appartient pas à cette promo
                    header('Location::../controller/gererPromo.controller.php?$refPromo=$id');
                  }
                }
                else{//La référence étudiant n'existe pas
                  header('Location::../controller/gererPromo.controller.php?$refPromo=$id');
                }
              }
              else{//La référence étudiant n'est pas définie
                header('Location::../controller/gererPromo.controller.php?$refPromo=$id');
              }
            }
            else{//La référence promo n'éxiste pas
              header('Location:../controller/administrerPromo.controller.php');
            }
          }
          else{//La référence promo n'est pas définie
            header('Location:../controller/administrerPromo.controller.php');
          }
        }
        else{//On est sur la page admin alors qu'on n'est pas admin
            header('Location:../controller/redirection.php');
          }
      }
      else {//Mauvais token
        header('Location:../controller/redirection.php');
      }
    }
?>
