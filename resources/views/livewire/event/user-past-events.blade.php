<div>
    <div class="slider">
        <div class="tp-banner-container" wire:ignore>

        </div><!-- REVOLUTION SLIDER -->
    </div><!-- Slider -->

    <div class="slider-bar">
        <div class="container">
            <div class="bottom-bar">
                <div class="row">
                    <div class="col-md-6 column">
                        <br>
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
                            <span>WE'VE ORGANIZED AWESOME EVENTS</span>
                            <h2>PAST <span>EVENT</span></h2>
                            <p>Past events from mozisha international</p>
                        </div><!-- Title -->

                        <div class="remove-ext">
                            @if($upcomings)
                                @foreach($upcomings as $up)
                                    <div class="upcoming-event">
                                        <div class="event-detail">
                                            <h3>{{ Str::limit($up->theme, $limit = 45, $end = '...') }}</h3>
                                            <span><img src="{{asset('event/images/event-icon.png')}}" alt="" /> {{$up->location}}</span>
                                            <p>
                                                {{ Str::limit($up->details, $limit = 250, $end = '...') }}  <a href="event/{{$up->slug}}"  class="btn btn-primary" style="color: white; background-color: #420175; border-color: #420175;">View event</a>
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
                            @else
                                <div>
                                    <p>OUR EVENT LIST IS EMPTY, PLEASE CHECK BACK LATER.</p>
                                </div>
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
