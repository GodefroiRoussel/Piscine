function informationsCorrecte(){
	/*
	But : Vérifie si les champs email et passwd ne sont pas vides
	*/
	res=true;
	if(document.getElementById(email).value()==""){
		alert("Email non renseigné");
		res= false;
	}
	if(document.getElementById(passwd).value()==""){
		alert("Mot de passe non renseigné");
		res=false;
	}
	return res;
}
