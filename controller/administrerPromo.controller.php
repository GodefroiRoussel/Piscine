<?php
  require_once('../vendor/autoload.php');
  require_once('../model/connexionBD.php');
  require_once('../model/token.php');
  require_once('../model/Promo.php');
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
          //cas où on veut supprimer une promo
          if(isset($_GET['refPromo'])){
            $refPromo=htmlspecialchars($_GET['refPromo']);
            if(existePromo($refPromo)){
              supprimerPromo($refPromo);
            }
            else{
              echo "Erreur : promo inéxistante";
              include("../view/administrerPromo.php");
            }
          }
          $typeRecherche="default";
          $rechercheTexte="";
          if(isset($_POST['typeRecherche'])){
            $typeRecherche=htmlspecialchars($_POST['typeRecherche']);
            if($typeRecherche!="default"){
              if(isset($_POST['rechercheTexte'])){
                $rechercheTexte=htmlspecialchars($_POST['rechercheTexte']);
                $promos=getAllPromoRecherche($typeRecherche,$rechercheTexte);
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
            if($tri=='departementCroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($nom, SORT_ASC, $promos);
            }
            elseif($tri=='departementDecroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($anneePromo, SORT_ASC, $promos);
            }
            elseif($tri=='anneeCroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($anneePromo, SORT_ASC, $promos);
            }
            elseif($tri=='anneeDecroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($anneePromo, SORT_ASC, $promos);
            }
            elseif($tri=='clefPromoCroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($codePromo, SORT_ASC, $promos);
            }
            elseif($tri=='clefPromoDecroissant'){
              foreach ($promos as $key => $row) {
                $idPromo[$key] = $row['id'];
                $codePromo[$key]  = $row['codePromo'];
                $nom[$key] = $row['nom'];
                $anneePromo[$key] = $row['anneePromo'];
              }
              array_multisort($codePromo, SORT_ASC, $promos);
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
