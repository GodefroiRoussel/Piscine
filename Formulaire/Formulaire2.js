
		var tabRes1 = [0,0,0,0,0,0] // Ce tableau va stocker l'id de la proposition du choix numéro 1
		var tabRes2 = [0,0,0,0,0,0] // Ce tableau va stocker l'id de la proposition du choix numéro 2
		var tabRes3 = [0,0,0,0,0,0] // Ce tableau va stocker l'id de la proposition du choix numéro 3
		var tabRes = [tabRes1,tabRes2,tabRes3];
		var new_tab_js = tableau_js.join(";");
		document.location.href = 'newpage.php?tab_js='+new_tab_js;


		var r=0;
		var i=0;
		var a=0;
		var s=0;
		var e=0;
		var c=0;
		function remove1(lettre, idProp, grp) {
			if(document.getElementById(letre+1).checked){
				tabRes1[grp]=idProp;
				if(document.getElementById(lettre+2).checked){
					document.getElementById(lettre+2).checked = false;
					tabRes2[grp]=0;

				}else if(document.getElementById(lettre+3).checked){
					document.getElementById(lettre+3).checked = false;
					tabRes3[grp]=0;
				}


			}
		}

		function remove2(lettre, idProp, grp) {
			if(document.getElementById(lettre+2).checked){
				tabRes2[grp]=idProp;
				if(document.getElementById(lettre+1).checked){
					document.getElementById(lettre+1).checked = false;
					tabRes1[grp]=0;
				}else if(document.getElementById(lettre+3).checked){
					document.getElementById(lettre+3).checked = false;
					tabRes3[grp]=0;
				}


			}
		}

		function remove3(lettre, idProp, grp) {
			if(document.getElementById(lettre+3).checked){
				tabRes3[grp]=idProp;
				if(document.getElementById(lettre+1).checked){
					document.getElementById(lettre+1).checked = false;
					tabRes1[grp]=0;

				}else if(document.getElementById(lettre+2).checked){
					document.getElementById(lettre+2).checked = false;
					tabRes2[grp]=0;
				}//end elseif
			}//endif
		}//end remove3


		function affichage(){
			alert("Coucou je veux passer au suivant");
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
