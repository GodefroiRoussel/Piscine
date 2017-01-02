<?php
// Je me connecte à la base de données

        require("../model/ConnexionBD.php");
        // Suppression du cookie user// Set expiration time to -1hr (will cause browser deletion)
		 setcookie('token', '', time()-10000000, '/');
		// Unset key
		unset($_COOKIE["token"]);
		header('Location:../index.php');
