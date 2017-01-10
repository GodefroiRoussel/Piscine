
<?php

    //Si un utilisateur n'est pas connecté
    if (isset($_COOKIE["token"])){
      include('../view/inscriptionEtudiant.php');
    }
    else{
      include('acceuil.php');
    }
  ?>


