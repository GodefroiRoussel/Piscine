var color = Chart.helpers.color;





window.onload = function() {
  var rEleve = document.getElementById("rEleve").value;
  var iEleve = document.getElementById("iEleve").value;
  var aEleve = document.getElementById("aEleve").value;
  var sEleve = document.getElementById("sEleve").value;
  var eEleve = document.getElementById("eEleve").value;
  var cEleve = document.getElementById("cEleve").value;

  var rPromo = document.getElementById("rPromo").value;
  var iPromo = document.getElementById("iPromo").value;
  var aPromo = document.getElementById("aPromo").value;
  var sPromo = document.getElementById("sPromo").value;
  var ePromo = document.getElementById("ePromo").value;
  var cPromo = document.getElementById("cPromo").value;

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
              data: [rEleve, iEleve, aEleve, sEleve, eEleve, cEleve]
          },{
              label: "Moyenne Classe",
              borderColor: window.chartColors.grey,
              backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
              pointBackgroundColor: window.chartColors.blue,
      pointLabelFontSize: 20,
              data: [rPromo, iPromo, aPromo, sPromo, ePromo, cPromo]
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
    window.myRadar = new Chart(document.getElementById("canvas"), monRadar);
};
