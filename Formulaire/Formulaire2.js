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
		
		function allCasesCochees(){

				return res1!=0 && res2!=0 && res3!=0;

			}
