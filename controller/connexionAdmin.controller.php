<?php

    //Si un utilisateur n'est pas connecté
    if (!isset($_COOKIE["token"])){
      include('../view/connexionAdmin.php');
    }
    else{
      include('redirection.php');
    }
  ?>
