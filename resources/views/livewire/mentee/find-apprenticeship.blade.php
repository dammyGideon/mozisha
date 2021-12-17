<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active"  aria-current="page">Find Apprenticeship</li>
                        </ol>
                    </nav>
                    @if($apps_no < 2)
                        <h2 class="breadcrumb-title">{{$apps_no}} match found for : Mentors In  Africa</h2>
                    @else
                        <h2 class="breadcrumb-title">{{$apps_no}} matches found for : Mentors In  Africa</h2>
                    @endif

                </div>
                <div class="col-md-4 col-12 d-md-block d-none" wire:ignore>
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
{{--                            <h4 class="card-title mb-0" wire:loading ><i class="fa fa-spinner fa-spin"></i> Sorting...</h4>--}}
                        </div>
                        <div class="card-body" wire:ignore.self>
                            <div class="filter-widget">
                                <div class="">
                                    <input type="search" class="form-control" wire:model="appTitle"  wire:ignore placeholder="Search Program">
                                </div>
                            </div>
                            <hr>

                            <!-----To be processed by filterResult() in the future -->
                            <form>

{{--                            <div class="filter-widget" wire:ignore>--}}
{{--                                <h4>Company</h4>--}}
{{--                                <select class="select form-control {{$errors->has('timing')? 'is-invalid' : '' }}"   wire:model.lazy="company" >--}}
{{--                                    <option value="">Select Company</option>--}}
{{--                                    @if($companies)--}}
{{--                                        @foreach($companies as $company)--}}
{{--                                            <option value="{{$company->company}}">{{$company->company}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="filter-widget" wire:ignore>--}}
{{--                                <h4>Select Course</h4>--}}
{{--                                <select  class="select form-control {{$errors->has('course')? 'is-invalid' : '' }}"  wire:model.lazy="course">--}}
{{--                                    <option value="">Select</option>--}}
{{--                                    @if($courses)--}}
{{--                                        @foreach($courses as $course)--}}
{{--                                            <option value="{{$course->title}}">{{$course->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                                @error('course') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}

{{--                            <div class="filter-widget">--}}
{{--                                <h4>Mentor</h4>--}}
{{--                                <select class="select form-control {{$errors->has('timing')? 'is-invalid' : '' }}"   wire:model.lazy="mentor" >--}}
{{--                                    <option value="">Select Mentor</option>--}}
{{--                                    @if($mentors)--}}
{{--                                        @foreach($mentors as $mentor)--}}
{{--                                            <option value="{{$mentor->mentor_name}}">{{$mentor->mentor_name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                                @error('mentor') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}
                            <div class="btn-search">

                                <button onclick="event.preventDefault()"  type="button" wire:loading style="background-color: #420175; border-color: #420175;" class="btn btn-block"> <i class="fa fa-spinner fa-spin"></i> Filtering...</button>
                                <button onclick="event.preventDefault()" wire:loading.remove style="background-color: #420175; border-color: #420175;" class="btn btn-block"> Filter</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /Search Filter -->

                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">

                    @if($apps_no)
                        @foreach($apps as $app)
                        <!-- Mentor Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mentor-widget">
                                    <div class="user-info-left">
                                        <div class="mentor-img">
                                            <a href="profile.html">
                                                <img src="{{$app->creator->ImagePath}}" style="width: 100%; height: 100%;" class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="user-info-cont">
                                            <h4 class="usr-name">{{$app->company}}</h4>
                                            <p class="mentor-type">{{$app->title}}</p>
                                            <p class="mentor-type" style="margin-top: -12px; color: rgba(210,138,32,0.76)"> <i class="fas fa-star filled"></i> {{$app->type}}  <i class="fas fa-star filled"></i></p>

                                            <div class="mentor-details">
                                                <p class="user-location"><i class="fas fa-clock"></i> {{$app->created_at->diffForHumans()}}</p>
                                                <p><i class="fas fa-user"></i><a href="/business/{{$app->creator->id}}/view"> Mentor: {{$app->creator->name}}</a></p>
                                            </div>                                        </div>
                                    </div>
                                    <div class="user-info-right">
                                        <div class="user-infos">
                                            <ul>
                                                <li><i class="fas fa-map-marker-alt"></i> {{$app->company}}</li>
                                                <li><i class="fas fa-edit"></i> Apprenticeship, {{$app->mentor_period}}hrs/wk</li>
                                                @if($app->type == 'Premium')
                                                    <li>  <i class="fas fa-dollar-sign filled"></i> {{$app->price}} <del> {{$app->price + 200}}</del></li>
                                                @endif
                                                <li><i class="far fa-clock"></i>{{strftime("%b", $app->start_timestamp)}}, {{strftime("%Y", $app->start_timestamp)}} - {{strftime("%b", $app->end_timestamp)}}, {{strftime("%Y", $app->end_timestamp)}} </li>
                                            </ul>
                                        </div>
                                        <div class="mentor-booking"  >

                                            <a  href="/apprenticeship/{{$app->id}}/view" class="apt-btn" style="border-color: #420175; background-color: #420175;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Mentor Widget -->
                        @endforeach
                            {{ $apps->links('components.user.pagination-links') /* For pagination links */}}
                    @else
                            <div class="card alert alert-danger alert-dismissible fade show" >
                                <div class="card-body" >
                                    <h5 style="">No apprenticeship available, you can search for other apprenticeship programs...</h5>
                                </div>
                            </div>
                    @endif

{{--                    <div class="load-more text-center">--}}
{{--                        <a class="btn btn-primary btn-sm" style="border-color: #420175; background-color: #420175;" href="javascript:void(0);">Load More</a>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
</div>
