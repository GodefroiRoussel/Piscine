
		var i=0;
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

		function ajoutVirgule(chaine1,chaine2){
			/*
			 * Données: chaine1 : String
			 * 					chaine2 : String
			 * Résultat: Retourne une chaine de caractères. On concaténe les deux String en ajoutant une virgule entre eux.
			 */
			var virgule= ",";
			return chaine1+virgule+chaine2;
		}

		function suivant(grp,tab1,tab2,tab3){
			/*
			 * Données: grp : int
			 * 					tab1 : String
			 * 					tab2 : String
			 * 					tab3 : String
			 * But: Envoie à la prochaine page les données choisies par l'utilisateur dans le questionnaire. En se souvenant des anciennes valeurs déjà envoyés.
			 */
			if (calcul()){
 				alert("Il manque des réponses. Rappel: Une case cochée par colonne, 3 réponses par groupe");
 			}
 			else{
			choix1= ajoutVirgule(tab1,res1);
			choix2= ajoutVirgule(tab2,res2);
			choix3= ajoutVirgule(tab3,res3);
			var groupe=grp+1;
			document.location.href = "http://localhost/Piscine/controller/formulaire.controller.php?res1="+choix1+"&res2="+choix2+"&res3="+choix3+"&groupe="+groupe;
			}
		}

		function precedent(grp,tab1,tab2,tab3){
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

		function resultat(grp,tab1,tab2,tab3){
			/*
			 * Données: grp : int
			 * 					tab1 : String
			 * 					tab2 : String
			 * 					tab3 : String
			 * But: Envoie à la page de résultat les données choisies par l'utilisateur depuis le début du questionnaire.
			 */
			if (calcul()){
				alert("Il manque des réponses. Rappel: Une case cochée par colonne, 3 réponses par groupe");
			}
			else{
				choix1= ajoutVirgule(tab1,res1);
				choix2= ajoutVirgule(tab2,res2);
				choix3= ajoutVirgule(tab3,res3);
				document.location.href = "http://localhost/Piscine/controller/resultat.controller.php?res1="+choix1+"&res2="+choix2+"&res3="+choix3;
			}
		}


		function calcul(){

				return res1==0 || res2==0 || res3==0;

			}

/*
			window.location.href="file:///C:/Users/Chlo%C3%A9/Desktop/Formulaire/Resultat/GraphiqueEtoile/ProjetPiscine.html";
		}*/


var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    /*var color = Chart.helpers.color;
    var monRadar = {
        type: 'radar',
        data: {
            labels: ["Realiste", "Investigatif", "Artistique", "Social", "Entrepreneur", "Conventionnel"],
            datasets: [{
                label: "Resultat eleve",
                borderColor: window.chartColors.red,
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                pointBackgroundColor: window.chartColors.red,
				pointLabelFontSize: 40,
                data: [20, 10, 5, 30, 15, 10]
            },{
                label: "Moyenne Classe",
                borderColor: window.chartColors.grey,
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                pointBackgroundColor: window.chartColors.red,
				pointLabelFontSize: 20,
                data: [20, 20, 20, 20, 20, 20]
            }]
        },
        options: {
			pointLabelFontSize : 30,
			legend: {
            display: true,
            labels: {
                fontSize: 20,
				pointLabelFontSize: 40
            }
			},
            title:{
                display:true,
				fontSize: 40,
                text:"Diagramme en etoile"
            },
            elements: {
                line: {
                    tension: 0.0,


                }

            },
            scale: {
                beginAtZero: true,
				fontSize: 40
            }

        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), monRadar);
    };*/
