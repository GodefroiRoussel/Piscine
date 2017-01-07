function verifPropositions(){
	/*
	 * But : Vérifie qu'aucune proposition n'est laissée vide
	 */

   res=true;
   if(document.getElementById("proposition1").value=="" || document.getElementById("proposition2").value=="" || document.getElementById("proposition3").value=="" || document.getElementById("proposition4").value=="" || document.getElementById("proposition5").value=="" || document.getElementById("proposition6").value=="" ){
		 alert("Vous ne pouvez pas rentrer une proposition vide");
		 res=false;
	 }


	 return res;

}

// Pour le moment inutile
