function informationsCorrecte(){
	/*
	But : Vérifie si les champs email et passwd ne sont pas vides
	*/
	res=true;
	if(document.getElementById('email').value==""){
		alert("Email non renseigné");
		res= false;
	}
	if(document.getElementById('passwd').value==""){
		alert("Mot de passe non renseigné");
		res=false;
	}
	return res;
}

function afficher(){
	/*
	 * But : Afficher les champs pour changer son mot de passe
	 */

		document.getElementById("new").style.display="inline";
	  document.getElementById("modifier").style.visibility="hidden";

	  return true;
}

function verifPassword(){
	/*
	 * But: vérifier que le premier password corresponde à celui dans la base de données. Et que le nouveau password correspond avec la confirmation
	 */
	 return document.getElementById("passwd").value===document.getElementById("futur").value && document.getElementById("passwd").value!=="";
}

function envoyer(){
	res=true;
	if (document.getElementById("modifier").style.visibility=="hidden"){
		res=verifPassword();
		// Si le nouveau mot de passe et la confirmation ne sont pas les mêmes où sont nulles.
		if (!res){
			alert("Erreur : Les deux mots de passes ne correspondent pas ou vous avez laissé ces champs vide, veuillez changer(ou remettre) votre mot de passe");
		}
	}
	return res;
}
