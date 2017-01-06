<?php

require_once('../model/Proposition.php');


function calculResultat($array_choice1,$array_choice2,$array_choice3){

  // Tableau regroupant tous les tableaux
  $array_choice=[$array_choice1,$array_choice2,$array_choice3];
  $result=[0,0,0,0,0,0]; // On stocke dans ce tableau les différents score de chaque fiche (initialisée à 0).

  //Double boucle pour parcourir tout le tableau $array_choice et ainsi permettre le calcul des résultats RIASEC
  for($j=0;$j<3;$j++){
    // Si j==0 c'est la proposition la plus importante donc elle vaut 3 points. Si j==1, la proposition vaut 2 points et si j==2, la proposition vaut 1 point.
    $val= 3 - $j;

    for($i=0;$i<=11;$i++){
      // On récupère l'id de la Fiche pour savoir à quelle case du tableau on va devoir ajouter les points
      $idFiche=getFicheAssociee($array_choice[$j][$i]);
      $result[$idFiche-1]= $result[$idFiche-1] + $val;
    }
  }

    //On fait passer chaque score en pourcentage
    for ($i=0;$i<6;$i++){
      $result[$i]= ($result[$i]/72)*100;
    }

  return $result;
}

function calculResultatPromo($idPromo){
  // On récupère tous les choix de la promo de l'élève
  $choixPromo=getAllChoixPromo($idPromo);
  $resultPromo=[0,0,0,0,0,0];

  // Une ligne correspond au choix1, choix2 et choix3. On calcule dans quelle fiche la proposition fait partie et on lui donne 3/2/1 points selon si c'est le premier, deuxième ou troisième choix respectivement
  foreach ($choixPromo as $promo) {

    $idFiche=getFicheAssociee($promo['choix1']);
    $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 3;

    $idFiche=getFicheAssociee($promo['choix2']);
    $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 2;

    $idFiche=getFicheAssociee($promo['choix3']);
    $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 1;
  }
  // i stocke le nombre de test effectué dans une promo
  $i=getNbTestEffectue($idPromo);

  //On fait passer chaque score en pourcentage
  for ($j=0;$j<6;$j++){
    $resultPromo[$j]= ($resultPromo[$j]/72)*100;
  // On fait la moyenne des pourcentages pour avoir le résultat de la promo.
    $resultPromo[$j]=$resultPromo[$j]/$i;
  }

  return $resultPromo;

}
