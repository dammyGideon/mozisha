<div>
    <div class="slider">
        <div class="tp-banner-container" wire:ignore>
            <div class="tp-banner" wire:ignore>
                <ul>
                    @if($latest)
                        @foreach($latest as $event)
                        <li data-transition="fadetotopfadefrombottom" data-slotamount="10" data-masterspeed="1000" >
                            <img src="{{$event->ImagePath}}"  alt="slidebg3"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <div class="tp-caption sfb box-rotated" data-x="center" data-y="220" data-speed="500" data-start="1000" data-easing="Back.easeOut" data-captionhidden="on" style="width:250px;height:250px;"></div>
                            <div class="tp-caption lft slider-icon" data-x="center" data-y="220" data-speed="2000" data-start="2000" data-easing="Back.easeOut" data-captionhidden="on" style=""><img src="{{asset('event/images/slide-icon.png')}}" alt="" /></div>
                            <div class="tp-caption sfb white-text" data-x="center" data-y="260" data-speed="500" data-start="2500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:13px;">{{strftime("%B", $event->start_time_stamp)}}</div>
                            <div class="tp-caption sfb coloured-text" data-x="center" data-y="290" data-speed="500" data-start="3000" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:20px;">{{strftime("%A", $event->start_time_stamp)}}</div>
                            <div class="tp-caption sft white-text-big" data-x="center" data-y="360" data-speed="500" data-start="3500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:105px;">{{strftime("%d", $event->start_time_stamp)}}</div>
                            <div class="tp-caption sfb white-text" data-x="center" data-y="415" data-speed="500" data-start="2500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:20px;">{{strftime("%Y", $event->start_time_stamp)}}</div>
                            <div class="tp-caption sfb slide-title" data-x="center" data-y="450" data-speed="500" data-start="4000" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:40px; padding:30px 70px;">{{ Str::limit($event->theme, $limit = 40, $end = '...') }}</div>
                            <div class="tp-caption sfb slide-text" data-x="center" data-y="580" data-speed="500" data-start="4500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:15px;">
                                {{ Str::limit($event->details, $limit = 120, $end = '...') }}</div>
                            <div class="tp-caption sfb slide-text" data-x="center" data-y="580" data-speed="500" data-start="4500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:15px; ">
                                <br><a href="event/{{$event->slug}}"  class="btn btn-primary" style="color: white; background-color: #420175; border-color: #420175;">Click for more details...</a></div>

                        </li><!-- Slide 1-->

{{--                        <li data-transition="zoomout" data-slotamount="10" data-masterspeed="500" >--}}
{{--                            <img src="{{asset('event/images/resource/slider.jpg')}}"  alt="slidebg3"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">--}}
{{--                            <div class="tp-caption lft slider-icon" data-x="center" data-y="300" data-speed="2000" data-start="2000" data-easing="Back.easeOut" data-captionhidden="on" style=""><img style="width: 200%" src="{{asset('event/images/cdiya.png')}}" alt="" /></div>--}}
{{--                            <div class="tp-caption sfb slide-title" data-x="center" data-y="450" data-speed="500" data-start="400" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:40px; padding:30px 70px;">ENJOY <strong>THE WHOLE</strong> NIGHT</div>--}}
{{--                            <div class="tp-caption sfb slide-text" data-x="center" data-y="370" data-speed="500" data-start="500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, accusamus, sed, nec essita tibus<br/> ea nemo hic molestias amet tempora fuga pariatur officia itaque eum.</div>--}}
{{--                        </li><!-- Slide 2-->--}}
                        @endforeach
                   @endif
                    @if($latestCount <= 0)
                        <li data-transition="zoomout" data-slotamount="10" data-masterspeed="500" >
                            <img src="{{asset('event/images/resource/slider.jpg')}}"  alt="slidebg3"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <div class="tp-caption lft slider-icon" data-x="center" data-y="300" data-speed="2000" data-start="200" data-easing="Back.easeOut" data-captionhidden="on" style=""><img src="images/crazy-icon.png" alt="" /></div>
                            <div class="tp-caption sfb slide-title2" data-x="center" data-y="240" data-speed="500" data-start="300" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:55px;">WELCOME <strong>TO OUR</strong> EVENT PLATFORM</div>
                            <div class="tp-caption sfb slide-text" data-x="center" data-y="300" data-speed="500" data-start="500" data-easing="Back.easeOut" data-captionhidden="on" style="font-size:15px;">We currently have no scheduled event, subscribe to our event news channel for update and you'll be notified
                                of future events...<br>Feel free to also browse through our previous events and programs for more information about Mozisha.
                            </div>
                        </li><!-- Slide 2-->

                        @endif

                </ul>
            </div>
        </div><!-- REVOLUTION SLIDER -->
    </div><!-- Slider -->

    <div class="slider-bar">
        <div class="container">
            <div class="bottom-bar">
                <div class="row">
                    <div class="col-md-6 column">
                      <livewire:subscribe-mozisha />
                    </div>

                </div>
            </div>
        </div>
    </div><!-- Slider Bar -->


    <section>
        <div class="block  gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="title">
                            <span>WE ORGANIZE AWESOME EVENTS</span>
                            <h2>UPCOMING <span>EVENT</span></h2>
                            <p>Upcoming events from mozisha international</p>
                        </div><!-- Title -->

                        <div class="remove-ext">
                            @if($upcomings)
                                @foreach($upcomings as $up)
                            <div class="upcoming-event">
                                <div class="event-detail">
                                    <h3>{{ Str::limit($up->theme, $limit = 45, $end = '...') }}</h3>
                                    <span><img src="{{asset('event/images/event-icon.png')}}" alt="" /> {{$up->location}}</span>
                                    <p>
                                        {{ Str::limit($up->details, $limit = 250, $end = '...') }}  <a href="event/{{$event->slug}}"  class="btn btn-primary" style="color: white; background-color: #420175; border-color: #420175;">View event</a>
                                    </p>
                                    <ul class="countdown">
                                        <li>
                                            <div class="time-box">
                                                <span class="days">{{$up->start_hour}}</span><p class="days_ref">HOUR</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box">
                                                <span class="hours">{{$up->start_minute}}</span><p class="hours_ref">MINS</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box">
                                                <span class="minutes">{{$up->start_meridian}}</span><p class="minutes_ref">MERI</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box">
                                                <span class="seconds" style="font-size: 70%;">{{$up->start_time_zone}}</span><p class="seconds_ref">ZONE</p>
                                            </div>
                                        </li>

                                    </ul><!-- Event Countdown -->


                                    <span class="event-date" ><strong>{{strftime("%d", $up->start_time_stamp)}}</strong><i>{{strftime("%B", $up->start_time_stamp)}}</i><i>{{strftime("%Y", $up->start_time_stamp)}}</i><li></li></span>
                                </div><!-- Event Details -->
                                <div class="event-img">
                                    <img src="{{$up->ImagePath}}" alt="" />
                                </div><!-- Event Image -->
                            </div><!-- Upcoming Event -->
                                @endforeach
                                    <section>
                                        {{ $upcomings->links('components.user.pagination-links') /* For pagination links */}}
                                    </section>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Upcoming Event Section -->

    <section>
        <div class="block remove-gap gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 column">
                        <div class="become-sponsor">
                            <h3>BECOME A SPONSOR</h3>
                            <p>You can also sponsor some or all our events on mozisha, click on request now to fill in the form now and become our patron. </p>
                            <a class="button" href="{{route('events.patron')}}" title="" style="background-color: #420175;">REQUEST NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Become a Sponsor -->

</div>
