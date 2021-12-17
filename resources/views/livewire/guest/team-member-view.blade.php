<div>


    <!-- page header start -->
    <section class="page-header style2">
        <div class="page-header-content">
            <div class="container">
                <div class="page-header-text">
                    <h2>{{$member->last_name. '  ' . $member->first_name}}</h2>
                    <p>{{$member->team}} | {{$member->position}}</p>
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
                <div class="col-lg-4 p-0 order-lg-last">
                    <div class="section-header text-center text-lg-left pb--60 pb_lg--0">
                        {{--                    <h6 class="subtitle-top font-weight-normal mb-2" style="color: #420175 !important;">Meet the Team</h6>--}}
                        <h3 class="title mb-3" style="color: #420175 !important;">{{$member->last_name. '  ' . $member->first_name}}</h3>
                        <p class="subtitle mb-5">{{$member->details}}

                        </p>

                    </div>
                </div>
                <div class="col-lg-8 p-0 order-lg-first left-100">
                    <div class="row align-items-center">


                                <div class="col-md-12">

                                    <div class="da-team-item text-center mb--30 mb_lg--0">
                                        <div class="">
                                            <a href="{{route('team.view', $member->id)}}"> <img style="max-width: 50%;" src="{{$member->ImagePath}}" alt="team member"></a>
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


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  team section end -->



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
