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
        	$email=getMailAdmin($decoded_array['id']);
          //cas où on veut supprimer une promo, on récupère l'id de la promo
          if(isset($_GET['refPromoSupp'])){
            $refPromoSupp=htmlspecialchars($_GET['refPromoSupp']);
            if(existePromoId($refPromoSupp)){//Si une promo avec l'id récupéré existe, on appelle la fonction sql SupprimerPromo()
              supprimerPromo($refPromoSupp);
            }
            else{
              echo "Erreur : promo inéxistante";
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
            if($typeRecherche!="default" && $typeRecherche!="sansTri"){
              if(isset($_POST['rechercheTexte'])){
                $existeRecherche=True;
                $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                $promos=getAllPromoRecherche($typeRecherche,$rechercheTexte);
              }
              else if(isset($_GET['rechercheTexte'])){ 
                $existeRecherche=True; 
                $rechercheTexte=htmlspecialchars($_GET['rechercheTexte']); 
                $etudiants=getAllPromoRecherche($id,$typeRecherche,$rechercheTexte); 
              } 
              else{
                $promos=getAllPromo();//récupère toutes les promos
              }
            }
            else{
              $promos=getAllPromo();//récupère toutes les promos
            }
          }
          else{
            $promos=getAllPromo();//récupère toutes les promos
          }
          $existeTri=isset($_GET['tri']);//Permet de pouvoir transporter le tri séléctionné d'une page à l'autre dans le cas d'une mise à jour de la page autre que par le tri
          if($existeTri){
            $tri=htmlspecialchars($_GET['tri']);
            $triPossible=array('departementCroissant','departementDecroissant','anneeCroissant','anneeDecroissant','clefPromoCroissant','clefPromoDecroissant');
            if(in_array($tri, $triPossible)){
              //On a un tableau de lignes et la fonction array_multisort() prend un tableau de colonnes
              foreach ($promos as $key => $row) {
                  $idPromo[$key] = $row['id'];
                  $codePromo[$key]  = $row['codePromo'];
                  $nom[$key] = $row['nom'];
                  $anneePromo[$key] = $row['anneePromo'];
              }
              switch($tri){
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
