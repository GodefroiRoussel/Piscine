<?php

  function verificationToken($decoded_array){
    $roles= array("etudiant", "admin");
    $bool=false;
    if ($decoded_array['iss']==$_SERVER['HTTP_HOST'] && $decoded_array['exp'] > time() && $decoded_array['id']>0 && in_array($decoded_array['role'],$roles)){
      $bool=true;
    }
    return $bool;
  }

?>
