@include('include.header')
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<link href="{{ asset('css/post.css') }}" rel="stylesheet" type="text/css">

<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12" data-aos="fade-down">
                <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post" data-aos="fade-down">
                    <ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather-edit"></i> Share a post</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="feather-clipboard"></i> Write an article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" aria-controls="poll" aria-selected="false"><i class="feather-clipboard"></i> Share a poll</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="p-3 d-flex align-items-center w-100" href="#">

                                <div class="w-100">
                                    <textarea id="post" placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="6"></textarea>
                                    <div style="float: right;padding: 0 !important;">
                                        <label data-toggle="tooltip" data-placement="top" data-original-title="Upload New Picture" class="btn btn-info m-0" for="fileAttachmentBtn">
                                            <i class="feather-image"></i>
                                            <input id="fileAttachmentBtn" name="photo" type="file" class="d-none">
                                        </label>
                                        <!-- <button data-toggle="tooltip" data-placement="top" data-original-title="Delete" type="submit" class="btn btn-danger"><i class="feather-trash-2"></i></button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="post" class="btn btn-primary btn-sm save_post">Share Post</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="p-3 w-100">
                                <input type="text" class="form-control border  p-0 shadow-none" placeholder="Enter article title" style="padding: 10px !important;border-color: gainsboro !important;margin-bottom: 15px;" name="title" id="title">
                                <textarea id="editor" placeholder="Write an article..." class="form-control border-0 p-0 shadow-none" rows="6"></textarea>
                            </div>
                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="article" class="btn btn-primary btn-sm save_post">Share Article</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="poll" role="tabpanel" aria-labelledby="poll-tab">
                            <div class="p-3 w-100">
                                <input name="que" required placeholder="Write a poll..." class="que form-control shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option A..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option B..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option C..." class="ans form-control  shadow-none" />
                            </div>
                            <div class="p-3 w-100">
                                <input name="ans[]" required placeholder="Write a option D..." class="ans form-control shadow-none" />
                            </div>

                            <div class="border-top p-3 d-flex align-items-center">
                                <div class="mr-auto">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-1">

                                    <button type="button" data-type="poll" class="btn btn-primary btn-sm save_post">Share Poll</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box   rounded  mb-3 osahan-post" id="load_data">
                    <!-- -//--Post Data------->
                </div>
                <div id="load_data_message"></div>
            </main>
            <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12" data-aos="fade-right">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center" data-aos="fade-right">
                    <div class="py-4 px-3 border-bottom">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ auth()->user()->name }}</h5>
                        <p class="mb-0 text-muted">{{ auth()->user()->headline }}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-12 border-right p-3">
                            <h6 class="font-weight-bold text-dark mb-1">{{ COUNT($connection) }}</h6>
                            <p class="mb-0 text-black-50 small">Connections</p>
                        </div>
                        <!-- <div class="col-6 p-3">
                                <h6 class="font-weight-bold text-dark mb-1">85</h6>
                                <p class="mb-0 text-black-50 small">Views</p>
                            </div> -->
                    </div>
                    <div class="overflow-hidden border-top">
                        <a class="font-weight-bold p-3 d-block" href="{{ route('profile.index',Crypt::encryptString(auth()->user()->id)) }}"> View my profile </a>
                    </div>
                </div>
                <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden" data-aos="fade-right">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Profile Views</h6>
                    </div>
                    <div class="d-flex text-center">
                        <div class="col-6 border-right py-4 px-2">
                            <h5 class="font-weight-bold text-info mb-1">08 <i class="feather-bar-chart-2"></i></h5>
                            <p class="mb-0 text-black-50 small">last 5 days</p>
                        </div>
                        <div class="col-6 py-4 px-2">
                            <h5 class="font-weight-bold text-success mb-1">+ 43% <i class="feather-bar-chart"></i></h5>
                            <p class="mb-0 text-black-50 small">Since last week</p>
                        </div>
                    </div>
                    <div class="overflow-hidden border-top text-center">
                        <img src="img/chart.png" class="img-fluid" alt="Responsive image">
                    </div>
                </div>

            </aside>
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-left">
                <div class="box shadow-sm border rounded bg-white mb-3" data-aos="fade-left">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">People you might know</h6>
                    </div>
                    <div class="box-body p-3">
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p8.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Sophia Lee</div>
                                <div class="small text-gray-500">Student at Harvard
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p9.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">John Doe</div>
                                <div class="small text-gray-500">Traveler
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p10.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Julia Cox</div>
                                <div class="small text-gray-500">Art Designer
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p11.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Robert Cook</div>
                                <div class="small text-gray-500">Photographer at Photography
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header people-list">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p12.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">Richard Bell</div>
                                <div class="small text-gray-500">Graphic Designer at Envato
                                </div>
                            </div>
                            <span class="ml-auto"><button type="button" class="btn btn-light btn-sm"><i class="feather-user-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center" data-aos="fade-left">
                    <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                    <div class="p-3 border-bottom">
                        <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
                        <p class="mb-0 text-muted">Looking for talent?</p>
                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A JOB </button>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>
@include('include.footer')

@include('home.javascript')
