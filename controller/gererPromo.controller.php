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
            //Protéction contre les injections SQL
            $id=htmlspecialchars(($_GET['refPromo']));
            //Vérification que la référence promo correspond à une promo éxistante
            if(existePromoId($id)){
              //On récupère ces infos pour les afficher dans la view              
              $nomDepartement=getNomDepartement($id);
              $annee=getAnnee($id);
              //Cas où on veut changer le code de la promo
              if(isset($_POST['codePromo'])){
                $codePromo=htmlspecialchars($_POST['codePromo']);
                if(!existePromo($codePromo)){
                  changerCode($id,$codePromo);
                  echo "Le code promo a bien été changé";
                }
                else{
                  echo "Erreur : une promo possède déjà ce code promo";
                }
              }
              $codePromo=getCode($id);
              if(isset($_POST['anneePromo'])){
                $anneePromo=htmlspecialchars($_POST['anneePromo']);
                setAnneePromo($id,$anneePromo);
                echo "L'année de la promo a bien été changé";
              }
              $anneePromo=getAnnee($id);
              //Cas où les deux variables sont définies (on ne peut pas reset et supprimer à la fois donc on choisit de ne rien faire)
              if(isset($refEtuTest) && isset($refEtuSupp)){
                echo "Erreur veuillez réessayer";
              }
              else{
                if(isset($_GET['refEtuTest'])){
                  //Protéction contre les injections SQL
                  $refEtuTest=htmlspecialchars(($_GET['refEtuTest']));
                  if(existeEtudiantId($refEtuTest)){
                    resetPremierTest($refEtuTest);
                    echo "Reset du test de l'étudiant ",getPrenomEtudiant($refEtuTest)," ",getNomEtudiant($refEtuTest)," effectué";
                  }
                  else{
                    echo "Etudiant invalide";
                  }
                }
                if(isset($_GET['refEtuSupp'])){
                  //Protéction contre les injections SQL
                  $refEtuSupp=htmlspecialchars(($_GET['refEtuSupp']));
                  if(existeEtudiantId($refEtuSupp)){
                    //on stocke le nom et prénom pour informer l'utilisateur de l'étudiant qui a été supprimé
                    $prenomEtuSupp=getPrenomEtudiant($refEtuSupp);
                    $nomEtuSupp=getNomEtudiant($refEtuSupp);
                    supprimerEtudiant($refEtuSupp);
                    echo "Suppréssion de l'étudiant ",$prenomEtuSupp," ",$nomEtuSupp," effectué";
                  }
                  else{
                    echo "Etudiant invalide";
                  }
                }
              }
              $typeRecherche="default";//variable qui gardera la valeur de l'option dans tous les cas
              $rechercheTexte="";
              if(isset($_POST['typeRecherche'])){
                $typeRecherche=htmlspecialchars($_POST['typeRecherche']);
                if($typeRecherche!="default"){
                  if(isset($_POST['rechercheTexte'])){
                    $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                    $etudiants=getAllEtudiantRecherche($id,$typeRecherche,$rechercheTexte);
                  }
                  else{
                    $etudiants=getAllEtudiant($id);//récupère tous les étudiants de la promo
                  }
                }
                else{
                  $etudiants=getAllEtudiant($id);//récupère tous les étudiants de la promo
                }
              }
              else{
                $etudiants=getAllEtudiant($id);//récupère tous les étudiants de la promo
              }
              $existeTri=isset($_GET['tri']);//Permet de pouvoir transporter le tri séléctionné d'une page à l'autre dans le cas d'une mise à jour de la page autre que par le tri
              if($existeTri){
                $tri=htmlspecialchars($_GET['tri']);
                if(!empty($etudiants)){
                  if($tri=='prenomCroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($prenomEtu, SORT_ASC, $etudiants);
                  }
                  elseif($tri=='prenomDecroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($prenomEtu, SORT_DESC, $etudiants);
                  }
                  elseif($tri=='nomCroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($nomEtu, SORT_ASC, $etudiants);
                  }
                  elseif($tri=='nomDecroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($nomEtu, SORT_DESC, $etudiants);
                  }
                  elseif($tri=='testCroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($premierTest, SORT_ASC, $etudiants);
                  }
                  elseif($tri=='testDecroissant'){
                    //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                    foreach ($etudiants as $key => $row) {
                      $idEtu[$key] = $row['id'];
                      $nomEtu[$key]  = $row['nom'];
                      $prenomEtu[$key] = $row['prenom'];
                      $premierTest[$key] = $row['premierTest'];
                    }
                    array_multisort($premierTest, SORT_DESC, $etudiants);
                  }
                  else{
                    $existeTri=False;//si c'est un mauvais critère c'est comme si aucun tri n'était appliqué
                    echo "Impossible de trier selon ce critère";
                  }
                }
              }
            include("../view/gererPromo.php");
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
