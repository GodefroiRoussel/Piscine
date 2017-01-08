function afficherRecherche(){
	/*
	 * But : Afficher les champs pour faire la recherche et mettre la bonne valeur dans le champ 
	 */
	var listeRecherche=document.getElementById("listeRecherche");
	if(!(listeRecherche.options[listeRecherche.selectedIndex].text=="Rechercher selon...")){
		document.getElementById("newRecherche").style.display="inline";
		document.getElementById("typeRecherche").value=listeRecherche.options[listeRecherche.selectedIndex].text;
		return true;
	}
	else{
		document.getElementById("newRecherche").style.display="none";
		return false;
	}
}

function valeurSelectionee(){
	/*
	 * But : Renvoyer la valeur séléctionnée par la liste déroulante
	*/

	var listeRecherche=document.getElementById("listeRecherche");
	var texteSelectionnee=listeRecherche.options[listeRecherche.selectedIndex].text;
	return texteSelectionnee;
}

function verifRecherche(){
	//var texte=valeurSelectionee();
	//document.getElementById("info").value="bonjour";
	return true;
}