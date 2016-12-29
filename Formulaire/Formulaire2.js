
		var i=0;
		var res1 = 0; // Ce tableau va stocker l'id de la proposition du choix numéro 1
		var res2 = 0; // Ce tableau va stocker l'id de la proposition du choix numéro 2
		var res3 = 0; // Ce tableau va stocker l'id de la proposition du choix numéro 3


		/*while (i<12){
			tabRes1[i]='<?php echo $res1[i]?>';
			tabRes2[i]='<?php echo $res2[i]?>';
			tabRes3[i]='<?php echo $res3[i]?>';
			i++;
		}*/


		var r=0;
		var i=0;
		var a=0;
		var s=0;
		var e=0;
		var c=0;
		function remove1(lettre, idProp) {
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
			var virgule= ",";
			return chaine1+virgule+chaine2;
		}

		function suivant(grp,tab1,tab2,tab3){
			choix1= ajoutVirgule(tab1,res1);
			choix2= ajoutVirgule(tab2,res2);
			choix3= ajoutVirgule(tab3,res3);
			var groupe=grp+1;
			document.location.href = "http://localhost/Piscine/controller/formulaire.controller.php?res1="+choix1+"&res2="+choix2+"&res3="+choix3+"&groupe="+groupe;
		}

		function precedent(grp,tab1,tab2,tab3){
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
			choix1= ajoutVirgule(tab1,res1);
			choix2= ajoutVirgule(tab2,res2);
			choix3= ajoutVirgule(tab3,res3);
			document.location.href = "http://localhost/Piscine/controller/resultat.controller.php?res1="+choix1+"&res2="+choix2+"&res3="+choix3;
		}


		/*function calcul(){

			for (var j = 0; j < 9; j++){
				if(tabval[j]==0){
					alert("Il manque des réponses.Rappel: Une case cochée par colonne, 3 réponses par groupe");
					return false;
				}
				else if(tabtype[j]=='R'){
					r=r+tabval[j];
				}
				else if(tabtype[j]=='I'){
					i=i+tabval[j];
				}
				else if(tabtype[j]=='A'){
					a=a+tabval[j];
				}
				else if(tabtype[j]=='S'){
					s=s+tabval[j];
				}
				else if(tabtype[j]=='E'){
					e=e+tabval[j];
				}
				else{
					c=c+tabval[j];
				}
			}
			document.getElementById("MaDiv").innerHTML = 'r='+r;
			document.getElementById("MaDiv2").innerHTML = 'i='+i;
			document.getElementById("MaDiv3").innerHTML = 'a='+a;
			document.getElementById("MaDiv4").innerHTML = 's='+s;
			document.getElementById("MaDiv5").innerHTML = 'e='+e;
			document.getElementById("MaDiv6").innerHTML = 'c='+c;
			console.log(r,i,a,s,e,c);
			/* r=0;
			i=0;
			a=0;
			s=0;
			e=0;
			c=0;

			window.location.href="file:///C:/Users/Chlo%C3%A9/Desktop/Formulaire/Resultat/GraphiqueEtoile/ProjetPiscine.html";
		}*/


var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var color = Chart.helpers.color;
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
    };
