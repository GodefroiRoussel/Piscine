<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
  require_once('../model/Admin.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";

   //On vérifie que l'utilisateur est déjà connecté sinon on le redirige vers la connexion admin
   if(!isset($_COOKIE["token"])){

            // On le redirige vers la connexion admin
            header('Location:connexionAdmin.controller.php');
    }
    else{
		//On décode le token
    	$decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
    	$decoded_array = (array) $decoded;

    	//On vérifie que c'est un token valide
     	if (verificationToken($decoded_array)){
      	if($decoded_array['role']==="admin"){
          //cas où on veut supprimer une promo, on récupère l'id de la promo
          if(isset($_GET['refPromoSupp'])){
            //Protection contre les failles XSS
            $refPromoSupp=htmlspecialchars($_GET['refPromoSupp']);
            if(existePromoId($refPromoSupp)){//Si une promo avec l'id récupéré existe, on appelle la fonction sql SupprimerPromo()
              supprimerPromo($refPromoSupp);
            }
            else{
              echo "Erreur : promo inéxistante";
            }
          }
          $existeRecherche=False; //variable pour savoir si on devra ou non transmettre la recherche en cours
          $typeRecherche="default";//variable qui gardera la valeur de l'option
          $rechercheTexte="";//variable qui gardera le texte de la recherche
          if(isset($_POST['typeRecherche'])||isset($_GET['typeRecherche'])){ 
            if(isset($_POST['typeRecherche'])){//Si le type de recherche a été transmis par un POST (donc par la recherche directement)
              $typeRecherche=htmlspecialchars($_POST['typeRecherche']); 
            } 
            if(isset($_GET['typeRecherche'])){//Si le type de recherche a été transmis par un GET (donc par l'url d'un bouton de tri)
              $typeRecherche=htmlspecialchars($_GET['typeRecherche']); 
            } 
            if($typeRecherche!="default" && $typeRecherche!="sansTri"){
              if(isset($_POST['rechercheTexte'])){
                $existeRecherche=True;
                //Protection contre les failles XSS
                $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                //Récupère toutes les promos vérifiant que le type de recherche soit égal au texte de la recherche
                $promos=getAllPromoRecherche($typeRecherche,$rechercheTexte);
              }
              else if(isset($_GET['rechercheTexte'])){ 
                $existeRecherche=True; 
                $rechercheTexte=htmlspecialchars($_GET['rechercheTexte']);
                //Récupère toutes les promos vérifiant que le type de recherche soit égal au texte de la recherche 
                $promos=getAllPromoRecherche($typeRecherche,$rechercheTexte); 
              } 
              else{
                $promos=getAllPromo();
              }
            }
            else{
              $promos=getAllPromo();
            }
          }
          else{
            $promos=getAllPromo();
          }
          $existeTri=isset($_GET['tri']);//Permet de pouvoir transporter le tri séléctionné d'une page à l'autre dans le cas d'une mise à jour de la page autre que par le tri
          if($existeTri){
            //Protection contre les injections SQL
            $tri=htmlspecialchars($_GET['tri']);
            $triPossible=array('departementCroissant','departementDecroissant','anneeCroissant','anneeDecroissant','clefPromoCroissant','clefPromoDecroissant');
            if(in_array($tri, $triPossible)){//Si c'est un tri que l'on peut réaliser
              //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
              foreach ($promos as $key => $row) {
                  $idPromo[$key] = $row['id'];
                  $codePromo[$key]  = $row['codePromo'];
                  $nom[$key] = $row['nom'];
                  $anneePromo[$key] = $row['anneePromo'];
              }
              switch($tri){//Tri selon le champ renseigné par $tri
                case 'departementCroissant' :
                  array_multisort($nom, SORT_ASC, $promos);
                  break;

                case 'departementDecroissant' :
                  array_multisort($anneePromo, SORT_DESC, $promos); 
                  break;

                case 'anneeCroissant' :
                  array_multisort($anneePromo, SORT_ASC, $promos);
                  break;
              
                case 'anneeDecroissant' :
                  array_multisort($anneePromo, SORT_DESC, $promos);
                  break;
              
                case 'clefPromoCroissant' :
                  array_multisort($codePromo, SORT_ASC, $promos);
                  break;
              
                case 'clefPromoDecroissant' :
                  array_multisort($codePromo, SORT_DESC, $promos);
                  break;
              }
            }
            else{
              $existeTri=False;//si c'est un mauvais critère c'est comme si aucun tri n'était appliqué
              echo "Impossible de trier selon ce critère";
            }
          }
          include("../view/administrerPromo.php");
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
