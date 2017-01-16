function afficherRecherche(){
	/*
	 * But : Afficher les champs pour faire la recherche et mettre la bonne valeur dans le champ 
	 */
	var listeRecherche=document.getElementById("listeRecherche");
	 //on stocke le type de recherche dans le input 
  	document.getElementById("typeRecherche").value=listeRecherche.options[listeRecherche.selectedIndex].value; 
  	if(listeRecherche.options[listeRecherche.selectedIndex].value=="default"){ 
    	document.getElementById("newRecherche").style.display="none"; 
	}
	else if(listeRecherche.options[listeRecherche.selectedIndex].value=='sansTri'){ 		
		document.getElementById("newRecherche").style.display="none";
		//on redirige vers la page pour réinitialiser le tri
		var refPromo=document.getElementById("refPromo").value;
		window.location="gererPromo.controller.php?refPromo="+refPromo;
  	} 
  	else{
  		//on rend visible le champ de recherche
    	document.getElementById("newRecherche").style.display="inline"; 
    }
}
