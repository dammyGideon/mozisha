<div>


    <!-- page header start -->
    <section class="page-header">
        <div class="page-header-content">
            <div class="container">
                <div class="page-header-text">
                    <h2>Testimonial</h2>
                    <p>We connect learners with mentors/Business</p>
                </div>
            </div>
        </div>
    </section>
    <!-- page header end-->



    <!--service list section start-->
    <section class="inner-page about-page">
        <div class="inner-page-header">
            <div class="container p-0">
                <div class="section-header inner-style2">
                    <h2 class="title">People transformed<br>through Mozisha International</h2>
                    <p class="desc mb-0">We provide some of of the beneficiaries of Mozisha International, people who got connected to a mentor
                    or a business for apprenticeship, people who benefited from events, scholarship and various programs organized
                        by Mozisha International.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--service list section end-->


    <!-- testimonial section start -->
    <section class="da-testimonial-section bg-ash-color pb--60 pb--60 pb_lg--100 pt_lg--100">
        <div class="container">
            <div class="da-testimonial-container da-testimonial-container1">
                <div class="">

                    @if($testimonials)
                        @foreach($testimonials as $test)
                    <div class="swiper-slide">
                        <div class="testimonial-body d-flex flex-wrap justify-content-between">
                            <div class="author-image">
                                <img src="{{$test->ImagePath}}" alt="author">
                            </div>
                            <div class="testimonial-content">
                                <i class="qoute-icon fas fa-quote-left"></i>
                                <div class="rating">
                                    @if($test->rating == 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    @endif
                                    @if($test->rating == 4)

                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                    @endif
                                    @if($test->rating == 3)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                    @endif
                                    @if($test->rating == 2)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                    @endif
                                    @if($test->rating == 1)
                                            <i class="fa fa-star"></i>
                                    @endif
                                </div>
                                <p class="text">{{$test->testimony}}</p>
                                <h6 class="name">{{$test->last_name . '  '. $test->first_name}}</h6>
                                <p class="designation mb-0">{{$test->profession}}</p>
                                <ul class="da-social-media-list d-flex flex-wrap justify-content-between list-unstyled justify-content-center" style="width: 20% !important;">
                                    <li style="margin: auto !important; text-align: center;"><a class="linkedin" href="{{$test->linkedin}}"><i class="fa fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                            <br><hr>
                        @endforeach
                       {{ $testimonials->links('components.user.pagination-links') /* For pagination links */}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->


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
