
@extends('layouts.user.home.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        <div class="coming-soon-page">
            <div class="overlay">
                <div class="coming-soon-container d-flex flex-wrap justify-content-center align-items-center">
                    <div class="coming-soon-content text-center">
                        <h2 style="color: white !important;">Coming Soon!</h2>
                        <p>Stay Tuned, We are launching very soon!</p>
                        <div class="coming-soon-countdown">
                            <div id="countdown" class="countdown d-flex flex-wrap justify-content-center">
                                <div class="count-item">
                                    <div class="count-item-inner">
                                        <div class="count-number days">01</div>
                                        <div class="days_text count-text">Wednesday</div>
                                    </div>
                                </div>
                                <div class="count-item">
                                    <div class="count-item-inner">
                                        <div class="count-number hours">12</div>
                                        <div class="hours_text count-text">December</div>
                                    </div>
                                </div>
                                <div class="count-item">
                                    <div class="count-item-inner">
                                        <div class="count-number minutes">20</div>
                                        <div class="minutes_text count-text">2021</div>
                                    </div>
                                </div>
                                <div class="count-item">
                                    <div class="count-item-inner">
                                        <div class="count-number seconds">21</div>
                                        <div class="seconds_text count-text">2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="coming-soon-social-area">
                        <p>We are launching this product soon, <br>stay tunned and keep all hopes alive.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->


@endsection
