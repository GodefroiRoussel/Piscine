function confirmMessageEtudiantTri(){
	/*
	 * But: Afficher une fenêtre pour confirmer la suppréssion
	 */

	if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant ?")) { // Clic sur OK
 		//window.location='gererPromo.controller.php?refPromo='+idPromo+'&refEtuSupp='+idEtu+'&tri='+tri
		return True;
	}
	else{
		return False
	}
}


function confirmMessageEtudiant(){
	/*
	 * But: Afficher une fenêtre pour confirmer la suppréssion
	 */

	if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant ?")) { // Clic sur OK
 		//window.location='gererPromo.controller.php?refPromo='+idPromo+'&refEtuSupp='+idEtu
		return True;
	}
	else{
		return False;
	}
}


//Juste pour garder en mémoire ce qu'il y avait avant ces fonctions
//href="../controller/modifEtudiant.controller.php?refPromo=<?php echo $id?>&refEtuMod=<?php echo $etudiant['id']?>"
//href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>&tri=<?php echo $tri ?>"
//href="../controller/gererPromo.controller.php?refPromo=<?php echo $id ?>&refEtuSupp=<?php echo $etudiant['id']?>"