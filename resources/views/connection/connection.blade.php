@include('include.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="py-4">
    <div class="container">
        <div class="row">

            <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
                    <h5 class="pl-3 pt-3 pr-3 border-bottom mb-0 pb-3">More suggestions for you</h5>
                    <ul class="nav border-bottom osahan-line-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Connections</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Invitation</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="type-tab" data-toggle="tab" href="#type" role="tab" aria-controls="type" aria-selected="false">Hashtags</a>
                        </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="p-3">
                                <div class="row " style="float: right;clear: both;margin-bottom: 15px;margin-right: 3px;">
                                    <input type="text" class="form-control" id="Serach" name="name" value="" placeholder="Search name" aria-label="Search name" required="" style="    width: 200px;clear: both;">
                                </div>
                                <div class="row " id="load_data" style="clear:both">
                                    @if(count($user) > 0)
                                    @foreach($user as $row)
                                    <div class="col-md-4">
                                        <a href="#">
                                            <div class="border network-item rounded mb-3">
                                                <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                                                        <div class="small text-black-50">{{ $row->headline }}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">

                                                    <span class="font-weight-bold small text-primary">@if($row->followers <= 0) New User in Platform @else {{ $row->followers}} Connections @endif</span>
                                                </div>
                                                <div class="network-item-footer py-3 d-flex text-center">

                                                    <div class="col-12 ">
                                                        <button type="button" data-id="{{ $row->id }}" class="btn btn-primary btn-sm btn-block connect "> Connect </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div id="load_data_message"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="p-3 w-100">
                                <h6>People who most recently followed you</h6>
                                <br>

                                <div class="row " id="connection_data">
                                    @if(count($connection) > 0)
                                    @foreach($connection as $row)
                                    <?php
                                    $folllowers = DB::select('SELECT count(*) as followers FROM `user_connections`  WHERE (connected_id = "' . $row->id . '" OR user_id = "' . $row->id . '") AND status = 1 limit 1');
                                    $connection_id = DB::select('SELECT * FROM `user_connections` WHERE (user_id = "' . auth()->user()->id . '" AND connected_id = "' . $row->id . '") OR  (user_id = "' . $row->id . '" AND connected_id = "' . auth()->user()->id . '") AND status = 1 limit 1');

                                    ?>
                                    <div class="col-md-4">

                                        <div class="border network-item rounded mb-3">
                                            <a href="{{ route('profile.index', Crypt::encryptString($row->id)) }}">
                                                <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                                                        <div class="small text-black-50">{{ $row->headline }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">

                                                <span class="font-weight-bold small text-primary" style="font-size: 13px;">@if($folllowers[0]->followers <= 0) New User in Platform @else {{ $folllowers[0]->followers}} Connections @endif</span>
                                            </div>
                                            <div class="network-item-footer py-3 d-flex text-center">
                                                <div class="col-12 ">
                                                    <button type="button" data-id="{{ $connection_id[0]->id }}" data-msg="Unfollow Successfully" class="btn btn-primary btn-sm btn-block unfollow"> <i class="fa fa-check"></i> &nbsp; Following </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <div id="connection_data_message"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="p-3 w-100">
                                <h6>Recived</h6>
                                <br>
                                <div class="row ">
                                    @if(count($invitation_recived) > 0)
                                    @foreach($invitation_recived as $row)
                                    <div class="col-md-4">

                                        <div class="border network-item rounded mb-3">
                                            <a href="{{ route('profile.index', Crypt::encryptString($row->id)) }}">
                                                <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                                                        <div class="small text-black-50">{{ $row->headline }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                <span class="font-weight-bold small text-primary" style="font-size: 13px;">@if($row->followers <= 0) New User in Platform @else {{ $row->followers}} Connections @endif</span>
                                            </div>
                                            <div class="network-item-footer py-3 d-flex text-center">
                                                <div class="col-6 ">
                                                    <button type="button" data-id="{{ $row->id }}" data-status="1" class="btn btn-primary btn-sm btn-block accept "> Accept </button>
                                                </div>
                                                <div class="col-6 ">
                                                    <button type="button" data-id="{{ $row->id }}" data-status="2" class="btn btn-outline-primary btn-sm btn-block accept"> Decline </button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                    @else
                                    <p style="text-align: center !important; font-weight: bold; margin: auto;font-size: 14px;margin-bottom: 15px;color:#000">Sorry, Not received any one invitation.</p>
                                    @endif
                                </div>
                                <hr>
                                <h6>Sent</h6>
                                <br>
                                <div class="row ">
                                    @if(count($invitation_send) > 0)
                                    @foreach($invitation_send as $row)
                                    <div class="col-md-4">

                                        <div class="border network-item rounded mb-3">
                                            <a href="{{ route('profile.index', Crypt::encryptString($row->id)) }}">
                                                <div class="p-3 d-flex align-items-center network-item-header">
                                                    <div class="dropdown-list-image mr-3">
                                                        <img class="rounded-circle"  onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ $row->photo }}" alt="">
                                                    </div>
                                                    <div class="font-weight-bold">
                                                        <h6 class="font-weight-bold text-dark mb-0">{{ $row->name }}</h6>
                                                        <div class="small text-black-50">{{ $row->headline }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-flex align-items-center p-3 border-top border-bottom network-item-body">
                                                <span class="font-weight-bold small text-primary" style="font-size: 13px;">@if($row->followers <= 0) New User in Platform @else {{ $row->followers}} Connections @endif</span>
                                            </div>
                                            <div class="network-item-footer py-3 d-flex text-center">

                                                <div class="col-12 ">
                                                    <button type="button" data-id="{{ $row->id }}" class="btn btn-primary btn-sm btn-block connect disable-connect-btn"> <i class="fa fa-clock"></i> &nbsp; Pending</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                    @else
                                    <p style="text-align: center !important; font-weight: bold; margin: auto;font-size: 14px;margin-bottom: 15px;color:#000">Sorry, Not sent any one invitation</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="type" role="tabpanel" aria-labelledby="type-tab">
                            <div class="p-3 w-100">
                                <h6>Soon in next free update</h6>
                            </div>
                        </div> -->
                    </div>
                </div>
            </main>
            <aside class="col col-xl-3 order-xl-2 col-lg-12 order-lg-2 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white list-sidebar">
                    <div class="box-title p-3">
                        <h6 class="m-0">Manage my network</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-users mr-2 text-dark"></i> Connections <span class="ml-auto font-weight-bold">{{ count($connection) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-book mr-2 text-dark"></i> Invitation Sent <span class="ml-auto font-weight-bold">{{ count($invitation_send) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-book mr-2 text-dark"></i> Invitation Recived <span class="ml-auto font-weight-bold">{{ count($invitation_recived) }}</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-user-check mr-2 text-dark"></i> Company I Follow <span class="ml-auto font-weight-bold">0</span></li>
                        </a>

                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-clipboard mr-2 text-dark"></i> Page <span class="ml-auto font-weight-bold">0</span></li>
                        </a>
                        <a href="#">
                            <li class="list-group-item pl-3 pr-3 d-flex align-items-center text-dark"><i class="feather-tag mr-2 text-dark"></i> Hashtag <span class="ml-auto font-weight-bold">0</span></li>
                        </a>
                    </ul>
                </div>
                <div class="box shadow-sm mb-3 border rounded bg-white ads-box text-center">
                    <div class="image-overlap-2 pt-4">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                        <img onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" class="img-fluid rounded-circle shadow-sm" alt="Responsive image">
                    </div>
                    <div class="p-3 border-bottom">
                        <h6 class="text-dark">{{auth()->user()->name}}, grow your career by following <span class="font-weight-bold"> {{ config('constant.PROJECT_NAME'); }}</span></h6>
                        <p class="mb-0 text-muted">Stay up-to industry trends!</p>
                    </div>
                    <!-- <div class="p-3">
                        <button type="button" class="btn btn-outline-primary btn-sm pl-4 pr-4"> FOLLOW </button>
                    </div> -->
                </div>
            </aside>
        </div>
    </div>
</div>



@include('include.footer')

@include('connection.javascript')
