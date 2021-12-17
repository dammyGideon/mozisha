<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('mentee.apprenticeship.find')}}">{{$app->title}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Apprenticeship profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Apprenticeship Information</h2>
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
                                    <img src="{{$app->creator->ImagePath}}" style="border-radius: 100px; max-width: 100px;"  alt="User Image">
                                </div>
                                <div class="mentor-details m-0">
                                    <p class="user-location m-0"><i class="fas fa-clock"></i> Posted  {{$app->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <div class="user-info-cont">
                                <h4 class="usr-name">{{$app_user->name}}</h4>
                                <p class="mentor-type">{{$app->title}}</p>
                                <p class="mentor-type" style="margin-top: -12px; color: rgba(210,138,32,0.76)"> <i class="fas fa-star filled"></i> {{$app->type}}  <i class="fas fa-star filled"></i></p>
                                <p class="mentor-type"><i class="fas fa-map-marker-alt"></i> {{$app->company}}</p>
                                <div class="mentor-action">
                                    <p class="mentor-type social-title"> {{$app_user->email}}</p>
                                    <a href="https://api.whatsapp.com/send?phone={{$phone}}" target="_blank" class="btn-blue" style="border-color: #420175; background-color: #420175;" >
                                        <i class="fa fa-whatsapp" style="font-size: 150%;"></i>
                                    </a>
                                    <a href="mailto:{{$app_user->email}}" class="btn-blue" style="border-color: #420175; background-color: #420175;" >
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    {{--                                    <a href="https://api.whatsapp.com/send?phone={{$app->phone}}" class="btn-blue" style="border-color: #420175; background-color: #420175;" >--}}
                                    {{--                                        <i class="fa fa-whatsapp"></i>--}}
                                    {{--                                    </a>--}}

                                </div>
                            </div>
                        </div>
                        <div class="user-info-right d-flex align-items-end flex-wrap">
                            <div class="hireme-btn text-center">
                                @if($app->type == 'Premium')
                                    <a class="blue-btn-radius" disabled="" style="border-color: white; background-color: white; color: rgba(210,138,32,0.76);" >
                                        <i class="fas fa-dollar-sign filled"></i> {{$app->price}}</a>
                                @endif

                                    <a class="blue-btn-radius" data-toggle="modal" href="#mentor_apprenticeship_update" disabled="" style="border-color: #420175; background-color: #420175; color: white;" >Update</a>
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
                                        <h1 class="widget-title" style="font-size: 250%; font-weight: bold; text-align: center;">About Apprenticeship</h1>
                                        <hr/>
                                        <h1 class="widget-title">Skills to be learnt</h1>
                                        <p>{{$app->details}}</p>
                                        <hr>
                                        <h1 class="widget-title">Duration</h1>
                                        <p>{{strftime("%b", $app->start_timestamp)}}, {{strftime("%Y", $app->start_timestamp)}} - {{strftime("%b", $app->end_timestamp)}}, {{strftime("%Y", $app->end_timestamp)}}</p>
                                        <p>Apprenticeship duration (hours per week) : {{$app->apprentice_period}}hrs per week.</p>
                                        <hr>
                                        <h4>Prerequisite.</h4>
                                        <p>{{$app->requirement}}</p>
                                        <hr>
                                        <h4>How the skill will be learnt.</h4>
                                        <p>{{$app->how}}</p>

                                    </div>
                                    <!-- /About Details -->
                                </div>
                            </div>
                        </div>
                        <!-- /biography Content -->

                    </div>
                </div>
            </div>



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
                                        <h1 class="widget-title" style="font-size: 250%; font-weight: bold; text-align: center;">About the mentor</h1>
                                        <hr/>
                                        <h4>{{$app->creator->name}}</h4>
                                        <h5>{{$company->position}} at {{$company->name}}</h5>
                                        <p>{{$details->country}} : {{$details->state}} :
                                            @if($about->military)
                                                Veteran
                                            @else
                                                Civilian
                                            @endif
                                        </p>


                                        <hr>
                                        <h4><b>Experience:</b> {{$app->experience}} years in {{$app->title}}</h4>
                                        <p><b>Motivation</b> : <i>{{$app->motivation}}</i></p>

                                    </div>
                                    <!-- /About Details -->

                                </div>
                            </div>
                        </div>
                        <!-- /biography Content -->

                    </div>
                </div>
            </div>


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
                                        <h1 class="widget-title" style="font-size: 250%; font-weight: bold; text-align: center;">Company Information</h1>
                                        <hr/>
                                        <h4>{{$company->name}}</h4>
                                        <h5>Website: {{$company->website}}</h5>
                                        <p>Industry: {{$company->industry}}
                                        </p>
                                        <p>{{$company->description}}</p>
                                    </div>
                                    <!-- /About Details -->

                                </div>
                            </div>
                        </div>
                        <!-- /biography Content -->

                    </div>
                </div>
            </div>

            {{--            <div class="card col-10 mr-auto ml-auto p-0">--}}
            {{--                <div class="card-body custom-border-card pb-0">--}}

            {{--                    <!-- Qualification Details -->--}}
            {{--                    <div class="widget experience-widget mb-0">--}}
            {{--                        <h4 class="widget-title">Qualification</h4>--}}
            {{--                        <hr/>--}}
            {{--                        <div class="experience-box">--}}
            {{--                            <ul class="experience-list profile-custom-list">--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>College Attended</span>--}}
            {{--                                            <div class="row-result">{{ Str::limit($education->school, 30) }}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Undergraduate Major</span>--}}
            {{--                                            <div class="row-result">{{$education->course}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Undergraduate period</span>--}}
            {{--                                            <div class="row-result">{{$education->start_year. ' - ' .$education->end_year}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Type of Degree</span>--}}
            {{--                                            <div class="row-result">{{$education->degree}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Uploaded Resume</span>--}}
            {{--                                            <div class="row-result">{{$about->resume_original_name}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Language(s)</span>--}}

            {{--                                            @foreach($language as $lang)--}}
            {{--                                                <div class="row-result"> {{$lang->language}} </div>--}}
            {{--                                            @endforeach--}}

            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- /Qualification Details -->--}}

            {{--                </div>--}}
            {{--            </div>--}}


            {{--            <div class="card col-10 mr-auto ml-auto p-0">--}}
            {{--                <div class="card-body custom-border-card pb-0">--}}

            {{--                    <!-- Qualification Details -->--}}
            {{--                    <div class="widget experience-widget mb-0">--}}
            {{--                        <h4 class="widget-title">Interests</h4>--}}
            {{--                        <hr/>--}}
            {{--                        <div class="experience-box">--}}
            {{--                            <ul class="experience-list profile-custom-list">--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Needed Experience</span>--}}
            {{--                                            @foreach($neededExperience as $experience)--}}
            {{--                                                <div class="row-result">{{$experience->experience}}</div>--}}
            {{--                                            @endforeach--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Industrial interest</span>--}}
            {{--                                            @foreach($industry as $ind)--}}
            {{--                                                <div class="row-result">{{$ind->industry}}</div>--}}
            {{--                                            @endforeach--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Personal Interest</span>--}}
            {{--                                            @foreach($personalInterest as $interest)--}}
            {{--                                                <div class="row-result">{{$interest->interest}}</div>--}}
            {{--                                            @endforeach--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Familiar tools</span>--}}
            {{--                                            @foreach($tool as $t)--}}
            {{--                                                <div class="row-result">{{$t->tool}}</div>--}}
            {{--                                            @endforeach--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Current location</span>--}}
            {{--                                            <div class="row-result">{{$about->location}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Military status</span>--}}
            {{--                                            @if($about->military)--}}
            {{--                                                <div class="row-result">{{$about->military}}</div>--}}
            {{--                                            @else--}}
            {{--                                                <div class="row-result">Not</div>--}}
            {{--                                            @endif--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- /Qualification Details -->--}}

            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="card col-10 mr-auto ml-auto p-0">--}}
            {{--                <div class="card-body custom-border-card pb-0">--}}

            {{--                    <!-- Qualification Details -->--}}
            {{--                    <div class="widget experience-widget mb-0">--}}
            {{--                        <h4 class="widget-title">Work Experience</h4>--}}
            {{--                        <hr/>--}}
            {{--                        @foreach($workExperience as $work)--}}
            {{--                            <div class="experience-box">--}}
            {{--                                <ul class="experience-list profile-custom-list">--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Role title</span>--}}
            {{--                                                <div class="row-result">{{$work->title}}</div>--}}

            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Type</span>--}}
            {{--                                                <div class="row-result">{{$work->type}}</div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Company</span>--}}

            {{--                                                <div class="row-result">{{$work->company}}</div>--}}

            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Location</span>--}}
            {{--                                                @foreach($tool as $t)--}}
            {{--                                                    <div class="row-result">{{$t->tool}}</div>--}}
            {{--                                                @endforeach--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Current location</span>--}}
            {{--                                                <div class="row-result">{{$work->location}}</div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <div class="experience-content">--}}
            {{--                                            <div class="timeline-content">--}}
            {{--                                                <span>Period of service</span>--}}
            {{--                                                <div class="row-result">{{$work->start_month. ', ' .$work->start_year . ' - ' . $work->end_month. ', ' .$work->end_year }}</div>--}}

            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </li>--}}
            {{--                                </ul>--}}
            {{--                                <hr/>--}}
            {{--                                <h4 class="widget-title">Job description</h4>--}}
            {{--                                <hr/>--}}
            {{--                                <p>{{$work->description}}</p>--}}
            {{--                            </div>--}}
            {{--                        @endforeach--}}

            {{--                    </div>--}}
            {{--                    <!-- /Qualification Details -->--}}

            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="card col-10 mr-auto ml-auto p-0">--}}
            {{--                <div class="card-body custom-border-card pb-0">--}}

            {{--                    <!-- Location Details -->--}}
            {{--                    <div class="widget awards-widget m-0">--}}
            {{--                        <h4 class="widget-title">Location</h4>--}}
            {{--                        <hr/>--}}
            {{--                        <div class="experience-box">--}}
            {{--                            <ul class="experience-list profile-custom-list">--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Address 1</span>--}}
            {{--                                            <div class="row-result">{{$detail->address}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Address 2</span>--}}
            {{--                                            <div class="row-result">{{$detail->address_2}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Country</span>--}}
            {{--                                            <div class="row-result">{{$detail->country}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>City</span>--}}
            {{--                                            <div class="row-result">{{$detail->city}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>State</span>--}}
            {{--                                            <div class="row-result">{{$detail->state}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <div class="experience-content">--}}
            {{--                                        <div class="timeline-content">--}}
            {{--                                            <span>Postal Code</span>--}}
            {{--                                            <div class="row-result">{{$detail->zipcode}}</div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- /Location Details -->--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- /Mentor Details Tab -->--}}

        </div>
    </div>
    <!-- /Page Content -->
</div>
