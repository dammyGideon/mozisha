<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mentee Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Profile Information</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->


    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Mentor Widget -->
            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body">
                    <div class="mentor-widget">
                        <div class="user-info-left align-items-center">
                            <div class="mentor-img d-flex flex-wrap justify-content-center">
                                <div class="change-avatar" style="margin-bottom: 20px;" >
                                    <img src="{{$user->ImagePath}}" style="border-radius: 100px; max-width: 100px;"  alt="User Image">
                                </div>
                                <div class="mentor-details m-0">
{{--                                    <p class="user-location m-0"><i class="fas fa-map-marker-alt"></i>{{$detail->address}}</p>--}}
                                </div>
                            </div>

                            <div class="user-info-cont">
                                <h4 class="usr-name">{{$user->name}}</h4>
                                @if($education)
                                <p class="mentor-type">{{$education->degree}} ({{$education->course}})</p>
                                @endif
                                <div class="mentor-action">
                                    <p class="mentor-type social-title">{{Auth::user()->email}}</p>
{{--                                    <a href="javascript:void(0)" class="btn-blue" style="background-color: #9A4EAE; border-color: #9A4EAE;">--}}
{{--                                        <i class="fas fa-comments"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="chat.html" class="btn-blue" style="background-color: #9A4EAE; border-color: #9A4EAE;">--}}
{{--                                        <i class="fas fa-envelope"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="" class="btn-blue"  style="background-color: #9A4EAE; border-color: #9A4EAE;"data-toggle="modal" data-target="#voice_call">--}}
{{--                                        <i class="fa fa-whatsapp"></i>--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="user-info-right d-flex align-items-end flex-wrap">
                            <div class="hireme-btn text-center">
                                <a class="blue-btn-radius"  style="border-color: #420175; background-color: #420175;" href="{{route('mentee.profile.settings')}}">Edit Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Mentor Widget -->

            <!-- Mentor Details Tab -->
            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body custom-border-card pb-0">

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Biography Content -->
                        <div role="tabpanel" id="biography" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- About Details -->
                                    <div class="widget about-widget custom-about mb-0">
                                        <h4 class="widget-title">About Me</h4>
                                        <hr/>
                                        @if($about)
                                        <p>{{$about->biography}}</p>
                                        @endif
                                          </div>
                                    <!-- /About Details -->

                                </div>
                            </div>
                        </div>
                        <!-- /biography Content -->

                    </div>
                </div>
            </div>

            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body custom-border-card pb-0">

                    <!-- Personal Details -->
                    <div class="widget education-widget mb-0">
                        <h4 class="widget-title">Personal Details</h4>
                        <hr/>
                        <div class="experience-box">
                            <ul class="experience-list profile-custom-list">
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>First Name</span>
                                            <div class="row-result">{{$detail->firstname}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Last Name</span>
                                            <div class="row-result">{{$detail->lastname}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Phone number</span>
                                            <div class="row-result">{{$detail->phone}}</div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Gender</span>
                                            <div class="row-result">{{$detail->gender}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Age</span>
                                            <div class="row-result">{{$detail->age}}</div>
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

                            </ul>
                        </div>
                    </div>
                    <!-- /Personal Details -->

                </div>
            </div>

            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body custom-border-card pb-0">
                    <h4 class="widget-title">Educational Information</h4>
                @if($educations)
                    @foreach($educations as $education)
                    <!-- Qualification Details -->
                    <div class="widget experience-widget mb-0">

                        <hr/>

                        <div class="experience-box">
                            <ul class="experience-list profile-custom-list">


                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>College Attended</span>
                                            @if($education)
                                            <div class="row-result">{{ Str::limit($education->school, 30) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Undergraduate Major</span>
                                            @if($education)
                                            <div class="row-result">{{$education->course}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Undergraduate period</span>
                                            @if($education)
                                            <div class="row-result">{{$education->start_year. ' - ' .$education->end_year}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Type of Degree</span>
                                            @if($education)
                                            <div class="row-result">{{$education->degree}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>




                    </div>
                    <!-- /Qualification Details -->
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body custom-border-card pb-0">

                    <!-- Qualification Details -->
                    <div class="widget experience-widget mb-0">
                        <h4 class="widget-title">Skills</h4>
                        <hr/>
                        <div class="experience-box">
                            <ul class="experience-list profile-custom-list">
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Needed Experience</span>
                                            @foreach($neededExperience as $experience)
                                            <div class="row-result">{{$experience->experience}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Industrial interest</span>
                                            @foreach($industry as $ind)
                                                <div class="row-result">{{$ind->industry}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Personal Interest</span>
                                            @foreach($personalInterest as $interest)
                                                <div class="row-result">{{$interest->interest}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Familiar tools</span>
                                            @foreach($tool as $t)
                                                <div class="row-result">{{$t->tool}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Current location</span>
                                            @if($about)
                                            <div class="row-result">{{$about->location}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Military status</span>
                                            @if($about)
                                            @if($about->military)
                                                <div class="row-result">{{$about->military}}</div>
                                            @else
                                                <div class="row-result">Not</div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Qualification Details -->

                </div>
            </div>

            <div class="card col-10 mr-auto ml-auto p-0">
                <div class="card-body custom-border-card pb-0">

                    <!-- Qualification Details -->
                    <div class="widget experience-widget mb-0">
                        <h4 class="widget-title">Work Experience</h4>
                        <hr/>
                        @foreach($workExperience as $work)
                        <div class="experience-box">
                            <ul class="experience-list profile-custom-list">
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Role title</span>
                                                <div class="row-result">{{$work->title}}</div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Type</span>
                                                <div class="row-result">{{$work->type}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Company</span>

                                                <div class="row-result">{{$work->company}}</div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Location</span>
                                            <div class="row-result">{{$work->location}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Last updated</span>
                                            <div class="row-result">{{$work->updated_at->diffForHumans()}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <span>Period of service</span>
                                                <div class="row-result">{{$work->start_month. ', ' .$work->start_year . ' - ' . $work->end_month. ', ' .$work->end_year }}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr/>
                            <h4 class="widget-title" style="text-align: center;">Job description</h4>
                            <hr/>
                            <p>{{$work->description}}</p>
                        </div>
                        @endforeach

                    </div>
                    <!-- /Qualification Details -->

                </div>
            </div>



        </div>
    </div>
    <!-- /Page Content -->
</div>
