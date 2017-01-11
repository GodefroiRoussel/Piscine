function afficherRecherche(){
	/*
	 * But : Afficher les champs pour faire la recherche et mettre la bonne valeur dans le champ 
	 */
	var listeRecherche=document.getElementById("listeRecherche");
	if(!(listeRecherche.options[listeRecherche.selectedIndex].value=="default")){
		document.getElementById("newRecherche").style.display="inline";
	}
	else{
		document.getElementById("newRecherche").style.display="none";
	}
	//on stocke le type de recherche dans le input
	document.getElementById("typeRecherche").value=listeRecherche.options[listeRecherche.selectedIndex].value;
	return true;
}
