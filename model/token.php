<?php

  function verificationToken($decoded_array){
    /*
     *Fonction prenant un token déjà décodé en paramètre.
     *Résultat: Renvoie true si le token est bien construit (c'est à dire qu'il correspond bien à celui de notre site, que le token n'est pas encore expiré, que l'id est supérieur à 0, et que le rôle soit un etudiant ou admin).
     *Commentaire: On utilise des JWT (Json Web Token) couplé à un cryptage HS256. Ce qui fait que si l'on modifie un cookie manuellement (dans le but d'hacker l'application), il serait très difficile d'avoir à
     *             à nouveau un token valide sans connaître la clé secrète de chiffrement et les paramètres nécessaire à la création du token.
     */
    $roles= array("etudiant", "admin");
    return $decoded_array['iss']==$_SERVER['HTTP_HOST'] && $decoded_array['exp'] > time() && $decoded_array['id']>0 && in_array($decoded_array['role'],$roles);
  }

?>
