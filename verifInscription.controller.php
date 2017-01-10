<?php
require_once('../model/Promo.php');


 //Sécurisation des données saisies
  $nom = htmlspecialchars ($_POST['nom']);
  $prenom = htmlspecialchars ($_POST['prenom']);
  $email = htmlspecialchars ($_POST['email']);
  $password = htmlspecialchars ($_POST['passwd']);
  $passwdconf = htmlspecialchars ($_POST['passwdconf']);
  $clefPromo = htmlspecialchars ($_POST['clefPromo']);

   //TODO : mettre ces variables dans un fichier .env
  $key = "ceSera1cLERiasEcP0UrP1Sc1nE";
  $keyCryptage= "P0lyP1sCinE";

//vérifie que l'utilisateur n'est pas connecté 
 if(!isset($_COOKIE["token"])){
	 //vérifie que tous les champs sont non vides et non NULL 
	 if (isset($nom) && isset($prenom) && isset($password) && isset($passwdconf) && isset($email) &&isset($clefPromo) && !empty($nom) && !empty($prenom) && !empty($password) && !empty($passwdconf) && !empty($email) && !empty($clefPromo)){
		//vérifie que le mot de passe et sa confirmation son égaux 
		if($passwd==$passwdconf){
			$verifemail=$prenom.'.'.$nom;
			//vérifie que l'email est bien de la forme prenom.nom@etu.umontpellier.Fr
			if(pregmatch("#".$verifmail."([0]?)([0-9]?)#"){		
			
			
		
		//On crypte le mot de passe avec un "grain de sel"
                $password = crypt($password,$keyCryptage);
                $id=existeEtudiant($email, $passwd, $clefPromo);
                $id=(int)$id;
				//On vérifie que l'étudiant n'est pas déjà dans la base de données 
				
				if(!$id<0){
					//on transforme le mail sous la forme prenom.nom@etu.umontpellier.Fr
					$mail=$email."@etu.umontpellier.Fr"
					//on récupère l'id de la promo correspondant au code promo 
					$idPromo=getID($clefPromo);
					
					if(!testerMail($idPromo,$mail)){
					ajoutEtudiant($idPromo,$mail,$nom,$prenom,$mdp);
					
					
					}
					}
				
					
					
				} else{ 
					echo 'ERREUR : un compte pour cet étudiant existe déjà'; }
					
		    } else { 
				echo 'ERREUR : l email n a pas la forme prenom.nom@etu.umontpellier.Fr';}
		}  else {
				echo 'ERREUR : les deux mots de passe ne correspondent pas';}
		
	} else {
		echo 'ERREUR : un des champs est vide';}
	 
	 
	 
 }
 else{ 
	echo 'ERREUR : tu es déjà connecté'; }




?>