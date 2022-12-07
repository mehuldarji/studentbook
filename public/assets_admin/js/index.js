(function($) {
    "use strict";

	//line chart
    var ctx = document.getElementById( "lineChart" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "Jun","Jul","Aug","Sep","Oct","Nov","Dec" ],
            datasets: [
                {
                    label: "Earnings",
                    borderColor: "rgb(191, 105, 226,0.9)",
                    borderWidth: "3",
                    backgroundColor: "rgb(191, 105, 226,0.2)",
                    data: [ 10, 60, 30, 90, 120, 76, 35]
                }]
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: false
            },
			legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#77778e",

					 },
					display: true,
					gridLines: {
						display: true,
						color: 'rgba(119, 119, 142, 0.2)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'Month',
						fontColor: 'rgba(0,0,0,0.8)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#77778e",
					 },
					display: true,
					gridLines: {
						display: true,
						color: 'rgba(119, 119, 142, 0.2)',
						drawBorder: false
					},
					scaleLabel: {
						display: false,
						labelString: 'sales',
						fontColor: 'rgba(0,0,0,0.81)'
					}
				}]
			},

        }
    });

})(jQuery);

