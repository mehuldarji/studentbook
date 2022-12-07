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
                data: [ 9187, 3654, 7319, 1875 ],
                backgroundColor: ["#8966f7", "#bf69e2", "#009a3e","#43d7ef"],
                hoverBackgroundColor: ["#8966f7", "#bf69e2", "#009a3e","#43d7ef"]

                            } ],
            labels: [  "FaceBook", "Instragram", "Twitter", "LinkedIn" ]
        },
        options: {
			cutoutPercentage: 50,
            responsive: true,
			maintainAspectRatio: false,
			legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
        }
    } );

	/*----ApexCharts----*/
	var options = {
            chart: {
                height: 300,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '70%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{

                name: 'likes',

                data: [286, 498, 834, 589, 426, 683, 489, 289]
            }, {
                name: 'Clicks',

                data: [734, 392, 528, 628, 839, 382, 489, 894]
            }, {
                name: 'Comments',
                data: [163, 493, 836, 389, 592, 653, 894, 482]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            },
            yaxis: {
				lines: {
				show: true,
			  },				
            },
            fill: {
                opacity: 1

            },
			colors: ["#8966f7", "#bf69e2", "#43d7ef"],
            tooltip: {
                y: {
                    formatter: function (val) {
                        return " " + val + " "
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#social"),
            options
        );

        chart.render();

	/*--impression charts--*/
	var options = {
		chart: {
			height: 300,
			type: 'bar',
		},
		plotOptions: {
			bar: {
				horizontal: true,
			}
		},
		dataLabels: {
			enabled: false
		},
		series: [{
			 name: 'Imperssions',
			data: [895, 378, 892, 392, 937, 639, 467, 839, 927, 672]
		}],
		xaxis: {
			categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
		},
		yaxis: {

		},
		colors: ['#8966f7'],
		tooltip: {

		}
	}

   var chart = new ApexCharts(
		document.querySelector("#chart"),
		options
	);

	chart.render();
})(jQuery);