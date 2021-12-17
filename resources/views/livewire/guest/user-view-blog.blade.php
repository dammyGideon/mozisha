<section class="page-header">
    <div class="page-header-content">
        <div class="container">
            <div class="page-header-text thumbnail">
                <p style="font-size: 130%; line-height: 1.3em;">{{$blog->title}}</p>
                <hr>
                <p style="font-size: 80%;">Authored by: {{$blog->creator->name}}</p>
            </div>
        </div>
    </div>
</section>
<!-- page header end-->






<!--service list section start-->
<section class="inner-page about-page borderbottom pb--60 pb_lg--80">

    <div class="container">
        <div class="entry-content">
            <div class="post-content">
                <h1 class="title" style="font-size: 150%;">{{$blog->title}}</h1>
                <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                    <li>By <a class="admin" href="#">{{$blog->creator->name}}</a></li>
                    <li>{{$blog->created_at->format('d M, Y')}}</li>
                    <li><a href="#">{{$blog->created_at->diffForHumans()}}</a></li>
                </ul>
                <div class="entry-footer d-flex flex-wrap align-items-center justify-content-between align-items-center">
                    <ul class="tags list-unstyled pl-0 d-flex flex-wrap align-items-center mb-5 mb-lg-0">
                        <li>Categories:</li>
                        <li><a href="/blog/category/Software_development">Software Dev <span style="color: maroon;">{{$softDevNo}}</span></a></li>
                        <li><a href="/blog/category/Entrepreneurship">Entrepreneurship <span style="color: maroon;">{{$entNo}}</span></a></li>
                        <li><a href="/blog/category/Collaboration">Collaboration <span style="color: maroon;">{{$collNo}}</span></a></li>
                        <li><a href="/blog/category/Marketing">Marketing <span style="color: maroon;">{{$markNo}}</span></a></li>
                        <li><a href="/blog/category/Seminars">Seminars <span style="color: maroon;">{{$semNo}}</span></a></li>
                        <li><a href="/blog/category/E-learning">E-learning <span style="color: maroon;">{{$eleNo}}</span></a></li>
                        <li><a href="/blog/category/Freelancing">Freelancing <span style="color: maroon;">{{$freNo}}</span></a></li>
                        <li><a href="/blog/category/Business">Business <span style="color: maroon;">{{$busNo}}</span></a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="main-content">
                    <div class="post-list">



                        <h1 class="title" style="font-size: 150%;">{{$blog->title}}</h1>
                        <hr>
                        <div class="post-item style2">
                            <div class="post-thumb">
                                <a href="#"><img src="{{$blog->ImagePath}}" alt="thumb"></a>
                                <p style="text-align: center;"><em>{{$blog->caption}}</em></p>

                            </div>
                            <div class="post-content">
                                <div class="post-content-inner">

                                    <h6 class="title"><a href="single.html">{{$blog->title}}</a></h6>
                                    <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                                        <li>By <a class="admin" href="#">{{$blog->creator->name}}</a></li>
                                        <li>{{$blog->created_at->format('d M, Y')}}</li>
                                        <li><a href="#">{{$commentNo}} comments</a></li>
                                    </ul>
                                    <div class="swiper-wrapper">
                                        <div style="margin-top: 20px; width: 100%;">

                                            {!! $blog->content !!}

                                                <div class="swiper-slide">
                                                    @if($blog->continue_image_1)
                                                    <img class="thumbnail img-responsive" src="{{$blog->Continue1ImagePath}}" alt="thumb">
                                                    <p style="text-align: center;"><em>{{$blog->caption_1}}</em></p>
                                                    @endif
                                                    {!! $blog->continue_1 !!}

                                                    @if($blog->continue_image_2)
                                                    <img class="thumbnail img-responsive" src="{{$blog->Continue2ImagePath}}" alt="thumb">
                                                    <p style="text-align: center;"><em>{{$blog->caption_2}}</em></p>
                                                    @endif
                                                    {!! $blog->continue_2 !!}

                                                    @if($blog->continue_image_3)
                                                     <img class="thumbnail img-responsive" src="{{$blog->Continue3ImagePath}}" alt="thumb">
                                                     <p style="text-align: center;"><em>{{$blog->caption_3}}</em></p>
                                                    @endif
                                                     {!! $blog->continue_3 !!}

                                                        @if($blog->continue_image_4)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue4ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_4}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_4 !!}

                                                        @if($blog->continue_image_5)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue5ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_5}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_5 !!}

                                                        @if($blog->continue_image_6)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue6ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_6}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_6 !!}

                                                        @if($blog->continue_image_7)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue7ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_7}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_7 !!}

                                                        @if($blog->continue_image_8)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue8ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_8}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_8 !!}

                                                        @if($blog->continue_image_9)
                                                            <img class="thumbnail img-responsive" src="{{$blog->Continue9ImagePath}}" alt="thumb">
                                                            <p style="text-align: center;"><em>{{$blog->caption_9}}</em></p>
                                                        @endif
                                                        {!! $blog->continue_9 !!}

                                                </div>






                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-wrapper">
                                    <div style="color: maroon; width: 100%;">
                                        <small>Blog's link (Copy to share)</small>
                                        <input type="text" value="https://mozisha.com/blog/{{$blog->slug}}" id="link" class="form-control">
                                        <button type="button" style="margin-top: 5px;" class="btn btn-primary" onclick="copyText()"  >Copy Link</button>
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div>
                                    <a href="{{url()->previous()}}" class="da-custom-btn btn-border-radius40"><span>Go back</span></a>
                                    <a href="{{route('blog')}}" class="da-custom-btn btn-border-radius40"><span>Explore More</span></a>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>
            </div>

            <!--sidebar-->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="widget">
{{--                        <form action="#" class="search-form">--}}
{{--                            <input type="text" name="search" placeholder="Search...">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </form>--}}
                    </div>

                    <div class="widget">
                        <h6 class="widget-title">Catagories</h6>
                        <ul class="list-unstyled pl-0 cata-post-list">
                            <li><a href="/blog/category/Software_development">Software Dev <span style="color: maroon;">{{$softDevNo}}</span></a></li>
                            <li><a href="/blog/category/Entrepreneurship">Entrepreneurship <span style="color: maroon;">{{$entNo}}</span></a></li>
                            <li><a href="/blog/category/Collaboration">Collaboration <span style="color: maroon;">{{$collNo}}</span></a></li>
                            <li><a href="/blog/category/Marketing">Marketing <span style="color: maroon;">{{$markNo}}</span></a></li>
                            <li><a href="/blog/category/Seminars">Seminars <span style="color: maroon;">{{$semNo}}</span></a></li>
                            <li><a href="/blog/category/E-learning">E-learning <span style="color: maroon;">{{$eleNo}}</span></a></li>
                            <li><a href="/blog/category/Freelancing">Freelancing <span style="color: maroon;">{{$freNo}}</span></a></li>
                            <li><a href="/blog/category/Business">Business <span style="color: maroon;">{{$busNo}}</span></a></li>
                        </ul>
                    </div>


{{--                    <div class="widget">--}}
{{--                        <h6 class="widget-title">Tags</h6>--}}
{{--                        <ul class="list-unstyled pl-0 tag-list">--}}
{{--                            <li><a href="#">Web Design</a></li>--}}
{{--                            <li><a href="#">Marketing</a></li>--}}
{{--                            <li><a href="#">UI/UX</a></li>--}}
{{--                            <li><a href="#">Developement</a></li>--}}
{{--                            <li><a href="#">Photography</a></li>--}}
{{--                            <li><a href="#">E-commerce</a></li>--}}
{{--                            <li><a href="#">WordPress</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}


                    <div class="widget">
                        <h6 class="widget-title">Recent Post</h6>
                        <div class="recent-post">
                            <div class="recent-post-container">
                                <div class="swiper-wrapper">

                                    @if($randomBlogs)
                                        @foreach($randomBlogs as $post)
                                    <div class="swiper-slide">
                                        <div class="post-item">
                                            <div class="post-thumb">
                                                <a href="/blog/{{$post->slug}}"><img src="{{$post->ImagePath}}" alt="thumb"></a>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="recent-post-next-btn"><i class="fas fa-angle-left"></i></div>
                            <div class="recent-post-prev-btn"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--service list section end-->


<!--service list section start-->
<section class="inner-page single-page borderbottom">
    @livewire('comment-form', ['blog' => $blog])
</section>
<!--service list section end-->

<!--  acton section start -->
<section class="bz-action-section pt--80 pb--80 pt_lg--120 pb_lg--120" style="background-color: #420175 !important;">
    <div class="col-11 col-lg-5 m-auto">
        <div class="action-content text-center text-lg-left">
            <p class="subtitle  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">So What's Next</p>
            <h2 class="title  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Get Started Now!  <a href="#" class="da-custom-btn btn-border-radius40"><span>Get started</span></a></h2>
        </div>
    </div>
</section>
<!--  acton section end  -->
<script>
    function copyText() {
        var copyText = document.getElementById("link");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");

        // Display a success toast, with a title
        toastr.success(copyText.value, 'Link copied successfully!')
    }
</script>
