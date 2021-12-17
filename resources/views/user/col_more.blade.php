
@extends('layouts.user.home.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        <div>

            <section class="page-header style2 about">
                <div class="page-header-content">
                    <div class="container">
                        <div class="page-header-text">
                            <h2>Collaboration</h2>
                            <p class="mb-0">We help you expand your capabilities.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page header end-->



            <!--service list section start-->
            <section class="inner-page about-page">
                <div class="inner-page-header">
                    <div class="container pl-5 pr-5 p-lg-0">
                        <div class="bz-section-header inner-style2">
                            <h2 class="title">Mozisha<br>Collaboration Platform</h2>
                            <p class="desc mb-0">
                                Mozisha’s collaboration provides users with a platform to network and share ideas with other young people across Africa.

                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!--service list section end-->




            <!--  acton section start -->
            <section class="action-section style2 pt--60 pb--60 pt_lg--100 pb_lg--100" style="background-color: #420175 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 p-0">
                            <div class="action-content text-center mb-4 mb-lg-0 text-lg-left">
                                <h4 class="title"> So what's Next? Convinced to join our platform? Get Started Now! </h4>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center text-lg-right p-0">
                            <a href="{{route('user.account')}}" class="da-custom-btn btn-border-radius40 btn-solid"><span>Get started Here</span></a>
                        </div>
                    </div>
                </div>
            </section>
            <!--  acton section end  -->
        </div>


    </div>
    <!-- /.content-wrapper -->


@endsection
