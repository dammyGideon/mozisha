<!DOCTYPE html>
<html lang="en" xmlns:livewire="">
<head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="{{$data['description']}}" />
    <meta name="keywords" content="{{$data['keywords']}}" />
    <meta name="DC.title" content="{{$data['dc_title']}}" />
    <meta name="copyright" content="Copyright-Mozisha.net: {{date("Y", time())}}" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>{{$data['title']}}</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('user/img/cdiya.png')}}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></link>
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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/toastr.css')}}">
    <script src="{{asset('css/app.css')}}"></script>
    <!--Laravel livewire styles  -->
    <livewire:styles />


</head>
<body>
<style>
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

<!-- /Loader  -->
<!-- Header -->


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
                            <p class="mb-0">&copy; 2020 Mentoring. All rights reserved.</p>
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
<script src="{{asset('user/js/circle-progress.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('user/js/script.js')}}"></script>
{{--<script src="{{asset('js/app.js')}}"></script>--}}

<script  src="{{asset('admin/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>

</body>


</html>
