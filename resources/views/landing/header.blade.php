<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>{{ config('constants.PROJECT_NAME'); }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick-theme.min.css') }}" />

    <link href="{{ asset('vendor/icons/feather.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inline.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600%2C400%2C500%7CRoboto:400" rel="stylesheet" property="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body{
    background-color: #fff;
}
footer{
    background-color: #F3F2EF !important;
}
.copyright{
    background-color: #fff;
    padding: 7px 0;
}
.footerDesign{
    padding: 15px 0;
    padding-top: 30px;
}
    </style>
</head>

<body>
<div class="loader" ></div>
@include('include.msg')
    <nav class="navbar navbar-expand navbar-dark  osahan-nav-top p-0">
        <div class="container">
            <a class="navbar-brand mr-2" href="/"><img src="img/logo.png" alt="">
            </a>
            
            <ul class="navbar-nav ml-auto d-flex align-items-center">

                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-search mr-2"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search people, jobs and more..." aria-label="Search" aria-describedby="basic-addon2">
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
                    <a class="nav-link" href="connection.html"><i class="feather-users mr-2"></i><span class="d-none d-lg-inline">People</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connection.html"><i class="feather-book-open mr-1"></i><span class="d-none d-lg-inline">Learning</span></a>
                </li>
                <li class="nav-item">
                
                    <a class="nav-link btn btn-outline-primary header_btn" href="{{ route('login') }}"><span class="d-none d-lg-inline">Sign In</span></a>
                </li>
                
                
                

                
            </ul>
        </div>
    </nav>