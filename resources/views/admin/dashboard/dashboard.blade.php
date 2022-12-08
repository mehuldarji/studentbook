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
            <div class="col-xl-6 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title">Live Users On</h3>
                        <!--										<div class="card-options">
                                                                                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                                                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                                                                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                                                                                        </div>-->
                    </div>
                    <div class="card-body">
                        <canvas id="doughutChart" class="donutShadow overflow-hidden h-300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <ul class="vertical-scroll h-400 mb-0 border-0">
                    <li class="item2">
                        <div class="card">
                            <div class="card-body iconfont text-left p-4">
                                <div class="d-flex">
                                    <div>
                                        <h6 class="mb-1">Sessions</h6>
                                        <h3 class="mb-2 font-weight-semibold text-dark">14,578<span class="text-success fs-14 ml-2">(+15%)</span></h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-cube text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="mb-2 text-muted fs-14">Analytics for Last month</small>
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-primary w-80 " role="progressbar"></div>
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
                                        <h3 class="mb-2 font-weight-semibold text-dark">6,547<span class="text-danger fs-14 ml-2">(-12%)</span></h3>
                                    </div>
                                    <div class="float-right text-right ml-auto">
                                        <div class="icon icon-shape bg-light rounded-circle text-white mb-0 mr-3">
                                            <i class="fas fa-user text-purple"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="mb-2 text-muted fs-14">Analytics for Last month</small>
                                <div class="progress progress-xs h-1 mt-1">
                                    <div class="progress-bar bg-purple w-80 " role="progressbar"></div>
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
                                    <div class="progress-bar bg-danger w-80 " role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title">Users From Country wise</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">United States</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-2 mb-0">
                                    <div class="progress-bar w-90 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">12,545</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">United Kingdom</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-50 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">6,458</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">Poland</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-20 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">2,548</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">Germany</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-60 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">8,456</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">Russia</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-40 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">7,548</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">India</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-70 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">9,732</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">North Koreia</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-30 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">3,875</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 text-lg-right">
                                <h5 class="mb-0 mt-1">China</h5>
                            </div>
                            <div class="col-lg-7">
                                <div class="progress progress-md mt-1 mb-0">
                                    <div class="progress-bar w-70 bg-primary"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="mb-0 font-weight-semibold text-dark mt-1">8,958</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Data Usage</div>
                        <div class="card-options">
                            <select class="form-control nice-select">
                                <option value="">Weekly</option>
                                <option value="1">Monthly</option>
                                <option value="2">Yearly</option>
                                <option value="3">Date Wise</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-lg-4">
                                <div class="d-flex mt-5">
                                    <div class="icon icon-shape border bg-success text-white rounded-circle"><i class="fas fa-upload text-white fs-14"></i></div>
                                    <div class="pl-3 ml-3 border-left">
                                        <h5 class="mb-1">Uploads</h5>
                                        <h3 class="mb-0 text-dark font-weight-semibold">65%</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="Chart-wrapper mt-5 mt-lg-0">
                                    <canvas id="Chart1" class="overflow-hidden h-9"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0 row">
                            <div class="col-lg-4">
                                <div class="d-flex mt-5">
                                    <div class="icon icon-shape border bg-info text-white rounded-circle"><i class="fas fa-download text-white fs-14"></i></div>
                                    <div class="pl-3 ml-3 border-left">
                                        <h5 class="mb-1">Downloads</h5>
                                        <h3 class="mb-0 text-dark font-weight-semibold">35%</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="Chart-wrapper mt-5 mt-lg-0">
                                    <canvas id="Chart2" class="overflow-hidden h-9"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Latest Ratings and Reviews</div>
                        <div class="card-options">
                            <select class="form-control nice-select">
                                <option value="">Weekly</option>
                                <option value="1">Monthly</option>
                                <option value="2">Yearly</option>
                                <option value="3">Date Wise</option>
                            </select>
                        </div>
                    </div>
                    <div class="scroll-1 mh-252">
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/male/1.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Joanne Scott
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>(5)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        long established fact that a reader
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/male/2.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Cristobal Sharp
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i>(4)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        The point of using Lorem Ipsum
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/female/1.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Velma Wellons
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i>(4)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        Many desktop publishing packages
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/female/21.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Cathie Madonna
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>(5)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        Various versions have evolved over the years
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/male/4.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Aurelio Dahmer
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i>(4)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        Ut enim ad minim veniam, quis Neque porro
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/male/6.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Cyrus Macarthur
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>(2)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        variations of passages of Lorem Ipsum
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="media mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object avatar brround w-7 h-7" alt="64x64" src="../assets_admin/images/users/male/7.jpg"> </a>
                                </div>
                                <div class="media-body mt-1">
                                    <h5 class="mt-0 mb-0 font-weight-semibold text-dark">Bernardo Sykes
                                        <span class="fs-12 ml-2">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i> (4)
                                        </span>
                                    </h5>
                                    <p class="font-13  mb-0 mt-1">
                                        you are going to use a passage of Lorem
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12">
                <div class="card mx-auto text-center">
                    <div class="card-body p-6">
                        <img src="../assets_admin/images/media/report.png" alt="img" class="mb-5 w-40">
                        <p class="mb-4"> voluptatem sequi nesciunt eque porro quisquam est ui dolorem ipsum quia </p>
                        <a class="btn btn-primary" href="#">View Analytics Report</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            User Traffic
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-bordered border-top table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Task</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/male/12.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">Megan Peters</span>
                                            </div>
                                        </td>
                                        <td>Accusantium doloremque laudantium</td>
                                        <td class="text-nowrap">Jan 13, 2019</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/female/12.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">Delpha Gimbel</span>
                                            </div>
                                        </td>
                                        <td>mistaken idea of denouncing pleasure</td>
                                        <td class="text-nowrap">Feb 13, 2019</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/male/21.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">Leroy Renna</span>
                                            </div>
                                        </td>
                                        <td>praising pain was born and I will give you </td>
                                        <td class="text-nowrap">Feb 23, 2019</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/female/23.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">Kathi Scull</span>
                                            </div>
                                        </td>
                                        <td>because those who pursue pleasure</td>
                                        <td class="text-nowrap">Mar 09, 2019</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/male/25.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">Dewayne Bahena</span>
                                            </div>
                                        </td>
                                        <td>consequences that are extremely painful </td>
                                        <td class="text-nowrap">Apr 23, 2019</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">
                                            <div class="d-flex">
                                                <span class="avatar brround cover-image mr-2" data-image-src="../assets_admin/images/users/male/5.jpg"></span>
                                                <span class="text-dark font-weight-semibold mt-2 h6 mb-0">David Bahena</span>
                                            </div>
                                        </td>
                                        <td> extremely painful consequences that are</td>
                                        <td class="text-nowrap">Apr 12, 2019</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin/include/footer')
    </div>
</div>
</div>





</body>