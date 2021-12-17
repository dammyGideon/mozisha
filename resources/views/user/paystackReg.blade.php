<!DOCTYPE html>
<html lang="en" xmlns:livewire="">
<head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="copyright" content="Copyright-Mozisha.net: {{date("Y", time())}}" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


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

    <div class="container">
        <div class="mt-5"></div>
        <h2>Payment can be made once or Installment. Course price is $100</h2>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
               <marquee>For Every Payment Before January there will be 20% discount</marquee>


               @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{ session()->get('msg') }}
                    </div>
                @endif

                <form method="POST" action="{{asset('user/paystackReg')}}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">


                        <label for="inputEmail4">Email</label>
                        <input type="email"name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4"  placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                      <div class="form-group">
                        <label for="inputPassword4">Name</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="name4" placeholder="Password">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                  
                      
                   
                    <div class="form-group">
                        <label for="course">Payment</label>
                        <select class="form-control @error('course') is-invalid @enderror" name="amount">
                          <option selected>Choose...</option>
                          <option value="{{16406 * 100}}">Half Payment</option>
                          <option value="{{32812 * 100}}">Full payment </option>

                        </select>

                        @error('payemtn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                    <div class="form-group">
                      <label for="course">Course</label>
                      <select class="form-control @error('course') is-invalid @enderror" name="course">
                        <option selected>Choose...</option>
                        <option value="Data Analytics">Data Analytics</option>
                        <option value="Digital Marketing/Copy Writing">Digital Marketing/Copy Writing</option>
                        <option value="Graphics and Animation">Graphics and Animation</option>
                      </select>

                      @error('course')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    <input type="hidden" name="currency" value="NGN">

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" value="Pay Now!">
                                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                </button>
                            </div>


                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>





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
