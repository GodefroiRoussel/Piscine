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
          //Si on a une refPromo alors on peut afficher la page. Sinon on redirige vers la page administrerPromo
          if(isset($_GET['refPromo'])||isset($_POST['refPromo'])){
            if(isset($_GET['refPromo'])){
              //Protection contre les failles XSS
              $id=htmlspecialchars(($_GET['refPromo']));
            }
            if(isset($_POST['refPromo'])){
              //Protection contre les failles XSS
              $id=htmlspecialchars(($_POST['refPromo']));
            }
            //Vérification que la référence promo correspond à une promo éxistante
            if(existePromoId($id)){
              //On récupère ces infos pour les afficher dans la view              
              $nomDepartement=getNomDepartementPromo($id);
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
                //Protection contre les failles XSS
                $anneePromo=htmlspecialchars($_POST['anneePromo']);
                //On convertit en int
                $anneePromo=intval($anneePromo);
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
                  //Protection contre les failles XSS
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
                  //Protection contre les failles XSS
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
              $existeRecherche=False; //variable pour savoir si on devra ou non transmettre la recherche en cours
              $typeRecherche="default";//variable qui gardera la valeur de l'option dans tous les cas
              $rechercheTexte="";
              if(isset($_POST['typeRecherche'])||isset($_GET['typeRecherche'])){ 
                if(isset($_POST['typeRecherche'])){//Si le type de recherche a été transmis par un POST (donc par la recherche directement)
                  $typeRecherche=htmlspecialchars($_POST['typeRecherche']); 
                } 
                if(isset($_GET['typeRecherche'])){//Si le type de recherche a été transmis par un GET (donc par l'url d'un bouton de tri)
                  $typeRecherche=htmlspecialchars($_GET['typeRecherche']); 
                }
                $typeRecherchePossible=array('prenom','nom','premierTest'); 
                if(in_array($typeRecherche, $typeRecherchePossible)){//Si c'est une recherche que l'on peut réaliser 
                  if(isset($_POST['rechercheTexte'])){
                    $existeRecherche=True; 
                    $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                    $etudiants=getAllEtudiantRecherche($id,$typeRecherche,$rechercheTexte);
                  }
                  else if(isset($_GET['rechercheTexte'])){ 
                    $existeRecherche=True; 
                    $rechercheTexte=htmlspecialchars($_GET['rechercheTexte']); 
                    $etudiants=getAllEtudiantRecherche($id,$typeRecherche,$rechercheTexte); 
                  } 
                  else{
                    $etudiants=getAllEtudiant($id);//récupère tous les étudiants de la promo
                  }
                }
                //sinon on récupère juste les étudiants sans appliquer de tri
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
                $triPossible=array('prenomCroissant','prenomDecroissant','nomCroissant','nomDecroissant','testCroissant','testDecroissant');
                if(in_array($tri, $triPossible)){//Si c'est un tri que l'on peut réaliser
                  //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
                  foreach ($etudiants as $key => $row) {
                    $idEtu[$key] = $row['id'];
                    $nomEtu[$key]  = $row['nom'];
                    $prenomEtu[$key] = $row['prenom'];
                    $premierTest[$key] = $row['premierTest'];
                  }
                  switch($tri){//Tri selon le champ renseigné par $tri
                    case 'prenomCroissant' :
                      array_multisort($prenomEtu, SORT_ASC, $etudiants);
                      break;

                    case 'prenomDecroissant' :
                      array_multisort($prenomEtu, SORT_DESC, $etudiants);
                      break;

                    case 'nomCroissant' :
                      array_multisort($nomEtu, SORT_ASC, $etudiants);
                      break;

                    case 'nomDecroissant' :
                      array_multisort($nomEtu, SORT_DESC, $etudiants);
                      break;

                    case 'testCroissant' :
                      array_multisort($premierTest, SORT_ASC, $etudiants);
                      break;

                    case 'testDecroissant' :
                      array_multisort($premierTest, SORT_DESC, $etudiants);
                      break;
                  }
                }  
                else{
                  $existeTri=False;//si c'est un mauvais critère c'est comme si aucun tri n'était appliqué
                  echo "Impossible de trier selon ce critère";
                }
              }
            include("../view/gererPromo.php");
            }
            else{//Cas ou la référence promo correspond à aucune promo
              header('Location:../controller/administrerPromo.controller.php');
            }
          }
          else{//Cas ou le get est vide (pas de référence promo)
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
