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
	 * But: On vérifie que le code promo n'est pas vide
	 */
	 res=true;
	 if(!document.getElementById("codePromo").value!=""){
		 alert("Vous ne pouvez pas rentrer un code promo vide");
		 res=false;
	 }
	 return res;
}
