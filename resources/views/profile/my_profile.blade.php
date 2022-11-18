@include('include.header')
<div class="py-4">
    <div class="container">
        <div class="row">

            <aside class="col col-xl-3 order-xl-1 col-lg-12 order-lg-1 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                    <div class="py-4 px-3 border-bottom">
                    <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $user->photo }}" style="width: 135px; height: 135px;" id="img_prv" class="img-fluid rounded-circle" alt="Responsive image">
                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ $user->name }}</h5>
                        <p class="mb-0 text-muted">{{ $user->headline }}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-6 border-right p-3">
                            <h6 class="font-weight-bold text-dark mb-1">358</h6>
                            <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <div class="col-6 p-3">
                            <h6 class="font-weight-bold text-dark mb-1">85</h6>
                            <p class="mb-0 text-black-50 small">Views</p>
                        </div>
                    </div>
                    <div class="overflow-hidden border-top">
                        <a class="font-weight-bold p-3 d-block" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"> Log Out </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Skills & Endorsements</h6>
                    </div>
                    <div class="box-body">
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/l4.png')}}" alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Character Concept <span class="badge badge-dark ml-1">1</span></div>
                                <div class="small text-muted"><span class="text-primary">You and 1 connection</span> have given endorsements for this skill
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/l8.png')}}" alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Digital Painting <span class="badge badge-danger ml-1">6</span></div>
                                <div class="small text-muted"><span class="text-primary">Ask</span> has given an endorsement for this skill
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/l5.png')}}" alt="">
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Adobe Photoshop <span class="badge badge-info ml-1">3</span></div>
                                <div class="small text-muted"><span class="text-primary">Julia Cox</span> has given an endorsement for this skill
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                    <img src="{{ asset('img/job1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                    </div>
                </div>
            </aside>
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">About You</h6>
                    </div>
                    <div class="box-body p-3">
                        <p style="    white-space: pre-line;text-align: justify;">
                        {{ $user->about }}
                        </p>
                    </div>
                </div>
               
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Education</h6>
                    </div>
                    @if(count($user_education) > 0)
                        @foreach($user_education as $row)
                    <div class="box-body p-3 border-bottom">
                        <div class="d-flex align-items-top job-item-header pb-2">
                            <div class="mr-2">
                                <h6 class="font-weight-bold text-dark mb-0">{{ $row->institute }}</h6>
                                <div class="text-truncate text-primary">{{ $row->position }}</div>
                                <div class="small text-gray-500">{{ date('M Y', strtotime($row->from)) }} - {{ date('M Y', strtotime($row->to)) }}</div>
                            </div>
                            <!-- <img class="img-fluid ml-auto mb-auto" src="{{ asset('img/e1.png')}}" alt=""> -->
                        </div>
                         </div>
                    @endforeach
                    @endif
                    
                </div>
            </main>
            <aside class="col col-xl-3 order-xl-3 col-lg-12 order-lg-3 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Who viewed your profile</h6>
                    </div>
                    <div class="box-body p-3">
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/p4.png')}}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Sophia Lee</div>
                                <div class="small text-gray-500">@Harvard
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm">Connent</button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/p9.png')}}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">John Doe</div>
                                <div class="small text-gray-500">Traveler
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm">Connent</button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/p10.png')}}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Julia Cox</div>
                                <div class="small text-gray-500">Art Designer
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm">Connent</button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/p11.png')}}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Robert Cook</div>
                                <div class="small text-gray-500">@Photography
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm">Connent</button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('img/p12.png')}}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Richard Bell</div>
                                <div class="small text-gray-500">@Envato
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm">Connent</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
                    <img src="{{ asset('img/ads1.png')}}" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
                        <p class="mb-0 text-muted">Grow &amp; nurture your network</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVATE </button>
                    </div>
                </div>
                <a href="job-profile.html">
                    <div class="shadow-sm border rounded bg-white job-item mb-3">
                        <div class="d-flex align-items-center p-3 job-item-header">
                            <div class="overflow-hidden mr-2">
                                <h6 class="font-weight-bold text-dark mb-0 text-truncate">Product Director</h6>
                                <div class="text-truncate text-primary">Spotify Inc.</div>
                                <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                            </div>
                            <img class="img-fluid ml-auto" src="{{ asset('img/l3.png')}}" alt="">
                        </div>
                        <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                            <div class="overlap-rounded-circle">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p9.png')}}" alt="" data-original-title="Sophia Lee">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p10.png')}}" alt="" data-original-title="John Doe">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p11.png')}}" alt="" data-original-title="Julia Cox">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p10.png')}}" alt="" data-original-title="John Doe">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p11.png')}}" alt="" data-original-title="Julia Cox">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p12.png')}}" alt="" data-original-title="Robert Cook">
                            </div>
                            <span class="font-weight-bold text-muted">18 connections</span>
                        </div>
                        <div class="p-3 job-item-footer">
                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                        </div>
                    </div>
                </a>
                <a href="job-profile.html">
                    <div class="shadow-sm border rounded bg-white job-item mb-3">
                        <div class="d-flex align-items-center p-3 job-item-header">
                            <div class="overflow-hidden mr-2">
                                <h6 class="font-weight-bold text-dark mb-0 text-truncate">.NET Developer</h6>
                                <div class="text-truncate text-primary">Invision</div>
                                <div class="small text-gray-500"><i class="feather-map-pin"></i> London, UK
                                </div>
                            </div>
                            <img class="img-fluid ml-auto" src="{{ asset('img/l4.png')}}" alt="">
                        </div>
                        <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                            <div class="overlap-rounded-circle">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p13.png')}}" alt="" data-original-title="Sophia Lee">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p1.png')}}" alt="" data-original-title="John Doe">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p2.png')}}" alt="" data-original-title="Julia Cox">
                                <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{ asset('img/p3.png')}}" alt="" data-original-title="Robert Cook">
                            </div>
                            <span class="font-weight-bold text-muted">18 connections</span>
                        </div>
                        <div class="p-3 job-item-footer">
                            <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                        </div>
                    </div>
                </a>
            </aside>
        </div>
    </div>
</div>

@include('include.footer')