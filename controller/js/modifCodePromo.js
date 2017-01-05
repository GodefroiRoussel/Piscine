function afficher(){
	/*
	 * But : Afficher les champs pour changer le code promo
	 */

	document.getElementById("new").style.display="inline";
	document.getElementById("modifier").style.visibility="hidden";
	//document.getElementById("refPromo").style.visibility="hidden";

	return true;
}

function verifCodePromo(){
	/*
	 * But: vérifier que le code promo est unique
	 */
	 return document.getElementById("codePromo").value;
}

function envoyer(){
	return verifCodePromo();
}