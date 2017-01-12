window.onload = function() {

  //récupère les valeurs des deux promos à partir de la page php

  var rDepart = document.getElementById("rDepart").value;
  var iDepart = document.getElementById("iDepart").value;
  var aDepart = document.getElementById("aDepart").value;
  var sDepart = document.getElementById("sDepart").value;
  var eDepart = document.getElementById("eDepart").value;
  var cDepart = document.getElementById("cDepart").value;


Chart.defaults.global.defaultFontColor = '#000000';
Chart.defaults.global.defaultFontSize= 20;
var config = {
    type: 'pie',
pointDot: false,
pointLabelFontSize: 40,

    data: {
        datasets: [{
            data: [
                rDepart,
                iDepart,
                aDepart,
                sDepart,
                eDepart,
                cDepart

            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                "#8D47F5",
                window.chartColors.green,
                "#01BFF5",
      "#F0F501",
            ],
    hoverBackgroundColor: [
            "#36436F",
            "#36436F",
            "#36436F",
    "#36436F",
            "#36436F",
            "#36436F"
        ],
            label: 'IG2019'
        }],
        labels: [
            "Realiste",
            "Investigatif",
            "Artistique",
            "Social",
            "Entrepreneur",
            "Conventionnel"
        ]
    },
    options: {
        responsive: true
    },
animation:{
  animateRotate:true
}

    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx, config);
}
};
