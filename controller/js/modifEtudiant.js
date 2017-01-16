function informationsCorrectes(){
	/*
	But : Vérifie si les champs email, passwd, non, prénom et code promo ne sont pas vides
	*/
	res=true;
	if(document.getElementById('email').value==""){
		alert("Email non renseigné");
		res= false;
	}
	if(document.getElementById('prenom').value==""){
		alert("Prénom non renseigné");
		res= false;
	}
	if(document.getElementById('nom').value==""){
		alert("Nom non renseigné");
		res= false;
	}
	if(document.getElementById('codePromo').value==""){
		alert("Code promo non renseigné");
		res= false;
	}
	//Cas où on a appuyé sur le bouton pour modifier le mot de passe
	if(document.getElementById('new').style.display=="inline"){
		if(document.getElementById('passwd').value==""){
			alert("Mot de passe non renseigné");
			res=false;
		}
		if(!verifPassword()){
			alert("Erreur : Les deux mots de passes ne correspondent pas ou vous avez laissé ces champs vide, veuillez changer(ou remettre) votre mot de passe");
		}
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
	 * But: vérifier que le premier password correspond à celui dans la base de données. Et que le nouveau password correspond avec la confirmation
	 */
	 return document.getElementById("passwd").value===document.getElementById("futur").value && document.getElementById("passwd").value!=="";
}
