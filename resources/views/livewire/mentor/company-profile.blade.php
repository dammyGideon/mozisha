<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mentor Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Business Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">

                    <!-- Mentor Widget -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mentor-widget">
                                <div class="user-info-left align-items-center">
                                    <div class="mentor-img d-flex flex-wrap justify-content-center">
                                        <div class="change-avatar" style="margin-bottom: 20px;" >
                                            <img src="{{$user->ImagePath}}" style="border-radius: 100px; max-width: 100px;"  alt="User Image">
                                        </div>
                                        <div class="mentor-details m-0">
                                            <p class="user-location m-0"><i class="fas fa-map-marker-alt"></i> {{$detail->address}}</p>
                                        </div>
                                    </div>
                                    <div class="user-info-cont">
                                        <h4 class="usr-name">{{$user->name}}</h4>
                                        @if($company)
                                        <p class="mentor-type">{{$company->name}}</p>
                                        @endif
                                        <div class="mentor-action">
                                            <p class="mentor-type social-title">{{Auth::user()->email}}</p>
{{--                                            <a href="/chat/page" class="btn-blue">--}}
{{--                                                <i class="fas fa-comments"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="chat.html" class="btn-blue">--}}
{{--                                                <i class="fas fa-envelope"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="javascript:void(0)" class="btn-blue" data-toggle="modal" data-target="#voice_call">--}}
{{--                                                <i class="fas fa-phone-alt"></i>--}}
{{--                                            </a>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info-right d-flex align-items-end flex-wrap">
                                    <div class="hireme-btn text-center">
                                        <span class="hire-rate" style="color: #420175;"><small>Print profile</small></span>
                                        <a class="blue-btn-radius"  style="border-color: #420175; background-color: #420175;" href="{{route('mentor.profile.settings')}}">Edit profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Mentor Widget -->

                    <!-- Mentor Details Tab -->
                    <div class="card">
                        <div class="card-body custom-border-card pb-0">

                            <!-- About Details -->
                            <div class="widget about-widget custom-about mb-0">
                                <h4 class="widget-title">About Company</h4>
                                <hr/>
                                @if($company)
                                <p>{{$about->biography}}</p>
                                @endif
                            </div>
                            <!-- /About Details -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body custom-border-card pb-0">

                            <!-- Personal Details -->
                            <div class="widget education-widget mb-0">
                                <h4 class="widget-title">Company Details</h4>
                                <hr/>
                                <div class="experience-box">
                                    <ul class="experience-list profile-custom-list">
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Company Name</span>
                                                    @if($company)
                                                    <div class="row-result">{{$company->name}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Uploaded Document</span>
                                                    @if($about)
                                                    <div class="row-result"><a target="_blank" href="{{$about->ResumePath}}"> {{$about->resume_original_name}}</a></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Industry</span>
                                                    @if($company)
                                                    <div class="row-result">{{$company->industry}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Your position?</span>
                                                    @if($company)
                                                    <div class="row-result">{{$company->position}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Personal Details -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body custom-border-card pb-0">

                            <!-- Qualification Details -->
                            <div class="widget experience-widget mb-0">
                                <h4 class="widget-title">Apprenticeship</h4>
                                <hr/>
                                <span>Comapny Info</span>
                                @if($company)
                                <div><small>{{$company->description}}</small></div>
                                @endif
                                <hr>
                                <div class="experience-box">
                                    <ul class="experience-list profile-custom-list">
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Comapany website</span>
                                                    @if($company)
                                                    <div class="row-result">{{$company->website}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Interested Apprenticeships</span>

                                                    @foreach($duty as $d)
                                                    <div class="row-result"> -> {{$d->duty}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Interested Field</span>
                                                    @foreach($help as $h)
                                                    <div class="row-result">-> {{$h->help}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- /Qualification Details -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body pb-1 custom-border-card">

                            <!-- Location Details -->
                            <div class="widget awards-widget m-0">
                                <h4 class="widget-title">Location</h4>
                                <hr/>
                                <div class="experience-box">
                                    <ul class="experience-list profile-custom-list">
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Address 1</span>
                                                    <div class="row-result">{{$detail->address}}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Address 2</span>
                                                    <div class="row-result">{{$detail->address_2}}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Country</span>
                                                    <div class="row-result">{{$detail->country}}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>City</span>
                                                    <div class="row-result">{{$detail->city}}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>State</span>
                                                    <div class="row-result">{{$detail->state}}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <span>Postal Code</span>
                                                    <div class="row-result">{{$detail->zipcode}}</div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Location Details -->

                        </div>
                    </div>
                    <!-- /Mentor Details Tab -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>

