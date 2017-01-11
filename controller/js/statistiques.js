

window.onload = function() {
	
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
  
  
   
        var color = Chart.helpers.color;
		Chart.defaults.global.defaultFontColor = '#000000';
		Chart.defaults.global.defaultFontSize= 15;
        var barChartData = {
			options : {
				scaleBeginAtZero: false
			},
			
            labels: ["IG2015", "IG2016"],//echo nom promo
            datasets: [{
                label: 'Realiste',
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

		window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
									}
								}]
					},
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ''
                    }
                }
            });

        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            barChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });

            });
            window.myBar.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: []
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (barChartData.datasets.length > 0) {
                var month = PROMO[barChartData.labels.length % MONTHS.length];
                barChartData.labels.push(month);

                for (var index = 0; index < barChartData.datasets.length; ++index) {
                    //window.myBar.addData(randomScalingFactor(), index);
                    barChartData.datasets[index].data.push(randomScalingFactor());
                }

                window.myBar.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            barChartData.datasets.splice(0, 1);
            window.myBar.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            barChartData.labels.splice(-1, 1); // remove the label first

            barChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myBar.update();
        });
}