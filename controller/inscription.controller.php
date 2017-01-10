<?php

//On vérifie que l'utilisateur n'est pas déjà connecté
if(!isset($_COOKIE["token"])){
  include('../view/inscriptionEtudiant.php');
}
else{
  header('Location:redirection.php');
}

?>
