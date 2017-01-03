		var res1 = 0; // Cette variable va stocker l'id de la proposition du choix numéro 1
		var res2 = 0; // Cette variable va stocker l'id de la proposition du choix numéro 2
		var res3 = 0; // Cette variable va stocker l'id de la proposition du choix numéro 3


		function remove1(lettre, idProp) {
		/*
		 * Données: lettre : String
		 * 					idProp : int
		 * But: Cette fonction mémorise quelle proposition a été cochée et décoche/réinitialise
		 *			la proposition cochée si celle ci se trouve sur la même ligne
		 */
			if(document.getElementById(lettre+1).checked){
				res1=idProp;
				if(document.getElementById(lettre+2).checked){
					document.getElementById(lettre+2).checked = false;
					res2=0;

				}else if(document.getElementById(lettre+3).checked){
					document.getElementById(lettre+3).checked = false;
					res3=0;
				}
			}
		}

		function remove2(lettre, idProp) {
			/*
			 * Données: lettre : String
			 * 					idProp : int
			 * But: Cette fonction mémorise quelle proposition a été cochée et décoche/réinitialise
			 *			la proposition cochée si celle ci se trouve sur la même ligne
			 */
			if(document.getElementById(lettre+2).checked){
				res2=idProp;
				if(document.getElementById(lettre+1).checked){
					document.getElementById(lettre+1).checked = false;
					res1=0;
				}else if(document.getElementById(lettre+3).checked){
					document.getElementById(lettre+3).checked = false;
					res3=0;
				}
			}
		}

		function remove3(lettre, idProp) {
			/*
			 * Données: lettre : String
			 * 					idProp : int
			 * But: Cette fonction mémorise quelle proposition a été cochée et décoche/réinitialise
			 *			la proposition cochée si celle ci se trouve sur la même ligne
			 */
			if(document.getElementById(lettre+3).checked){
				res3=idProp;
				if(document.getElementById(lettre+1).checked){
					document.getElementById(lettre+1).checked = false;
					res1=0;
				}else if(document.getElementById(lettre+2).checked){
					document.getElementById(lettre+2).checked = false;
					res2=0;
				}//end elseif
			}//endif
		}//end remove3

		function suivant(){
			/*
			 * Données: grp : int
			 * 					tab1 : String
			 * 					tab2 : String
			 * 					tab3 : String
			 * But: Envoie à la prochaine page les données choisies par l'utilisateur dans le questionnaire. En se souvenant des anciennes valeurs déjà envoyés.
			 */

			if (!allCasesCochees()){
 				alert("Il manque des réponses. Rappel: Une case cochée par colonne, 3 réponses par groupe");
				return false;
 			}
			else{
				return true;
			}

		}

		// onsubmit:function()

		function precedent(grp){
			/*
			 * Données: grp : int
			 * 					tab1 : String
			 * 					tab2 : String
			 * 					tab3 : String
			 * But: Renvoie la page précédente. C'est-à-dire que les informations précédemment envoyés sont oubliés et on affiche l'ancien groupe de questions.
			 */
			var pos = tab1.lastIndexOf(',');
			choix1= tab1.slice(0,pos);
			pos = tab2.lastIndexOf(',');
			choix2= tab2.slice(0,pos);
			pos = tab3.lastIndexOf(',');
			choix3= tab3.slice(0,pos);
			var groupe=grp-1;
			document.location.href = "http://localhost/Piscine/controller/formulaire.controller.php?res1="+choix1+"&res2="+choix2+"&res3="+choix3+"&groupe="+groupe;
		}


		function allCasesCochees(){

				return res1!=0 && res2!=0 && res3!=0;

			}
