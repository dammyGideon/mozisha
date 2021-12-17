<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta property="og:title" content="{{$data['sm_title']}}">
    <meta property="og:description" content="{{$data['sm_description']}}">
    <meta property="og:image" content="{{$data['sm_image']}}">
    <meta property="og:url" content="{{$data['sm_url']}}">

    <meta property="twitter:title" content="{{$data['sm_title']}}">
    <meta property="twitter:description" content="{{$data['sm_description']}}">
    <meta property="twitter:image" content="{{$data['sm_image']}}">
    <meta property="twitter:url" content="{{$data['sm_url']}}">


    <meta name="description" content="{{$data['description']}}" />
    <meta name="keywords" content="{{$data['keywords']}}" />
    <meta name="DC.title" content="{{$data['dc_title']}}" />
    <meta name="copyright" content="Copyright-Mozisha.net: {{date("Y", time())}}" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="Mozisha international">
    <title>{{$data['title']}}</title>
    <link rel="icon" href="{{asset('user/home/assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/animate.css')}}">
    <link href="{{asset('user/home/assets/css/LineIcons.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/lightcase.cs')}}s">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/font-awesome.css')}}" >
    <link rel="stylesheet" href="{{asset('user/home/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/iconmind/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/blog-style.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/business.css')}}">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/digital-agency.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/home/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />
</head>
<body id="top-page" class="search color1" style="font-size: 90%">
@if(Route::currentRouteName() == 'homepage')
<!-- preloader-->
<div id="loading">
    <div id="loading-center" style="background-color: #420175;">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>
@endif

<!--search-body-->
<div class="search-area">
    <div class="close-search">
        <span></span>
        <span></span>
    </div>
    <form action="#" class="search-form">
        <input type="text" name="search" placeholder="Write & Press Enter">
        <button><i class="fa fa-search"></i></button>

    </form>
</div>

<!-- start header section -->
<header class="header style1 transparent-header">
    <!-- headertop -->
    <div class="header-top d-none d-lg-flex">
        <div class="headertop-left">
            <ul class="site-info m-0 p-0 list-unstyled">
                {{-- @if($setting)
                <li><a href="tel:{{$setting->phone}}"><i class="fa fa-mobile-phone"></i> {{$setting->phone}}</a></li>
                <li><a href="mailto:{{$setting->email}}" target="_top"><i class="fa fa-send-o"></i> {{$setting->email}}</a></li>
                @endif --}}
            </ul>
        </div>

        <div class="headertop-right d-flex flex-wrap">
            <!-- signIn option -->
            @if(Auth::user())
                @if(Auth::user()->hasRole('mentor'))
                    <div class="signin-option">
                        <a href="{{route('mentor.dashboard')}}">Dashboard</a>
                        <span>/</span>
                        <a href="{{route('logout')}}">Sign out</a>
                    </div>
                @endif
                @if(Auth::user()->hasRole('mentee'))
                        <div class="signin-option">
                            <a href="{{route('mentee.dashboard')}}">Dashboard</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                @endif
                    @if(Auth::user()->hasRole('administrator'))
                        <div class="signin-option">
                            <a href="{{route('admin.home')}}">Admin</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('superadministrator'))
                        <div class="signin-option">
                            <a href="{{route('admin.home')}}">Admin</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('developer'))
                        <div class="signin-option">
                            <a href="{{route('admin.home')}}">Admin</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('writer'))
                        <div class="signin-option">
                            <a href="{{route('admin.home')}}">Admin</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('editor'))
                        <div class="signin-option">
                            <a href="{{route('admin.home')}}">Admin</a>
                            <span>/</span>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    @endif

            @else
                <div class="signin-option">
                    <a href="{{route('login')}}">Log In</a>
                    <span>/</span>
                    <a href="{{route('user.account')}}">Sign Up</a>
                </div>
            @endif


            {{-- <!-- language option -->
            <div class="language-option dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">English</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Pidgin/a>
                        <a class="dropdown-item" href="#">Igbo</a>
                        <a class="dropdown-item" href="#">Yoruba</a>
                        <a class="dropdown-item" href="#">Hausa</a>
                </div>
            </div> --}}

            {{-- <!-- search option -->
            <div class="search-option">
                <i class="fa fa-search"></i>
            </div> --}}

            <!-- social-media -->
            {{-- <ul class="social-media-list d-flex m-0 p-0 list-unstyled">
                @if($social)
                <li><a target="_blank" href="{{$social->facebook}}"><i class="fa fa-facebook-f"></i></a></li>
                <li><a target="_blank" href="{{$social->twitter}}"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="{{$social->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>
                <li><a target="_blank" href="{{$social->instagram}}"><i class="fa fa-instagram"></i></a></li>
                <li><a  href="https://api.whatsapp.com/send?phone={{$social->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                @endif
            </ul> --}}
        </div>
    </div>

    <!-- main menu area -->
    <div class="main-menu-area mega-menu-header animated">
        <div class="row m-0 align-items-center">
            <div class="col-lg-2 p-0 d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a class="navbar-brand" href="{{route('homepage')}}"><img class="lazy" src="{{asset('user/home/assets/images/logo-black.png')}}" alt="logo"></a>
                    <a class="navbar-brand navbar-brand2" href="{{route('homepage')}}"><img class="lazy" src="{{asset('user/home/assets/images/logo-white.png')}}" alt="logo"></a>
                </div>
                <div class="menu-bar d-lg-none" style="background-color: #420175 !important;">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="col-lg-10 d-none d-lg-block p-0 d-lg-flex align-items-center justify-content-end justify-content-xl-end">
                <div class="d-lg-flex flex-wrap justify-content-start">
                    <ul class="nav-menu d-lg-flex flex-wrap list-unstyled m-0 justify-content-center">

                        {{-- <li class="nav-item @if(Route::currentRouteName() == 'homepage') active @endif "><a href="{{route('homepage')}}">Home</a></li> --}}




                        {{-- <li class="nav-item mega-menu"><a href="#">For Businesses<i class="fa fa-angle-down"></i></a>
                            <div class="mega-menu-fullwidth dark" style="background-color: #420175 !important;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <h5 class="mega-menu-list-title">Mentors/Businesses:</h5>
                                            <ul class="mega-menu-list">
                                                <li><i class="fa fa-check-circle"></i> &nbsp; Creates a business account</li>
                                                <li><i class="fa fa-check-circle"></i> &nbsp; Update your business profile</li>
                                                <li><i class="fa fa-check-circle"></i> &nbsp; Post an apprenticeship program</li>
                                                <li><i class="fa fa-check-circle"></i> &nbsp; Get apprentices to grow your business</li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-5">
                                            <h5 class="mega-menu-list-title">Get started</h5>
                                            <ul class="mega-menu-list">
                                                <li><a href="{{route('login')}}">Log in</a></li>
                                                <li><a href="{{route('mentor.register')}}">Sign up</a></li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li> --}}


                        <li class="nav-item mega-menu"><a href="#">Talents<i class="fa fa-angle-down"></i></a>
                            <div class="mega-menu-fullwidth dark" style="background-color: #420175 !important;">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color:black">
                                                        Upskilling
                                                        </h5>
                                                    <p class="card-text" style="color: black">
                                                        Improve your skills through our array of courses
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color:black">
                                                        Work Experience
                                                        </h5>
                                                    <p class="card-text" style="color: black">
                                                        Build real life work experience through tasks and apprenticeship.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color:black">
                                                        Skills Monetization
                                                        </h5>
                                                    <p class="card-text" style="color: black">
                                                        Monetize your skill through our freelancing platform.
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color:black">
                                                        Employment Opportunities
                                                        </h5>
                                                    <p class="card-text" style="color: black">
                                                        Get access to full-time employment opportunities
                                                    </p>

                                                </div>
                                            </div>

                                        </div>


                                        <li class="nav-item mega-menu"><a href="#">Businesses<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu-fullwidth dark" style="background-color: #420175 !important;">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" style="color:black">
                                                                        Affordable Talents
                                                                        </h5>
                                                                    <p class="card-text" style="color: black">
                                                                        Get your tasks completed <br/>by apprentices
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" style="color:black">
                                                                        Recruitment
                                                                        </h5>
                                                                    <p class="card-text" style="color: black">
                                                                        Build your team for a low cost while you do absolutely nothing
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" style="color:black">
                                                                        Talent Pool
                                                                        </h5>
                                                                    <p class="card-text" style="color: black">
                                                                        Access to a pool of  well nurtured talents for full-time employment
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" style="color:black">
                                                                        Access to Digital Apprenticeship Platform
                                                                        </h5>
                                                                    <p class="card-text" style="color: black">
                                                                        Train apprentice with our robust digital apprenticeship system

                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <li class="nav-item mega-menu"><a href="#">Institutions<i class="fa fa-angle-down"></i></a>
                                                            <div class="mega-menu-fullwidth dark" style="background-color: #420175 !important;">
                                                                <div class="container">
                                                                    <div class="row">

                                                                        <div class="col-sm-4">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title" style="color:black">
                                                                                        Industry Exposure For your Students
                                                                                        </h5>
                                                                                    <p class="card-text" style="color: black">
                                                                                        Partner with Mozisha to expose your students to
                                                                                        in-demand skills and job experience while in school
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title" style="color:black">
                                                                                        Co-Curricular Program Management
                                                                                        </h5>
                                                                                    <p class="card-text" style="color: black">
                                                                                        Have your co-curricular programme managed by Mozisha
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title" style="color:black">
                                                                                        Bridging Education-Industry Gap
                                                                                        </h5>
                                                                                    <p class="card-text" style="color: black">
                                                                                        Improve your students employability and
                                                                                         bridge the gap between your institution and industry
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>


                         {{-- <li class="nav-item @if(Route::currentRouteName() == 'team') active @endif "><a href="{{route('team')}}">Team</a></li>
                        <li class="nav-item @if(Route::currentRouteName() == 'events') active @endif "><a href="{{route('events')}}">Events</a></li>
                        <li class="nav-item @if(Route::currentRouteName() == 'about') active @endif "><a href="{{route('about')}}">About Us</a></li> --}}

                        <li class="nav-item mega-menu"><a href="{{asset('user/paystackReg')}}">Register for a Course</a>

                        {{-- <li class="nav-item mega-menu">
                            <br/>
                            <div class="mt-5">
                                <button class="btn" style="background-color: #420175 !important; color:whitesmoke;" type="button">
                                  <a href="{{asset('user/paystackReg')}}">Register for a Course</a>
                                </button>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="menu-action-area d-none d-xl-flex flex-wrap justify-content-end ml_lg--30">
                    <ul class="menu-action list-unstyled m-0 p-0 d-flex flex-wrap justify-content-end">
                        <li><a class="da-custom-btn btn-border-radius40" data-toggle="modal" data-target="#exampleModal"><span>Partner with us</span></a></li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- mobile menu area-->
        <div class="mobile-menu-area d-lg-none" >
            <div class="m-menu-header" >
                    <span class="close-bar" style="background-color: #420175 !important;">
                        <span></span>
                        <span></span>
                    </span>
            </div>
            <div class="mobile-menu">
                <ul class="m-menu">

                    <li><a>Talents<span class="arrow"><i class="fa fa-angle-right"></i></span></a>
                        <ul class="mobile-submenu">
                            <div class="container">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Upskilling
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Improve your skills through our array of courses
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Work Experience
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Build real life work experience through tasks and apprenticeship.
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Skills Monetization
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Monetize your skill through our freelancing platform.
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Employment Opportunities
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Get access to full-time employment opportunities
                                                </p>

                                            </div>
                                        </div>

                                    </div>

                        </ul>
                    </li>
                    <li><a>Businesses<span class="arrow"><i class="fa fa-angle-right"></i></span></a>
                        <ul class="mobile-submenu">
                            <div class="container">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Affordable Talents
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Get your tasks completed <br/>by apprentices
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Recruitment
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Build your team for a low cost while you do absolutely nothing
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Talent Pool
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Access to a pool of  well nurtured talents for full-time employment
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Access to Digital Apprenticeship Platform
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Train apprentice with our robust digital apprenticeship system

                                                </p>

                                            </div>
                                        </div>
                                    </div>


                        </ul>
                    </li>

                    <li><a>Institutions<span class="arrow"><i class="fa fa-angle-right"></i></span></a>
                        <ul class="mobile-submenu">
                            <div class="container">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Industry Exposure For your Students
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Partner with Mozisha to expose your students to
                                                    in-demand skills and job experience while in school
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Co-Curricular Program Management
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Have your co-curricular programme managed by Mozisha
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color:black">
                                                    Bridging Education-Industry Gap
                                                    </h5>
                                                <p class="card-text" style="color: black">
                                                    Improve your students employability and
                                                     bridge the gap between your institution and industry
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                        </ul>
                    </li>


                    <li><a href="{{asset('user/paystackReg')}}">Register for a Course</a>

                        {{-- <a href="{{asset('user/paystackReg')}}">Register for a Course</a> --}}

                    </li>

                    {{-- <li class="nav-item mega-menu">
                        <br/>
                        <div class="mt-5">
                            <button class="btn" style="background-color: #420175 !important; color:whitesmoke;" type="button">
                              <a href="{{asset('user/paystackReg')}}">Register for a Course</a>
                            </button>
                        </div>
                    </li> --}}

                    <li class="nav-item @if(Route::currentRouteName() == 'about') m-active @endif "><a href="{{route('about')}}">About</a></li>
                    @if(Auth::user())
                        @if(Auth::user()->hasRole('mentor'))
                            <li class="nav-item"><a href="{{route('mentor.dashboard')}}">Dashboard</a></li>
                        @endif
                        @if(Auth::user()->hasRole('mentee'))
                            <li class="nav-item"><a href="{{route('mentee.dashboard')}}">Dashboard</a></li>
                        @endif
                    @else
                    <li class="nav-item"><a href="{{route('login')}}">Log In</a></li>

                    <li class="nav-item"><a href="{{route('user.account')}}">Sign Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header section -->



@yield('content')


<!--  footer section start  -->
<footer class="footer footer1" style="background-color:#420175 !important;">
    <div class="footertop" >
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-widget">
                        <a href="#" class="footer-logo" style="color:whitesmoke;font-weight: bold;"><img class="lazy" style="max-width: 40%;" src="{{asset('user/home/assets/images/logo-black.png')}}" alt="logo" ></a>
                        <p class="address">
                        @if($setting)
                        </p>
                        <ul class="footer-site-info">
                            <li><a href="mailto:{{$setting->email}}" style="color:whitesmoke">{{$setting->email}}</a></li>
                        </ul>
                        @endif

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-widget">
                        <h4 class="footer-title" style="color: whitesmoke">Navigate</h4>
                        <ul class="footer-menu">
                            <li><a href="{{route('homepage')}}"style="color: whitesmoke">Home</a></li>
                            <li><a href="{{route('team')}}"    style="color: whitesmoke">Team</a></li>
                            <li><a href="{{route('blog')}}"    style="color: whitesmoke">Blog</a></li>
                            <li><a href="{{route('about')}}"   style="color: whitesmoke">About</a></li>
                            <li><a href="{{route('login')}}"   style="color: whitesmoke">Login</a></li>
                            <!-- <li><a href="#">Portfolio</a></li>
                            <li><a href="#">Element</a></li>
                            <li><a href="#">Features</a></li> -->
                        </ul>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="footer-widget">
                        <h4 class="footer-title" style="color: whitesmoke">Social Media</h4>
                        <ul class="linklist">
                            @if($social)


                            <li><a target="_blank" href="{{$social->facebook}}" style="color: whitesmoke;hover"><i class="fa fa-facebook-square"  style="font-size:30px;"></i></a></li>
                            <li><a target="_blank" href="{{$social->twitter}}" style="color: whitesmoke"><i class="fa fa-twitter"  style="font-size:30px;"></i></a></li>
                            <li><a target="_blank" href="{{$social->linkedin}}" style="color: whitesmoke"><i class="fa fa-linkedin-in"  style="font-size:30px;"></i></a></li>
                            <li><a target="_blank" href="{{$social->instagram}}" style="color: whitesmoke"><i class="fa fa-instagram"  style="font-size:30px;"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone={{$social->whatsapp}}" target="_blank" style="color: whitesmoke"><i class="fa fa-whatsapp"  style="font-size:30px;"></i></a></li>
                            @endif


                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                       <livewire:home-subscribers-form />
                        <p style="color: whitesmoke">Subscribe to our mailing list to receive new updates and special offers and other information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footerbottom">
        <div class="container">
            <div class="row justify-content-center justify-content-md-between align-items-center">
                <p class="m-0 copy-right" style="color: whitesmoke">&copy; Copyright {{Carbon\Carbon::now()->format('Y')}} | <a href="{{route('homepage')}}"><span style="color: whitesmoke">Mozisha<span></a><span>Powered by </span><a href="https://mozisha.com/" target="_blank"><span style="color: whitesmoke">Mozisha International</span></a> | All Rights Reserved</p>

                <!-- social-media -->
                <ul class="social-media-list d-flex flex-wrap m-0 p-0 list-unstyled">
                   @if($social)
                    <li><a target="_blank" href="{{$social->facebook}}"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a target="_blank" href="{{$social->twitter}}"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="{{$social->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>
                    <li><a target="_blank" href="{{$social->instagram}}"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone={{$social->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                @endif
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--  footer section end  -->

<a href="#top-page"  class="to-top js-scroll-trigger" style="background-color: #420175 !important;"><i class="fa fa-arrow-up"></i></a>
<script src='{{asset('user/home/assets/js/jquery.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/bootstrap.bundle.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/swiper.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/waypoints.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/counterup.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/isotope.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/lightcase.js')}}'></script>
<script src='{{asset('user/home/assets/js/wow.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/jquery-easeing.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/jquery.countdown.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/scroll-nav.js')}}'></script>
<script src='{{asset('user/home/assets/js/simpleParallax.js')}}'></script>
<script src='{{asset('user/home/assets/js/flip.min.js')}}'></script>
<script src='{{asset('user/home/assets/js/functions.js')}}'></script>
<script src='{{asset('user/home/assets/js/webfont.js')}}'></script>
<livewire:scripts />
{{--<script src="{{asset('js/app.js')}}"></script>--}}
<script  src="{{asset('admin/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(68, 4, 97)">
          <h5 class="modal-title text-center" id="exampleModalLabel" style="color: white;text-align:center">Contact Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('user.message') }}">
            @csrf
            <div class="modal-body">
                    <span class="required" style="color: red">* Required</span>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label">
                                <span class="required">*</span> Name:</label>
                                <div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last" required>
                                </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="org" class="control-label">
                                <span class="required">*</span> Organisation:</label>
                                <div>
                                <input type="text" class="form-control" id="organisation" name="organisation" placeholder="Organisation" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">
                                <span class="required">*</span> Email: </label>
                                <div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@domain.com" required>
                                </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="control-label">
                                <span class="required">*</span> Phone:</label>
                                <div>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+277..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message" class="control-label">
                            <span class="required">*</span> Message:</label>
                            <div>
                            <textarea name="message" rows="4" required class="form-control" id="message" placeholder="type..."></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" style="background-color: rgb(56, 5, 97)">Send Message</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</html>
