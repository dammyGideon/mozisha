<!DOCTYPE html>
<html lang="en" xmlns:livewire="">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="{{$data['description']}}" />
    <meta name="keywords" content="{{$data['keywords']}}" />
    <meta name="DC.title" content="{{$data['dc_title']}}" />
    <meta name="copyright" content="Copyright-Mozisha.net: {{date("Y", time())}}" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{$data['title']}}</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('user/img/cdiya.png')}}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('user/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/plugins/fontawesome/css/all.min.css')}}">
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{asset('user/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datetimepicker.min.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('user/plugins/select2/css/select2.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/toastr.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--Laravel livewire styles  -->
    <livewire:styles />
</head>
<style>
    .btn-primary{
        background-color: #420175;
    }
    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .account-box{
            max-width: 70% !important;
        }
    }

    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .account-box{
            max-width: 100% !important;
        }
    }
</style>
<!-- Loader -->
<body>
<!-- /Loader  -->
<!-- Header -->
<header class="header">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
					    		</span>
                </a>
                @if(Auth::user()->hasRole('mentor'))
                    <a href="{{route('homepage')}}" class="navbar-brand logo">

                        <img src="{{asset('user/img/logo-purple.png')}}" class="img-responsive" alt="Logo">
                    </a>
                @endif
                @if(Auth::user()->hasRole('mentee'))
                    <a href="{{route('homepage')}}" class="navbar-brand logo">

                        <img src="{{asset('user/img/logo-purple.png')}}" class="img-responsive" alt="Logo">
                    </a>
                @endif

            </div>
            <div class="main-menu-wrapper">
                @if(Auth::user()->hasRole('mentee'))
                <div class="menu-header">
                    <a href="{{route('homepage')}}" class="menu-logo">
                        <img src="{{asset('user/img/logo-purple.png')}}" class="img-responsive"  alt="Logo">
                        <!-- <img src="assets/img/logo.png" class="img-fluid" alt="Logo"> -->
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                @endif
                @if(Auth::user()->hasRole('mentor'))
                        <div class="menu-header">
                            <a href="{{route('homepage')}}" class="menu-logo">
                                <img src="{{asset('user/img/logo-purple.png')}}" class="img-responsive"  alt="Logo">
                                <!-- <img src="assets/img/logo.png" class="img-fluid" alt="Logo"> -->
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                 @endif
                @if(Auth::user()->hasRole('mentor'))
                    <ul class="main-nav">
                        <!-- <li class="">

                            <a href="index-2.html">Home</a>
                        </li> -->

                        <li class="has-submenu ">
                            <a >Explore <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class=""><a href="{{route('mentor.dashboard')}}">Dashboard</a></li>
                                <li class=""><a href="{{route('mentor.apprenticeship.new')}}">Post Apprenticeship</a></li>

                                @if(Session::get('conn'))
                                <li class=""><a target="_blank" href="{{route('mentor.chatroom', Session::get('conn')->connect_id_string)}}">Messenger</a></li>
                                @endif
                                <li class="has-submenu">
                                    <a href="#">Modules</a>
                                    <ul class="submenu">
                                        <li><a href="#">E-learning</a></li>
                                        <li><a href="#">Forum</a></li>
                                        <li><a href="#">Freelancing</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="{{route('mentor.apprenticeships')}}">My Apprenticeships</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu ">
                            <a href="#">Profile <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class=""><a href="{{route('mentor.profile')}}">Support</a></li>
                                <li class="has-submenu">
                                    <a href="#">Business</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('mentor.profile')}}">Information</a></li>
                                        <li><a href="{{route('mentor.profile.settings')}}">Update</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="{{route('logout')}}">Reset Password</a></li>
                                <li class=""><a href="{{route('logout')}}">Logout</a></li>

                            </ul>
                        </li>

                        @if(Session::get('conn'))
                            <li class=""><a target="_blank" href="http://127.0.0.1:5000/chatroom/{{Session::get('conn')->mentor_id}}/{{Session::get('conn')->mentee_id}}/{{Session::get('conn')->connect_id_string}}">Messenger</a></li>
                        @endif
                        <li class="">
                            <a href="{{route('logout')}}"> Logout </a>
                        </li>

                    </ul>
                @endif
                    @if(Auth::user()->hasRole('mentee'))
                    <ul class="main-nav">
                        <!-- <li class="">
                            <a href="index-2.html">Home</a>
                        </li> -->

                        <li class="has-submenu ">
                            <a >Explore <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class=""><a href="{{route('mentee.dashboard')}}">Dashboard</a></li>
                                <li class=""><a href="{{route('mentee.apprenticeship.find')}}">Find Apprenticeship</a></li>
                                @if(Session::get('conn'))

                                <li class=""><a target="_blank" href="{{route('mentee.chatroom', Session::get('conn')->connect_id_string)}}">Messenger</a></li>
                                @endif
                                <li class="has-submenu">
                                    <a href="invoices.html">Modules</a>
                                    <ul class="submenu">
                                        <li><a href="#">E-learning</a></li>
                                        <li><a href="#">Forum</a></li>
                                        <li><a href="#">Freelancing</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="#">E-learning</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu ">
                            <a href="">Profile <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class=""><a target="_blank" href="#">Support</a></li>
                                <li class="has-submenu">
                                    <a href="#">Profile</a>
                                    <ul class="submenu">
                                        <li><a href="{{route('mentee.profile')}}">Information</a></li>
                                        <li><a href="{{route('mentee.profile.settings')}}">Update</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="{{route('logout')}}">Reset Password</a></li>
                                <li class=""><a href="{{route('logout')}}">Logout</a></li>

                            </ul>
                        </li>

                        <li class="">
                            <a href="#">Support</a>
                        </li>

                        <li class="">
                            <a href="{{route('logout')}}">Logout </a>
                        </li>

                    </ul>
                @endif



            </div>

            <ul class="nav header-navbar-rht">
                @if(Auth::check())
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{Auth::user()->ImagePath}}" width="31" alt="Darren Elder">
								</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-header">
                               <span class="user-img">
									<img class="rounded-circle" src="{{Auth::user()->ImagePath}}" width="31" alt="Darren Elder">
								</span>
                                <div class="user-text">
                                    <h6>{{Auth::user()->name}}</h6>

                                    @if(Auth::user()->hasRole('mentor'))
                                        <p class="text-muted mb-0">Mentor</p>
                                    @elseif(Auth::user()->hasRole('mentee'))
                                        <p class="text-muted mb-0">Apprentice</p>
                                    @elseif(Auth::user()->hasRole('administrator'))
                                        <p class="text-muted mb-0">Admin</p>
                                    @else
                                    <p class="text-muted mb-0">Undefined</p>
                                    @endif


                                </div>
                            </div>
                            @if(Auth::user()->hasRole('mentor'))
                                <a class="dropdown-item" href="{{route('mentor.dashboard')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{route('mentor.profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                            @endif
                            @if(Auth::user()->hasRole('mentee'))
                                <a class="dropdown-item" href="{{route('mentee.dashboard')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{route('mentee.profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                            @endif

                        </div>
                    </li>



                @else

                    @if(Route::currentRouteName() == 'user.login')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('mentee.register')}}">Not a member?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{route('mentor.register')}}">get started</a>
                        </li>
                    @elseif(Route::currentRouteName() == 'mentor.register'  || 'mentee.register')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.login')}}">Already a member?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{route('user.login')}}">Sign in</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{route('mentor.register')}}">get started</a>
                        </li>
                    @endif

                @endif

            </ul>

        </nav>
    </div>
</header>

<div class="main-wrapper">

    <!-- Home Banner -->
    <!-- <section class="section section-search"> -->
    <!-- <div class="container"> -->

    <!-- The main content of the page -->

    @yield('content')

    <!-- End of the main content of the page-->



    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; 2021 Mozisha. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

    </footer>
<!-- /Footer -->
</div>
<!-- Edit Details Modal -->
<div class="modal fade" wire:ignore.self tabindex="-1" id="edit_personal_details" aria-hidden="true" role="dialog">
    <livewire:new-apprenticeship :user="$user">
</div>


<div class="modal fade" wire:ignore.self tabindex="-1" id="mentor-availability" aria-hidden="true" role="dialog">
    @livewire('mentor-availability')
</div>

<div class="modal fade" wire:ignore.self tabindex="-1" id="mentor_new_meeting" aria-hidden="true" role="dialog">
@livewire('mentor-new-meeting')
</div>

@if(Session::has('update_app'))
<div class="modal fade" wire:ignore.self tabindex="-1" id="mentor_apprenticeship_update" aria-hidden="true" role="dialog">
    @livewire('mentor-apprenticeship-update')
</div>
@endif

<div class="modal fade" wire:ignore.self tabindex="-1" id="mentee_update_request" aria-hidden="true" role="dialog">
    @livewire('mentee-update-request')
</div>

<div class="modal fade" wire:ignore.self tabindex="-1" id="mentee_new_meeting" aria-hidden="true" role="dialog">
    @livewire('mentee-new-meeting')
</div>

@if(Session::get('conn'))
<div class="modal fade" wire:ignore.self tabindex="-1" id="app_rating" aria-hidden="true" role="dialog">
    @livewire('apprenticeship-rating')
</div>
@endif


<!-- /Edit Details Modal -->
<livewire:scripts />
<!-- jQuery -->
<script src="{{asset('user/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('user/js/popper.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('user/plugins/select2/js/select2.min.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{asset('user/js/moment.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('user/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{asset('user/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('user/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<!-- Circle Progress JS -->
<!-- <script src="assets/js/circle-progress.min.js"></script> -->
<!-- Custom JS -->
<script src="{{asset('user/js/script.js')}}"></script>
{{--<script src="{{asset('js/app.js')}}"></script>--}}
<script  src="{{asset('admin/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
<script src="https://cdn.tiny.cloud/1/vgsxkb3lxsc9m2ire6z0r4tlp1elrjc6tn84xuyhterweko7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
    });

</script>
</body>


</html>
