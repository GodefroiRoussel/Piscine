function afficherRecherche(){
	/*
	 * But : Afficher les champs pour faire la recherche et mettre la bonne valeur dans le champ 
	 */
	var listeRecherche=document.getElementById("listeRecherche");
	if(!(listeRecherche.options[listeRecherche.selectedIndex].value=="default")){
		var typeRecherche=document.getElementById("typeRecherche").value;
		var texteRecherche=document.getElementById("contenuRecherche").value;
		if(listeRecherche.options[listeRecherche.selectedIndex].value==typeRecherche){
			document.getElementById("oldRecherche").style.display="inline";
		}
		else{
			document.getElementById("oldRecherche").style.display="none";
			document.getElementById("newRecherche").style.display="inline";
		}
		document.getElementById("typeRecherche").value=listeRecherche.options[listeRecherche.selectedIndex].value;
	}
	else{
		document.getElementById("newRecherche").style.display="none";
		document.getElementById("oldRecherche").style.display="none";
		document.getElementById("typeRecherche").value=listeRecherche.options[listeRecherche.selectedIndex].value;
	}
	return true;
}
