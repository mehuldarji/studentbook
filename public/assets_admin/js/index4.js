(function($) {
    "use strict";

	/*---ChartJS ---*/
	var ctx = document.getElementById("chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			type: 'bar',
			datasets: [{
				label: "Sales",
				data: [10, 60, 30, 90, 120, 76, 35, 42, 63, 45, 55, 75],
				backgroundColor: '#8966f7',
				borderColor: '#8966f7',
				borderWidth: 0,
				pointStyle: 'circle',
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#8966f7',

			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#807b90',
				bodyFontColor: '#807b90',
				backgroundColor: '#fff',
				cornerRadius: 0,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
			scales: {
				xAxes: [{
					barPercentage: 0.2,
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
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	/*---ChartJS (#sales-chart) closed---*/


	//Team chart
    var ctx = document.getElementById( "team-chart" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "M", "T", "W", "TH", "F", "SA", "S" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ 40, 70, 30, 60, 72, 60, 70 ],
                label: "Top Rated Products",
                backgroundColor: 'rgb(137, 102, 247,0.05)',
                borderColor: 'rgba(137, 102, 247)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(137, 102, 247,0.5)',
            },
			{
				label: "Low Rated Products",
				data: [10, 10, 20, 49, 38, 24, 33],
				backgroundColor: 'rgb(191, 105, 226, 0.05)',
				borderColor: 'rgb(191, 105, 226)',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'rgb(191, 105, 226)',
			},]
        },

        options: {
            responsive: true,
			maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#807b90',
                bodyFontColor: '#807b90',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },

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
            title: {
                display: false,
            }
        }
	 } );


	 //bar chart
    var ctx = document.getElementById( "barChart" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "9am","11am","1pm","3pm","5pm","7pm", "9pm"],
            datasets: [
                {
                    label: "Product Views by Customers",
                    data: [ 125,245,362,542,325,125,425],
                    borderColor: "rgb(67, 215, 239,0.9)",
                    borderWidth: "3",
					pointRadius:"3",
					pointBorderColor: 'transparent',
					pointBackgroundColor: 'rgb(67, 215, 239,0.9)',
                    backgroundColor: "rgb(67, 215, 239,0.05)"
                },{
                    label: "Product Sales",
                    data: [ 25,45,162,342,225,325,225],
                    borderColor: "rgb(137, 102, 247,0.9)",
                    borderWidth: "3",
					pointRadius:"3",
					pointBorderColor: 'transparent',
					pointBackgroundColor: 'rgb(137, 102, 247,0.9)',
                    backgroundColor: "rgb(137, 102, 247,0.05)"
                }
				]
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
			barRoundness: 1,
			legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },

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
            }
        }
    } );

})(jQuery);

