<?php

# Fichier regroupant les différentes fonctions de calcul utilisé.

require_once('../model/Proposition.php');

/**
 * Pre: Prends 3 tableaux de 12 entiers différents de 0
 * Post: Retourne un tableau de 6 floats contenant les résultats par rapport aux choix effectués.
 */
function calculResultat($array_choice1,$array_choice2,$array_choice3){

  // Tableau regroupant tous les tableaux
  $array_choice=[$array_choice1,$array_choice2,$array_choice3];
  $result=[0,0,0,0,0,0]; // On stocke dans ce tableau les différents score de chaque fiche (initialisée à 0).

  //Double boucle pour parcourir tout le tableau $array_choice et ainsi permettre le calcul des résultats du test RIASEC
  for($j=0;$j<3;$j++){
    // Si j==0 c'est la proposition la plus importante donc elle vaut 3 points. Si j==1, la proposition vaut 2 points et si j==2, la proposition vaut 1 point.
    $val= 3 - $j;

    for($i=0;$i<=11;$i++){
      // On récupère l'id de la fiche asssociée à une proposition pour savoir à quelle case du tableau on va devoir ajouter les points. (On fait -1 car idFiche commence à 1 et un tableau commence à 0)
      $idFiche=getFicheAssociee($array_choice[$j][$i]);
      $result[$idFiche-1]= $result[$idFiche-1] + $val;
    }
  }

    //On fait passer chaque score en pourcentage et on fait un arrondi à 2 chiffres après la virgule.
    for ($i=0;$i<6;$i++){
      $result[$i]= round(($result[$i]/72)*100,2);
    }

  return $result;
}

/**
 * Pre: $idPromo > 0 et existe dans la base de données.
 * Post: Retourne un tableau de 6 floats contenant la moyenne des résultats de la promotion. Si la promotion n'a pas effectué de test, renvoie un tableau contenant que des 0.
 */
function calculResultatPromo($idPromo){

  // On récupère tous les choix de la promo de l'élève
  $choixPromo=getAllChoixPromo($idPromo);
  $resultPromo=[0,0,0,0,0,0];

  // i stocke le nombre de test effectué dans une promo
  $i=getNbTestEffectue($idPromo);
  // Si il n'y a pas de test effectué alors nous n'avons pas de résultat
  if($i!=0){
    // Une ligne correspond au choix1, choix2 et choix3. On calcule dans quelle fiche la proposition fait partie et on lui donne 3/2/1 points selon si c'est le premier, deuxième ou troisième choix respectivement
    foreach ($choixPromo as $promo) {
      // On récupère l'id de la fiche asssociée à une proposition pour savoir à quelle case du tableau on va devoir ajouter les points. (On fait -1 car idFiche commence à 1 et un tableau commence à 0)
      $idFiche=getFicheAssociee($promo['choix1']);
      $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 3;

      $idFiche=getFicheAssociee($promo['choix2']);
      $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 2;

      $idFiche=getFicheAssociee($promo['choix3']);
      $resultPromo[$idFiche-1]= $resultPromo[$idFiche-1] + 1;
    }

    //On fait passer chaque score en pourcentage et on fait la moyenne pour avoir le résultat de la promo. On arrondit à 2 chiffres après la virgule.
    for ($j=0;$j<6;$j++){
      $resultPromo[$j]= ($resultPromo[$j]/72)*100;
      $resultPromo[$j]=round($resultPromo[$j]/$i,2);
    }
  }

  return $resultPromo;
}

/**
 * Pre: Prend un tableau de 6 floats > 0
 * Post: Retourne l'id de la fiche correspondant au score le plus haut du tableau passé en paramètre.
 */
function getIdFicheByResult($result){

  // On récupère la position du tableau où le résultat est le plus grand
  $idFiche=0;
  for ($i=1;$i<6;$i++){
    if($result[$idFiche]<$result[$i]){
      $idFiche=$i;
    }
  }
  // On ajoute 1 à l'id de la fiche pour récupérer le bon id de fiche (car la position initial du tableau correspond à 0 et il n'existe pas d'idFiche=0)
  return $idFiche+1;
}
/**
 * Pre: $idDep > 0 et $idDep correspond à un département dans la base de données.
 * Post: Renvoie un tableau avec le nombre d'étudiant correspondant à chaque catégorie.
 */
function calculResultatDepartement($idDep){

  // Tableau de résultats
  $resultat=[0,0,0,0,0,0];
  // On récupère toutes les promos de ce département
  $promos=getAllPromoByDepartement($idDep);
  foreach ($promos as $promo) {
    // On récupère tous les élèves de cette promo
    $etudiants=getAllEtudiantAyantTest($promo['id']);
    foreach ($etudiants as $etudiant){
      // On charge les choix de l'étudiant qui sont dans la base de données
      $choice_tab=getAllChoix($etudiant['id']); //C'est un tableau de tableau
      //On le fait passer en trois tableaux
      for ($i=0;$i<12;$i++){
        $array_choice1[$i]=$choice_tab[$i][0];
        $array_choice2[$i]=$choice_tab[$i][1];
        $array_choice3[$i]=$choice_tab[$i][2];
      }
      // On calcule les résultats de l'élève, on récupère son profil grâce à l'id de sa fiche et on l'ajoute au résultat du département.
      $result=calculResultat($array_choice1,$array_choice2,$array_choice3);
      $idFiche=getIdFicheByResult($result);
      $resultat[$idFiche-1]+=1;

    }
  }

  return $resultat;
}
