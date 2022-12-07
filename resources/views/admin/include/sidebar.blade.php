
<?php
$value = \App\Models\Websitetable::where(['id' => 1])->first()->logo;
?>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img src="{{ asset('/assets_admin/upload/')}}/{{$value}}"   height="130" >

        <div class="profile-buttons in-down">
            <a class="icon icon-shape bg-secondary rounded-circle text-white mb-0"><i class="fab fa-facebook-f text-white"></i></a>
            <a class="icon icon-shape bg-info rounded-circle text-white mb-0"><i class="fab fa-twitter text-white"></i></a>
            <a class="icon icon-shape bg-primary rounded-circle text-white mb-0"><i class="fas fa-bell text-white"></i></a>
            <a class="icon icon-shape bg-success rounded-circle text-white mb-0"><i class="fas fa-plus text-white"></i></a>
            <a class="icon icon-shape bg-danger rounded-circle text-white mb-0"><i class="fas fa-envelope text-white"></i></a>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item" href="{{ route('admin.dashboard')  }}"><i class="side-menu__icon si si-screen-desktop"></i><span class="side-menu__label">Dashboard</span></a>

        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('admin.userlist')  }}"><i class="side-menu__icon si si-people"></i><span class="side-menu__label">User</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('admin.landing')  }}"><i class="side-menu__icon si si-layers"></i><span class="side-menu__label">Landing Page</span></a>
        </li>
    </ul>
</aside>



<div class=" app-content my-3 my-md-5">
    <div class="side-app">
        <header class="app-header header navbar-collapse">
            <div class="container-fluid p-0">
                <div class="d-flex">
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                    <a class="header-brand" href="#">
                        <img alt="logo" class="header-brand-img main-logo h-7" src="{{ asset('/assets_admin/upload/')}}/{{$value}}">
                        <img alt="logo" class="header-brand-img mobile-logo h-7" src="{{ asset('/assets_admin/upload/')}}/{{$value}}">
                    </a>

                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="d-sm-flex d-none">
                            <a href="#" class="nav-link icon full-screen-link">
                                <i class="fe fe-minimize fullscreen-button"></i>
                            </a>
                        </div>

                        <div class="dropdown">
                            <a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
                                <span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('/assets_admin/images/users/male/dummy.png')}}">
                                    <span class="avatar-status bg-green"></span>
                                </span>
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-dark">{{ session('name') }}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>My Profile</a>											
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout')  }}"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

