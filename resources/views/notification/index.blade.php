@include('include.header')
<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Your Notifications</h6>
                    </div>
                    @if(!empty($notification))
                    @foreach($notification as $row)
                    <?php

                    $time = App\Http\Controllers\Controller::get_timeago(strtotime($row->created_at));
                    ?>
                    <div class="box-body p-0">
                        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                            <div class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white"><i class="fa fa-bell"></i></div>
                            <div class="font-weight-bold mr-3">
                                <div class="text-truncate">{{ $row->description }}</div>
                                <div class="small"></div>
                            </div>
                            <span class="ml-auto mb-auto">
                            
                            <div class="text-right text-muted pt-1 small">{{  $time  }}</div>
                        </span>
                        </div>
                       

                    </div>

                    @endforeach
                    @endif
                </div>
            </main>
            <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12" data-aos="fade-right">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center" data-aos="fade-right">
                    <div class="py-4 px-3 border-bottom">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ auth()->user()->name }}</h5>
                        <p class="mb-0 text-muted">{{ auth()->user()->headline }}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-6 border-right p-3">
                            <h6 class="font-weight-bold text-dark mb-1">{{ COUNT($connection) }}</h6>
                            <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <div class="col-6 p-3">
                                <h6 class="font-weight-bold mb-1 text-info "><i class="feather-bar-chart-2"></i><?= $view_profile[0]->last_seven_days_view_profile ?></h6>
                                <p class="mb-0 text-black-50 small">Last 7 days Views</p>
                            </div>
                    </div>
                    

                    <div class="overflow-hidden border-top">
                        <a class="font-weight-bold p-3 d-block" href="{{ route('profile.index',Crypt::encryptString(auth()->user()->id)) }}"> View my profile </a>
                    </div>
                </div>

                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center" data-aos="fade-left">
                    <img src="{{ asset('img/job1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>

                </div>
            </aside>
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-left">
                <div class="box shadow-sm border rounded bg-white mb-3 peopleView" >

                </div>

                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center" data-aos="fade-left">
                    <img src="{{ asset('img/job1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>

                </div>

            </aside>
        </div>
    </div>
</div>@include('home.javascript')

@include('include.footer')