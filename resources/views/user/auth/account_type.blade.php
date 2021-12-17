@extends('layouts.user.auth.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Page Content -->
        <div class="content success-page-cont" style="margin-top: 40px;">
            <div class="container-fluid ">
                <div style="text-align: center;" class="justify-content-center">
                    <x-alert />
                    <h1 style="font-size: 350%;">Mozisha Registration</h1>
                    <p>Please select type of account you’d like to create on Mozisha.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 row-lg-2">

                        <!-- Success Card -->
                        <div class="card success-card">
                            <div class="card-body">
                                <div class="success-cont">
                                    <i class="fas fa-check" style="background-color: #420175; border-color: #420175;"></i>
                                    <h3>Apprentice!</h3>
                                    <p>I'd like to have a mentor.</p>
                                    <a  href="{{route('mentee.register')}}" class="btn btn-primary view-inv-btn" style="background-color: #420175;">Register Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Success Card -->

                    </div>
                    <div class="col-lg-4 row-lg-2">

                        <!-- Success Card -->
                        <div class="card success-card">
                            <div class="card-body">
                                <div class="success-cont">
                                    <i class="fas fa-check" style="background-color: #420175; border-color: #420175;"></i>
                                    <h3>Mentor!</h3>
                                    <p>I'd like to expand my business</p>
                                    <a href="{{route('mentor.register')}}" class="btn btn-primary view-inv-btn" style="background-color: #420175;">Register Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Success Card -->

                    </div>
                </div>
                <div style="text-align: center;" class="justify-content-center">
                    <p>If you Already have an account? <a href="{{route('login')}}" style="color: purple">Log in</a> .</p>
                </div>
                <br>

            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /.content-wrapper -->


@endsection
