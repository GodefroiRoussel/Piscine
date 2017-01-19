<?php
require_once('../model/connexionBD.php');
require_once('../model/Promo.php');


   //TODO : mettre ces variables dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE";

//vérifie que l'utilisateur n'est pas connecté
 if(!isset($_COOKIE["token"])){
	 //vérifie que tous les champs sont non vides et non NULL
	 if (isset($nom) && isset($prenom) && isset($passwd) && isset($passwdconf) && isset($email) &&isset($clefPromo) &&
   !empty($nom) && !empty($prenom) && !empty($passwd) && !empty($passwdconf) && !empty($email) && !empty($clefPromo)){
     //Sécurisation des données saisies
      $nom = htmlspecialchars ($_POST['nom']);
      $prenom = htmlspecialchars ($_POST['prenom']);
      $email = htmlspecialchars ($_POST['email']);
      $passwd = htmlspecialchars ($_POST['passwd']);
      $passwdconf = htmlspecialchars ($_POST['passwdconf']);
      $clefPromo = htmlspecialchars ($_POST['clefPromo']);
		//vérifie que le mot de passe et sa confirmation son égaux
		if($passwd==$passwdconf){
			$verifemail=strtolower($prenom.'.'.$nom) ;

			//vérifie que l'email est bien de la forme prenom.nom@etu.umontpellier.Fr
			if(preg_match("#".$verifemail."([0]?)([0-9]?)#",$email)){
		      	//On crypte le mot de passe avec un "grain de sel"
          		$passwd = crypt($passwd,$keyCryptage);
          		$id=existeEtudiant($email, $passwd, $clefPromo);
				//On vérifie que l'étudiant n'est pas déjà dans la base de données
				    if(!$id>0){
					         //on transforme le mail sous la forme prenom.nom@etu.umontpellier.Fr
					         $mail=$email."@etu.umontpellier.fr";
					         //on récupère l'id de la promo correspondant au code promo
				        	 $idPromo=getID($clefPromo);
					         ajoutEtudiant($idPromo,$mail,$nom,$prenom,$passwd);
                   header('Location:connexionEtudiant.controller.php');
            }
       else{
			echo 'ERREUR : un compte pour cet étudiant existe déjà';
        }
		  } else {
				echo 'ERREUR : l email n a pas la forme prenom.nom@etu.umontpellier.fr';
		    }
      }
    else {
		echo 'ERREUR : les deux mots de passe ne correspondent pas';
      }
    }
    else {
		echo 'ERREUR : un des champs est vide';
    }
 }
 else{
	header('Location:../controller/redirection.php');
	}
?>
