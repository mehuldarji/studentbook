(function($) {
    "use strict";
	
	window.Apex = {
		chart: {
			foreColor: '#77778e',
			toolbar: {
			  show: false
			},
		},
		dataLabels: {
			enabled: false
		},
		tooltip: {
			theme: 'dark'
		},
		grid: {
			borderColor: "rgba(119, 119, 142, 0.2)",
			xaxis: {
			lines: {
				show: true
			}
			}
		}
	};	

	//doughut chart
    var ctx = document.getElementById( "doughutChart" );
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ 20, 30, 16, 34 ],
                backgroundColor: ["#8966f7", "#bf69e2", "#009a3e","#43d7ef" ],
                hoverBackgroundColor: ["#8966f7", "#bf69e2", "#009a3e","#43d7ef" ]

               }],
            labels: ["Desktop", "Laptop", "Tablet", "Mobile"]
        },
        options: {
			cutoutPercentage: 80,
            responsive: true,
			maintainAspectRatio: false,
        }
    });
	
	//Chart1
    var ctx = document.getElementById( "Chart1" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
            datasets: [
                {
                    label: "Uploads",
                    data: [35, 45, 48, 46, 65, 68, 63],
                    borderColor: "rgb(0, 154, 62,0.9)",
                    borderWidth: "3",
					pointRadius:"3",
					pointBorderColor: 'rgb(0, 154, 62,0.9)',
					pointBackgroundColor: 'transparent',
                    backgroundColor: "rgb(0, 154, 62,0.05)"
                }]
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
			barRoundness: 1,
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
			legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
        }
    });
	
	//Chart1
    var ctx = document.getElementById( "Chart2" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
            datasets: [
                {
                    label: "Downloads",
                    data: [ 20, 35, 25, 42, 30, 48, 47],
                    borderColor: "rgb(67, 215, 239,0.9)",
                    borderWidth: "3",
					pointRadius:"3",
					pointBorderColor: 'rgb(67, 215, 239,0.9)',
					pointBackgroundColor: 'transparent',
                    backgroundColor: "rgb(67, 215, 239,0.05)"
                }]
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
			barRoundness: 1,
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
			legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
        }
    });
	
	var options = {
            chart: {
                height: 300,
                type: 'area',
				animations: {
					enabled: true,
					easing: 'easeinout',
					speed: 800,
					animateGradually: {
						enabled: true,
						delay: 150
					},
					dynamicAnimation: {
						enabled: true,
						speed: 350
					}
				},
				grid: {
				  padding: {
				   left: 0,
				   right: 0
				  }
				}
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Users',
                data: [1254,2451,1785,2845,4852,3658,5874]
            }, {
                name: 'Sessions',
                data: [1047,2547,2587,1875,3568,4584,4875]
            }],

            xaxis: {
                type: 'category',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul'], 
            },
			legend: {
				show: true,
				showForSingleSeries: false,
				showForNullSeries: true,
				showForZeroSeries: true,
				position: 'bottom',
				horizontalAlign: 'center', 
				floating: false,
				fontSize: '14px',
				fontFamily: 'Helvetica, Arial',
				width: undefined,
				height: undefined,
				formatter: undefined,
				tooltipHoverFormatter: undefined,
				offsetX: 0,
				offsetY: 0,
				labels: {
					colors: undefined,
					useSeriesColors: false
				},
				markers: {
					width: 12,
					height: 12,
					strokeWidth: 0,
					strokeColor: '#fff',
					radius: 12,
					customHTML: undefined,
					onClick: undefined,
					offsetX: 0,
					offsetY: 0
				},
				itemMargin: {
					horizontal: 20,
					vertical: 5
				},
				onItemClick: {
					toggleDataSeries: true
				},
				onItemHover: {
					highlightDataSeries: true
				},
			},
			colors: ['#bf69e2','#8966f7'],
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();

})(jQuery);