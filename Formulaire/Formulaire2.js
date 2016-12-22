
		var tabtype= [0,0,0,0,0,0,0,0,0] // Remplacer les deux tableau base de données?
		var tabval = [0,0,0,0,0,0,0,0,0]
		var r=0;
		var i=0;
		var a=0;
		var s=0;
		var e=0;
		var c=0;
		function remove1(id, type, grp) {
			if(document.getElementById(id+1).checked){
				tabtype[(grp-1)*3]=type;
				tabval[(grp-1)*3]=3;
/* 				alert(tabtype[0]);
				alert(tabval[0]); */
				if(document.getElementById(id+2).checked){
					document.getElementById(id+2).checked = false;
					
				}else if(document.getElementById(id+3).checked){
					document.getElementById(id+3).checked = false;
					
				}


			}
		}
		function remove2(id, type, grp) {
			if(document.getElementById(id+2).checked){ 
				tabtype[(grp-1)*3+1]=type;
				tabval[(grp-1)*3+1]=2;
				if(document.getElementById(id+1).checked){
					document.getElementById(id+1).checked = false;
				}else if(document.getElementById(id+3).checked){
					document.getElementById(id+3).checked = false;
				}

			
			}
		}
		function remove3(id, type, grp) {
			if(document.getElementById(id+3).checked){ 
				tabtype[(grp-1)*3+2]=type;
				tabval[(grp-1)*3+2]=1;
				if(document.getElementById(id+1).checked){
					document.getElementById(id+1).checked = false;
					
				}else if(document.getElementById(id+2).checked){
					document.getElementById(id+2).checked = false;
					
				}
				
			}
			
			
		}
		
		function calcul(){
			
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
			c=0; */
			
			window.location.href="file:///C:/Users/Chlo%C3%A9/Desktop/Formulaire/Resultat/GraphiqueEtoile/ProjetPiscine.html";
		}
		
		
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
