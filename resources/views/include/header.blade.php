<!DOCTYPE html>
<html lang="en">


<?php
$notification = \App\Models\Notification::where('is_read',0)->get();

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <title>{{ config('constant.PROJECT_NAME'); }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css') }}" />

    <link href="{{ asset('vendor/icons/feather.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inline.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600%2C400%2C500%7CRoboto:400" rel="stylesheet" property="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

<style>

.disable-connect-btn{
    background-color: gainsboro!important;
    background: gainsboro!important;
    border-color: gainsboro !important;
    color: #000 !important;
    pointer-events: none;
    outline: none !important;
    box-shadow : none !important
}
.network-item:hover{
    box-shadow: 0 0 0 1px rgb(0 0 0 / 15%), 0 4px 6px rgb(0 0 0 / 20%);
    transition: box-shadow 83ms;
}
</style>
</head>

<body>
<div class="loader" ></div>
<div class="blur-bg"></div>
@include('include.msg')
    <nav class="navbar navbar-expand navbar-dark  osahan-nav-top p-0">
        <div class="container">
            <a class="navbar-brand mr-2" href="/home"><img src="{{ asset('img/logo.png') }}" alt="">
            </a>
            <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input autocomplete="off" style="width: 325px;" type="text" class="form-control shadow-none border-0 " id="myInput" placeholder="Search people, jobs & more..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn" type="button">
                            <i class="feather-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ml-auto d-flex align-items-center">

                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-search mr-2"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input autocomplete="off" type="text" class="form-control border-0 shadow-none" id="myInput" placeholder="Search people, jobs and more..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="button">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobs.html"><i class="feather-briefcase mr-2"></i><span class="d-none d-lg-inline">Jobs</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('connection.index') }}"><i class="feather-users mr-2"></i><span class="d-none d-lg-inline">My Networks</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chat.index') }}"><i class="feather-message-square mr-2"></i><span class="d-none d-lg-inline">Message</span></a>
                </li>
                
                
                <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-bell"></i>

                        <span class="badge badge-info badge-counter">{{ COUNT($notification) }}</span>
                    </a>

                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
                        <h6 class="dropdown-header">
                            Notification Center
                        </h6>
                        @if(!empty($notification))
                        @foreach($notification as $row)
                        <a class="dropdown-item d-flex align-items-center" href="notifications.html">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="feather-bell text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">{{ date('F d, Y H:i A', strtotime($row->created_at)) }}</div>
                                <span class="font-weight-bold">{{ $row->description }}</span>
                            </div>
                        </a>

                        @endforeach
                        @endif
                        
                        <a class="dropdown-item text-center small text-gray-500" href="notifications.html">Show all notification</a>
                    </div>
                </li>

                <li class="nav-item dropdown no-arrow ml-1 osahan-profile-dropdown">
                    <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow-sm">
                        <div class="p-3 d-flex align-items-center">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" onerror="this.onerror=null;this.src='https://cdn-icons-png.flaticon.com/512/3135/3135715.png';" src="{{ asset('upload/users/')}}/{{ auth()->user()->photo }}" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">{{auth()->user()->name}}</div>
                                <div class="small text-gray-500">{{auth()->user()->headline}}</div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>, 
                        <a class="dropdown-item" href="{{ route('profile.index',Crypt::encryptString(auth()->user()->id)) }}"><i class="feather-edit mr-1"></i> My Account</a>
                        <a class="dropdown-item" href="{{ route('profile.update') }}"><i class="feather-user mr-1"></i> Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="feather-log-out mr-1"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>