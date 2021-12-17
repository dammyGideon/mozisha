<div>


<!-- page header start -->
<section class="page-header style2">
    <div class="page-header-content">
        <div class="container">
            <div class="page-header-text">
                <h2>Our Leadership</h2>
                <p></p>
            </div>
        </div>
    </div>
</section>
<!-- page header end-->


<!--  team section start -->
<section class="da-team-section pt--60 pb--10 pt_lg--100 pb_lg--10">
    <div class="circle1">
        <svg x="0px" y="0px"
             viewBox="0 0 141.7 141">
            <circle id="XMLID_1_" class="st0" cx="71" cy="70" r="69"/>
        </svg>
    </div>
    <div class="circle2">
        <svg x="0px" y="0px"
             viewBox="0 0 141.7 141">
            <circle id="XMLID_12_" class="st0" cx="71" cy="70" r="69"/>
        </svg>
    </div>
    <div class="circle3">
        <svg x="0px" y="0px"
             viewBox="0 0 141.7 141">
            <circle id="XMLID_13_" class="st0" cx="71" cy="70" r="69"/>
        </svg>
    </div>
    <div class="container">
        <div class="row m-0 align-items-center">

            <div class="col-lg-8 p-0 order-lg-first left-150">
                <div class="row align-items-center">
                    @if($ceo)
                    <div class="col-md-6">
                        <div class="da-team-item text-center mb--30 mb_lg--0">
                            <div class="team-thumb">
                                <a href="{{route('team.view', $ceo->id)}}">  <img src="{{$ceo->ImagePath}}" alt="team member"></a>
                            </div>
                            <div class="team-content">
                                <h4 class="name">{{$ceo->last_name . ' '. $ceo->first_name }}</h4>
                                <p class="designation" style="">{{$ceo->position}}</p>
                                <ul class="da-social-media-list d-flex flex-wrap justify-content-between list-unstyled justify-content-center">
                                    {{--                                    <li><a class="facebook" href="{{$member->facebook}}"><i class="fa fa-facebook-f"></i></a></li>--}}
                                    {{--                                    <li><a class="twitter" href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li style="margin: auto !important;"><a class="linkedin" href="{{$ceo->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>--}}
{{--                                    --}}{{--                                    <li><a class="behence" href="{{$member->behance}}"><i class="fa fa-behance"></i></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif


                    @if($management)
                        @foreach($management as $member)
                          <div class="col-md-6">

                        <div class="da-team-item text-center mb--30 mb_lg--0">
                            <div class="team-thumb">
                                <a href="{{route('team.view', $member->id)}}"> <img src="{{$member->ImagePath}}" alt="team member"></a>
                            </div>
                            <div class="team-content">
                                <h4 class="name">{{$member->last_name . ' '.$member->first_name }}</h4>
                                <p class="designation" >{{$member->position}}</p>


                                <ul class="da-social-media-list d-flex flex-wrap justify-content-between list-unstyled justify-content-center">
{{--                                    <li><a class="facebook" href="{{$member->facebook}}"><i class="fa fa-facebook-f"></i></a></li>--}}
{{--                                    <li><a class="twitter" href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li style="margin: auto !important;"><a class="linkedin" href="{{$member->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>--}}
{{--                                    <li><a class="behence" href="{{$member->behance}}"><i class="fa fa-behance"></i></a></li>--}}
                                </ul>


                            </div>
                        </div>

                    </div>
                        @endforeach
                    @endif

                    @if($other)
                        @foreach($other as $member)
                           <div class="col-md-6">

                                    <div class="da-team-item text-center mb--30 mb_lg--0">
                                        <div class="team-thumb">
                                            <a href="{{route('team.view', $member->id)}}">  <img src="{{$member->ImagePath}}" alt="team member"></a>
                                        </div>
                                        <div class="team-content">
                                            <h4 class="name">{{$member->last_name . ' '.$member->first_name }}</h4>
                                            <p class="designation" >{{$member->position}}</p>


                                            <ul class="da-social-media-list d-flex flex-wrap justify-content-between list-unstyled justify-content-center">
                                                {{--                                    <li><a class="facebook" href="{{$member->facebook}}"><i class="fa fa-facebook-f"></i></a></li>--}}
                                                {{--                                    <li><a class="twitter" href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                                <li style="margin: auto !important;"><a class="linkedin" href="{{$member->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>--}}
{{--                                                --}}{{--                                    <li><a class="behence" href="{{$member->behance}}"><i class="fa fa-behance"></i></a></li>--}}
                                            </ul>


                                        </div>
                                    </div>

                                </div>
                        @endforeach
                     @endif

                        <!--  blog section end  -->

                </div>
            </div>
        </div>
    </div>
</section>
<!--  team section end -->



    <!--service list section start-->
    <section class="inner-page about-page">

        <div class="inner-page-header">

            <div class="container p-0">
                <div class="col-11 col-lg-5 m-auto ml-lg-0">
                    <div class="bz-section-header pb--30 pb_lg--60">
                        <h2 class="title  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Advisory Board</h2>
                    </div>
                </div>
                <div class="row m-0 align-items-center">
                    <div class="col-lg-8 p-0 order-lg-first left-100">
                        <div class="row align-items-center" style=" margin: auto;">



                            @if($advisory)
                                @foreach($advisory as $member)
                                    <div class="col-md-6">

                                        <div class="da-team-item text-center mb--30 mb_lg--0">
                                            <div class="team-thumb">
                                                <a href="{{route('team.view', $member->id)}}"> <img src="{{$member->ImagePath}}" alt="team member"></a>
                                            </div>
                                            <div class="team-content">
                                                <h4 class="name">{{$member->last_name . ' '.$member->first_name }}</h4>
                                                <p class="designation" >{{$member->position}}</p>

                                                <ul class="da-social-media-list d-flex flex-wrap justify-content-between list-unstyled justify-content-center">
                                                    {{--                                    <li><a class="facebook" href="{{$member->facebook}}"><i class="fa fa-facebook-f"></i></a></li>--}}
                                                    {{--                                    <li><a class="twitter" href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                                    <li style="margin: auto !important;"><a class="linkedin" href="{{$member->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>--}}
{{--                                                    --}}{{--                                    <li><a class="behence" href="{{$member->behance}}"><i class="fa fa-behance"></i></a></li>--}}
                                                </ul>


                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif


                        <!--  blog section end  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--service list section end-->


<!--  acton section start -->
    <!--  acton section start -->
    <section class="bz-action-section pt--80 pb--80 pt_lg--120 pb_lg--120" style="background-color: #420175 !important;">
        <div class="col-11 col-lg-5 m-auto">
            <div class="action-content text-center text-lg-left">
                <p class="subtitle  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">So What's Next</p>
                <h2 class="title  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Get Started Now!  <a href="{{route('user.account')}}" class="da-custom-btn btn-border-radius40"><span>Get started</span></a></h2>
            </div>
        </div>
    </section>
    <!--  acton section end  -->
<!--  acton section end  -->
</div>
