(function($) {
    "use strict";
	var chartdata1 = [{
		name: 'Actual Revenue',
		type: 'bar',
		smooth: true,
		data: [25,26,28,27,28,30],
		symbolSize: 0,
		barMaxWidth: 6,
	},
	{
		name: 'Target Revenue',
		type: 'bar',
		smooth: true,
		data: [30,35,40,42,45,48],
		symbolSize: 0,
		barMaxWidth: 6,
	}
	];
	var option1 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '5',
		},
		xAxis: {
			data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			boundaryGap: false,
			axisLine: {
				show: false,
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		tooltip: {
			show: true,
			showContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			position: ['35%', '32%'],
			axisPointer: {
				label: {
					show: false,
				}
			}
		},
		yAxis: {
			show: false,
			splitLine: {
				lineStyle: {
					color: 'none'
				}
			},
			axisLine: {
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		series: chartdata1,
		color: ['rgb(191, 105, 226)','rgb(137, 102, 247)']
	};
	var chart1 = document.getElementById('echart1');
	var lineChart1 = echarts.init(chart1);
	lineChart1.setOption(option1);
	
	
	var chartdata2 = [{
		name: 'Actual Customers',
		type: 'line',
		data: [35,52,43,21,42,36],
		symbolSize: 0,
		barMaxWidth: 6,
	},
	{
		name: 'Target Customers',
		type: 'line',
		data: [50,70,80,50,80,90],
		symbolSize: 0,
		barMaxWidth: 6,
	}];
	var option2 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '5',
		},
		xAxis: {
			data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			boundaryGap: false,
			axisLine: {
				show: false,
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		tooltip: {
			show: true,
			showContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			position: ['35%', '32%'],
			axisPointer: {
				label: {
					show: false,
				}
			}
		},
		yAxis: {
			show: false,
			splitLine: {
				lineStyle: {
					color: 'none'
				}
			},
			axisLine: {
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		series: chartdata2,
		color: ['rgb(67, 215, 239)','rgb(191, 105, 226)']
	};
	var chart2 = document.getElementById('echart2');
	var lineChart2 = echarts.init(chart2);
	lineChart2.setOption(option2);
	
	
	var chartdata3 = [{
		name: 'Customer Avg Revenue',
		type: 'line',
		data: [25,14,58,85,63,24],
		symbolSize: 0,
		barMaxWidth: 6,
		smooth: true,
	},
	{
		name: 'Target Revenue',
		type: 'line',
		data: [35,20,60,90,70,40],
		symbolSize: 0,
		barMaxWidth: 6,
	}];
	var option3 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '5',
		},
		xAxis: {
			data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			boundaryGap: false,
			axisLine: {
				show: false,
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		tooltip: {
			show: true,
			showContent: true,
			triggerOn: 'mousemove',
			position: ['35%', '32%'],
			trigger: 'axis',
			axisPointer: {
				label: {
					show: false,
				}
			}
		},
		yAxis: {
			show: false,
			splitLine: {
				lineStyle: {
					color: 'none'
				}
			},
			axisLine: {
				lineStyle: {
					color: '#eaeaea'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#807b90'
			}
		},
		series: chartdata3,
		color: ['rgb(137, 102, 247)','rgb(67, 215, 239)']
	};
	var chart3 = document.getElementById('echart3');
	var lineChart3 = echarts.init(chart3);
	lineChart3.setOption(option3);
	
	var ctx = document.getElementById( "net-chart" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "M", "T", "W", "TH", "F", "SA", "S" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ 0, 7, 3, 5, 2, 10, 7 ],
                label: "Task",
                backgroundColor: 'rgba(137, 102, 247,0.05)',
                borderColor: 'rgb(137, 102, 247)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgb(137, 102, 247)',
            },
			{
				label: "PageViews",
				data: [0, 10, 2, 9, 8, 14, 3],
				backgroundColor: 'rgba(191, 105, 226, 0.05)',
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
                titleFontColor: '#000',
                bodyFontColor: '#000',
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
})(jQuery);

