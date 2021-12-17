<div>

    <section>
        <div class="block gray half-parallax blackish remove-bottom">
            <div style="background:url('{{asset('event/images/moz.jpg')}}');" class="parallax"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="page-title">
                            <span>{{$event->theme}}</span>
                            <h1>EVENT <span>DETAILS</span></h1>
                            <p>Below you'll find the full details of this event, Register for the event for further notifications and updates.</p>
                           <a href="/event/subscribe/{{$event->slug}}"><button style="margin-top: 5px;" type="button" class="btn btn-primary" >Register Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 column">
                        <div class="single-post">
                            <div class="single-img">
                                <img src="{{$event->ImagePath}}" alt="" />
                            </div>
                            <h3>{{$event->theme}}</h3>
                            <div class="bar">
                                <div class="social">
{{--                                    <a title="" href="#"><i class="fa fa-facebook-square"></i></a>--}}
{{--                                    <a title="" href="#"><i class="fa fa-twitter-square"></i></a>--}}
                                    <a title="" href="https://www.facebook/mozisha"><i class="fa fa-linkedin-square"></i></a>
                                    <a title="" href="mailto:kene@mozisha.com"><i class="fa fa-google-plus-square"></i></a>
                                </div>
                                @if($ceo)
                                    <span><i class="fa fa-user"></i> <a href="#" title="">{{$ceo->last_name}} {{$ceo->first_name}}</a></span>
                                @endif

                                <span><i class="fa fa-user"></i> <a href="#" title="">CEO</a></span>
                                <span><i class="fa fa-user"></i> <a href="#" title="">Mozisha International</a></span>
                            </div>
                            <div class="event-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="abt-event">
                                            <h4>EVENT DETAILS</h4>
                                            <ul>
                                                <li>START DATE: {{$event->start_date}}</li>
                                                <li>START: {{$event->start_hour}}:{{$event->start_minute}} {{$event->start_meridian}}</li>
                                                <li>END DATE: {{$event->end_date}}</li>
                                                <li>END: {{$event->end_hour}}:{{$event->end_minute}} {{$event->end_meridian}}</li>
                                                <li>LOCATION: {{$event->location}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="abt-event org" >
                                            <h4>ORGANIZER'S DETAILS</h4>
                                            <ul >
                                                <li>ORGANIZED BY: {{$event->organizer}}</li>
                                                <li>EMAIL : {{$event->organizer_email}}</li>
                                                <li>PHONE NO: {{$event->organizer_phone}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p style="text-align: justify">
                                {!! $event->details !!}
                            </p>
                            <div style="color: maroon">
                                <small>Event's link (Copy to share)</small>
                                <input type="text" value="https://mozisha.com/event/{{$event->slug}}" id="link" class="form-control" >
                                <button style="margin-top: 5px;" type="button" class="btn btn-primary" onclick="copyText()"  >Copy Link</button>
                            </div>
                        </div>
                    </div>

                    <aside class="col-md-3 sidebar column">


                        <div class="widget">
                            <div class="widget-title">
                                <span>HOT EVENTS</span>
                                <h4>UPCOMING <span> EVENTS</span></h4>
                            </div>
                            @if($others)
                                @foreach($others as $other)
                            <div class="video-widget">
                                <div class="video">
                                    <img src="{{$other->ImagePath}}" alt="" class="img-responsive" />
                                    <a href="/event/{{$other->id}}/view" title="{{ Str::limit($other->theme, $limit = 45, $end = '...') }}">
                                        <li class="fa fa-book"></li>
                                    </a>
                                </div>
                                <h3>{{ Str::limit($other->theme, $limit = 45, $end = '...') }}</h3>
                            </div>
                                @endforeach
                            @endif
                        </div><!-- Video Widget -->

                        <div class="widget">
                            <div class="widget-title">
                                <span>JOIN US NOW</span>
                                <h4>JOIN <span>MOZISHA</span></h4>
                            </div>
                            <ul>
                                <li><a target="_blank" href="{{route('mentor.register')}}" title="">Become a mentor</a></li>
                                <li><a target="_blank"  href="{{route('mentee.register')}}" title="">Become an apprentice</a></li>
                                <li><a target="_blank"  href="#" title="">Mozilearn</a></li>
                                <li><a href="{{route('past.events')}}" title="">Past events</a></li>
                            </ul>
                        </div><!-- Meta Data Widget -->


                    </aside>

                </div>



            </div>
        </div>

    </section>



    <section>
        <div class="block remove-gap gray" >
            <div class="container" >
                <div class="row" >
                    <div class="col-md-offset-1 col-md-10 column" >


                        <div class="become-sponsor" >
                            <h3>REGISTER FOR THIS EVENT</h3>
                            <p>Register for this event to be a part of it,you'll get notified first of any available subsequent update concerning the event.</p>
                            <a class="button" href="/event/subscribe/{{$event->slug}}" title="" style="background-color: #420175;">REGISTER NOW</a>
                            @if($event->platform && $event->link)
                            <a class="button" target="_blank" href="{{$event->link}}" title="" style="background-color: #420175;">JOIN EVENT NOW</a>
                            @endif

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section><!-- Become a Sponsor -->



</div>
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
