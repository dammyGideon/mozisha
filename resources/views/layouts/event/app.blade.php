<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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






    <title>{{$data['title']}}</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{asset('event/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('event/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('event/css/revolution.css')}}" media="screen" />
    <link rel="stylesheet" href="{{asset('event/css/audioplayer.css')}}" />
    <link rel="stylesheet" href="{{asset('event/css/style.css')}}" type="text/css" />
    <link href="{{asset('event/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('event/css/color/color.css')}}" title="color" />
    <link rel="stylesheet" href="{{asset('admin/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />
</head>
<body>
@if(Route::currentRouteName() == 'events')
<div class="page-loader" >
    <div class="item one" style="background-color: #420175;"></div>
</div><!-- Page Loader -->
@endif

<header>
    <div class="container">
        <div class="logo"><a href="{{route('homepage')}}" title=""><img src="{{asset('user/img/logo-white.png')}}" alt="" /></a></div><!-- Logo -->
        <nav>
            <ul>
                <li><a href="{{route('events')}}" title=""><span><i class="fa fa-home"></i></span>Upcoming Events</a>

                </li>
                <li><a href="{{route('past.events')}}" title=""><span><i class="fa fa-arrow-left"></i></span>Past Events</a>

                </li>
                        </ul>
        </nav><!-- Navigation -->
    </div>
</header><!-- Header -->

<div class="responsive-header" style="">
    <div class="responsive-logo">
        <a href="{{route('homepage')}}" title=""><img src="{{asset('user/img/logo-white.png')}}" alt="Logo" /></a>
    </div><!-- Responsive Logo -->
    <span style="background-color: #420175;"><i class="fa fa-align-justify"></i></span>
    <ul>
        <li><a href="{{route('events')}}" title="">Upcoming Events</a></li>
        <li><a href="{{route('past.events')}}" title="">Past Events</a></li>
    </ul>
</div><!--Responsive header -->



<!-- The main content of the page -->


@yield('content')

<!-- End of the main content of the page-->




<footer>
    <div class="block">

    </div>
</footer><!-- Footer -->
<div class="bottom-footer">
    <div class="container">
        <p>All rights reserved {{Carbon\Carbon::now()->format('Y')}}-<a title="" href="mozisha.com">Mozisha events</a> poweredBy <a title="" href="http://mozisha.com">Smart Developers</a></p>
    </div>
</div><!-- Bottom Footer -->


<!-- /Edit Details Modal -->
<livewire:scripts />
<script type="text/javascript" src="{{asset('event/js/modernizr.custom.97074.js')}}"></script>

<script type="text/javascript" src="{{asset('event/js/jquery2.1.1.js')}}"></script>
<!-- SLIDER REVOLUTION -->
<script type="text/javascript" src="{{asset('event/js/revolution/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/revolution/jquery.themepunch.revolution.min.js')}}"></script>

<script type="text/javascript" src="{{asset('event/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/jquery.downCount.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/audioplayer.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/jquery.downCount.js')}}"></script>
<script type="text/javascript" src="{{asset('event/js/script.js')}}"></script>
<script  src="{{asset('admin/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
<script>
    $(document).ready(function() {
        $('.countdown').downCount({
            date: '06/25/2016 12:00:00',
            offset: +10
        });


        /* =============== Service Carousel ===================== */
        $('.service-carousel').owlCarousel({
            loop: true,
            smartSpeed : 1000,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: true,
            mouseDrag: false,
            items:1,
            margin: 0,
            singleItem: true,
            autoplayHoverPause: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn'
        });

        $( function() { $( 'audio' ).audioPlayer(); } );
    });

    $(window).load(function() {
        /* =============== Fun Facts Counter ===================== */
        $(".counter").counterUp({
            time: 1000
        });

        /* =============== Revolution Slider ===================== */
        var revapi;
        revapi = jQuery('.tp-banner').revolution(
            {
                delay:9000,
                startwidth:1170,
                startheight:768,
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"off"
            });
    });
</script>

</body>

