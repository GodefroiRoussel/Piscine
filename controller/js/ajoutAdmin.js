function informationsCorrecte(){
	/*
	But : Vérifie si les champs email et passwd ne sont pas vides
	*/
	if(document.getElementById(email).value()==''){
		alert("Email non renseigné");
	}
	if(document.getElementById(passwd).value()==''){
		alert("Mot de passe non renseigné");
	}
}
