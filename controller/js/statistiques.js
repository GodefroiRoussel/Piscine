

window.onload = function() {

  //récupère les valeurs des deux promos à partir de la page php
	var nomPromo1 = document.getElementById("nomPromo1").value;
	var nomPromo2 = document.getElementById("nomPromo2").value;

  var rPromo1 = document.getElementById("rPromo1").value;
  var iPromo1 = document.getElementById("iPromo1").value;
  var aPromo1 = document.getElementById("aPromo1").value;
  var sPromo1 = document.getElementById("sPromo1").value;
  var ePromo1 = document.getElementById("ePromo1").value;
  var cPromo1 = document.getElementById("cPromo1").value;

  var rPromo2 = document.getElementById("rPromo2").value;
  var iPromo2 = document.getElementById("iPromo2").value;
  var aPromo2 = document.getElementById("aPromo2").value;
  var sPromo2 = document.getElementById("sPromo2").value;
  var ePromo2 = document.getElementById("ePromo2").value;
  var cPromo2 = document.getElementById("cPromo2").value;


	//Définition des couleur du graphique
        var color = Chart.helpers.color;
		Chart.defaults.global.defaultFontColor = '#000000';
		Chart.defaults.global.defaultFontSize= 15;
        var barChartData = {
			options : {
				scaleBeginAtZero: false
			},

            labels: [nomPromo1, nomPromo2],//Affiche le nom des deux promos sélectionnées dans le graphique
            datasets: [{
                label: 'Realiste', // Les deux valeurs rpromo1 et rpromo2 seront représenteront l'aspect réaliste des deux promos
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    rPromo1,
                    rPromo2
                ]
            }, {
                label: 'Investigatif',
                backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
                borderColor: window.chartColors.orange,
                borderWidth: 1,
                data: [
                    iPromo1,
                    iPromo2
                ]
            },
			{
                label: 'Artistique',
                backgroundColor: color("#8D47F5").alpha(0.5).rgbString(),
                borderColor: "#8D47F5",
                borderWidth: 1,
                data: [
                    aPromo1,
                    aPromo2
                ]
            },
			{
                label: 'Social',
                backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: [
                    sPromo1,
                    sPromo2
                ]
            },
			{
                label: 'Entrepreneur',
                backgroundColor: color("#01BFF5").alpha(0.5).rgbString(),
                borderColor: "#01BFF5",
                borderWidth: 1,
                data: [
                    ePromo1,
                    ePromo2
                ]
            },
			{
                label: 'Conventionnel',
                backgroundColor: color("#F0F501").alpha(0.5).rgbString(),
                borderColor: "#F0F501",
                borderWidth: 1,
                data: [
                    cPromo1,
                    cPromo2
                ]
            }]

        };

	//	window.onload = function() { //
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true // L'échelle du côté des y commencent à 0
								}
							}]
					},
                    responsive: true, // Le graphique sera responsive
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: ''
                    }
                }
            });

        //};



}
