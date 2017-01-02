<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<header>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
		</header>

		<?php
			  require_once('../vendor/autoload.php');
				require_once('../model/token.php');
			  use \Firebase\JWT\JWT;

				//Si un utilisateur n'est pas connecté
				if (!isset($_COOKIE["token"])){
		?>
				<h1>Bienvenue sur le test de Hollande</h1>
				<div>
					<a href="controller/connexionEtudiant.controller.php" class="btn btn-info">Etudiant</a>
				</div>
				<br />
				<div>
					<a href="connexionAdmin.php" class="btn btn-info">Admin</a>
				</div>
		<?php
		}

				else {

					//TODO: mettre dans un fichier .env
					$key = "ceSera1cLERiasEcP0UrP1Sc1nE";

					//On décode le token
		      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
		      $decoded_array = (array) $decoded;

		      //On vérifie que c'est un token valide
		      if (verificationToken($decoded_array)){
						//Si c'est un étudiant on le redirige sur la page pageEtudiant.php
						if ($decoded_array["role"]==="etudiant"){
							header(Location:"view/pageEtudiant.php");
						}//endif
						//Sinon on le redirige sur la page pageAdmin.php
						else{
							header(Location:"view/pageAdmin.php");
						}//endelse

					}//endif
					//Cookie incorrect, on supprime le cookie et on renvoie l'utilisateur sur la page d'accueil
					else{
						// Suppression du cookie user// Set expiration time to -1hr (will cause browser deletion)
						setcookie('token', '', time()-10000000, '/');
						// Unset key
						unset($_COOKIE["token"]);
					}

				}//endelse

	</body>
</html>
