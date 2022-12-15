@include('admin/include/header')

<div class="page">
    <div class="page-main">

        <!--<div class="app-sidebar__overlay" data-toggle="sidebar"></div>-->
        @include('admin/include/sidebar')

        <div class="mb-4">
            <div class="page-header  mb-0">
                <h4 class="page-title">Dashboard</h4>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="dash4">
                            <h3 class="card-title font-weight-semibold">Monthly Add Users</h3><p>
                            <!--<p><i class="fas fa-arrow-up text-green mr-1"></i>15% increase in last Month</p>-->
                        </div>
                        <div class="chart-wrapper "><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="chart" class="chart-height chart-dropshadow chartjs-render-monitor" width="375" height="192" style="display: block; width: 375px; height: 192px;"></canvas>
                        </div>
                    </div>
<!--                    <div class="card-footer">
                        <span class="text-muted"><i class="si si-clock mr-1"></i>Updated 2 mins ago</span>
                    </div>-->
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <ul class="vertical-scroll h-400 mb-0 border-0">
                    <li class="item2">
                        <div class="card">
                            <div class="card-body iconfont text-left p-4">
                                <div class="d-flex">
                                    <div>
                                         <?php $user_count = App\Models\User::count();?>
                                        <h6 class="mb-1">Total Users</h6>
                                        <h3 class="mb-2 font-weight-semibold text-dark">{{$user_count}}</h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-cube text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--<small class="mb-2 text-muted fs-14">Analytics for Last month</small>-->
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-primary w-{{round($user_count/5)*5}}" role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item2">
                        <div class="card">
                            <div class="card-body iconfont text-left p-4">
                                <div class="d-flex">
                                    <div>
                                        <h6 class="mb-1">Users</h6>
                                        <h3 class="mb-2 font-weight-semibold text-dark">{{$user_count}}<span class="text-danger fs-14 ml-2">(-12%)</span></h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-user text-purple"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="mb-2 text-muted fs-14">Analytics for Last month</small>
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-purple w-{{round($user_count/5)*5}} " role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item2">
                        <div class="card">
                            <div class="card-body iconfont text-left p-4">
                                <div class="d-flex">
                                    <div>
                                        <h6 class="mb-1">Bounce Rate</h6>
                                        <h3 class="mb-2 font-weight-semibold text-dark">30%<span class="text-success fs-14 ml-2">(+12%)</span></h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-life-ring text-info"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="mb-2 text-muted fs-14">Analytics for Last month</small>
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-info w-80 " role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="item2">
                        <div class="card">
                            <div class="card-body iconfont text-left p-4">
                                <div class="d-flex">
                                    <div>
                                        <h6 class="mb-1">New Sessions</h6>
                                        <h3 class="mb-2 font-weight-semibold text-dark">1,478<span class="text-danger fs-14 ml-2">(-5%)</span></h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-shield-alt text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="mb-2 text-muted fs-14">Analytics for Last month</small>
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-danger w-80 "role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <!--<h3 class="card-title">Users From Country wise</h3>-->
                        <h3 class="card-title">Users Location</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @foreach($countrys as $country)
                        <?php $count = App\Models\User::where('location',$country->location)->whereNotNull('location')->distinct()->count()?>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">{{$country->location}}</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-2 mb-0">
                                    @if($count >=1 && $count<= 10)
                                    <div class="progress-bar w-{{$count}} bg-primary"></div>
                                    @else
                                    <div class="progress-bar w-{{round($count/5)*5}} bg-primary"></div>
                                    @endif                                    
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">{{$count}}</h4>
                            </div>
                        </div>
                        @endforeach

                        
                    </div>
                </div>
            </div>
        </div>

        @include('admin/include/footer')
    </div>
</div>
</div>


</body>


<script>

 var ctx = document.getElementById("chart");
 var month = <?php echo $month; ?>;
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			type: 'bar',
			datasets: [{
				label: "Users",
				data: month,
				backgroundColor: '#0172BD',
				borderColor: '#fff',
				borderWidth: 0,
				pointStyle: 'circle',
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#8966f7'

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
				intersect: false
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat'
				}
			},
			scales: {
				xAxes: [{
					barPercentage: 0.2,
					ticks: {
						fontColor: "black"

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
						fontColor: "black"
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


</script>
