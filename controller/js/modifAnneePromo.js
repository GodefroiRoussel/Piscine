function afficherAnnee(){
	/*
	 * But : Afficher les champs pour changer le code promo
	 */

	document.getElementById("newAnnee").style.display="inline";
	document.getElementById("modifierAnnee").style.visibility="hidden";

	return true;
}

function verifAnneePromo(){
	/*
	 * But: On vérifie que l'année promo est valide
	 */
	 res=true;
	 var now = new Date();
	 if(document.getElementById("anneePromo").value=="" || document.getElementById("anneePromo").value.length!=4 || document.getElementById("anneePromo").value<0){
		 alert("Année rentrée non valide");
		 res=false;
	 }
	 return res;
}