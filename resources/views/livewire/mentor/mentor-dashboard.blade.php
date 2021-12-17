<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                        <h2 class="breadcrumb-title"> Mentors Dashboard</h2>

                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">

                        <i wire:loading wire:target="status" class="fa fa-spinner fa-spin" style="font-size: 130%;"></i>
                        <span wire:loading.remove wire:target="status" class="sort-title">Sort by</span>
                        <span wire:ignore class="sortby-fliter">
									<select wire:ignore wire:model="status" class="select form-control">
										<option class="sorting">Select</option>
										<option class="sorting" value="Active">Active</option>
										<option class="sorting" value="Suspended">Suspended</option>
										<option class="sorting" value="Terminated">Terminated</option>
                                        <option class="sorting" value="Completed">Completed</option>
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
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Sidebar -->
                    <div class="profile-sidebar">
                        <div class="user-widget">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar" style=" width: 40%; margin: auto;  text-align: center;">

                                        <div class="profile-img" style=" margin: auto;">
                                            <img src="{{$user->ImagePath}}" style="border-radius: 50px;" alt="User Image">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="user-info-cont">
                                <h4 class="usr-name">{{$user->name}}</h4>
                                <p class="mentor-type">{{$user->email}}</p>
                            </div>
                        </div>

                        @livewire('mentor-sidebar', ['user' => $user])
                    </div>
                    <!-- /Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="row">
                        <div class="col-md-12 col-lg-3 dash-board-list blue">
                            <div class="dash-widget">
                                <div class="circle-bar">
                                    <div class="icon-col">
                                        <i wire:loading wire:target="showMeetings" class="fa fa-spinner fa-spin"></i>
                                        <i wire:loading.remove wire:target="showMeetings" class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                                <div class="dash-widget-info" wire:click="showMeetings" style="cursor: pointer">
                                    <h3>{{$appointmentNo}}</h3>
                                    <h6>Appointments</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3 dash-board-list yellow">
                            <div class="dash-widget">
                                <div class="circle-bar">
                                    <div class="icon-col">
                                        <i wire:loading wire:target="showPremiumApps" class="fa fa-spinner fa-spin"></i>
                                        <i wire:loading.remove wire:target="showPremiumApps" wire:target="status" class="fas fa-edit"></i>
                                    </div>
                                </div>
                                <div class="dash-widget-info"  wire:click="showPremiumApps" style="cursor:pointer;" >
                                    <h3>Premium</h3>
                                    <h6>Apprentices[{{$premiumMenteeNo}}]</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3 dash-board-list yellow">
                            <div class="dash-widget">
                                <div class="circle-bar">
                                    <div class="icon-col">
                                        <i wire:loading wire:target="showFreeApps" class="fa fa-spinner fa-spin"></i>
                                        <i wire:loading.remove wire:target="showFreeApps" wire:target="status" class="fas fa-edit"></i>
                                    </div>
                                </div>
                                <div class="dash-widget-info"  wire:click="showFreeApps" style="cursor:pointer;" >
                                    <h3>Free</h3>
                                    <h6>Apprentices[{{$freeMenteeNo}}]</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3 dash-board-list pink">
                            <div class="dash-widget">
                                <div class="circle-bar">
                                    <div class="icon-col">
                                        <i wire:loading wire:target="showRequests" class="fa fa-spinner fa-spin"></i>
                                        <i wire:loading.remove wire:target="showRequests" class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div style="cursor:pointer;" wire:click="showRequests" class="dash-widget-info">
                                    <h3>{{$requestNo}}</h3>
                                    <h6>Request</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($showFreeApps)
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-4">Free Apprenticeships</h4>

                                    <div class="card card-table">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if($freeConnects)
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>BASIC INFO</th>
                                                            <th>ACCEPTED DATE</th>
                                                            <th class="text-center">STATUS</th>
                                                            <th class="text-center">ACTION</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>


                                                        <!-- class could be pending, accept, reject -->
                                                        <!--Checking for records before fetching-->

                                                        @foreach($freeConnects as $connect)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="{{'/mentor/'.$connect->id.'/app'}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$connect->mentee->ImagePath}}" alt="User Image"></a>
                                                                        <a href="{{'/mentor/'.$connect->id.'/app'}}">{{$connect->mentee->name}} <span>{{$connect->mentee->email}}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{$connect->created_at->format('d M Y')}}</td>


                                                                @if($connect->status == "Suspended")
                                                                    <td class="text-center"><span class="pending">SUSPENDED</span></td>
                                                                @endif

                                                                @if($connect->status == "Active")
                                                                    <td class="text-center"><span class="accept">ACTIVE</span></td>
                                                                @endif

                                                                @if($connect->status == "Completed")
                                                                    <td class="text-center"><span class="accept">COMPLETED</span></td>
                                                                @endif

                                                                @if($connect->status == "Terminated")
                                                                    <td class="text-center"><span class="reject">TERMINATED</span></td>
                                                                @endif

                                                                <td class="text-center"><a href="{{'/mentor/'.$connect->id.'/app'}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> Dashboard</a></td>
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    @if($showPremiumApps)
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-4">Premium Apprenticeships</h4>

                                    <div class="card card-table">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if($premiumConnects)
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>BASIC INFO</th>
                                                            <th>ACCEPTED DATE</th>
                                                            <th class="text-center">STATUS</th>
                                                            <th class="text-center">ACTION</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>


                                                        <!-- class could be pending, accept, reject -->
                                                        <!--Checking for records before fetching-->

                                                        @foreach($premiumConnects as $connect)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="{{'/mentor/'.$connect->id.'/app'}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$connect->mentee->ImagePath}}" alt="User Image"></a>
                                                                        <a href="{{'/mentor/'.$connect->id.'/app'}}">{{$connect->mentee->name}} <span>{{$connect->mentee->email}}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{$connect->created_at->format('d M Y')}}</td>


                                                                @if($connect->payment_status == 'Pending')
                                                                    <td class="text-center"><span class="pending">Pending Payment</span></td>
                                                                @else
                                                                    @if($connect->status == "Suspended")
                                                                        <td class="text-center"><span class="pending">SUSPENDED</span></td>
                                                                    @endif

                                                                    @if($connect->status == "Active")
                                                                        <td class="text-center"><span class="accept">ACTIVE</span></td>
                                                                    @endif

                                                                    @if($connect->status == "Completed")
                                                                        <td class="text-center"><span class="accept">COMPLETED</span></td>
                                                                    @endif

                                                                    @if($connect->status == "Terminated")
                                                                        <td class="text-center"><span class="reject">TERMINATED</span></td>
                                                                    @endif
                                                                @endif


                                                                @if($connect->payment_status == 'Pending')
                                                                    <td class="text-center"><a href="#" disabled class="btn btn-sm bg-danger-light"><i class="far fa-eye"></i> Disabled</a></td>
                                                                @else
                                                                    <td class="text-center"><a href="{{'/mentor/'.$connect->id.'/app'}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> Dashboard</a></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    @if($showRequests)
                        <div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-4">Apprenticeship Requests</h4>

                                    <div class="card card-table">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if($requests)
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>BASIC INFO</th>
                                                            <th>APPRENTICESHIP</th>
                                                            <th>CREATED DATE</th>
                                                            <th class="text-center">STATUS</th>
                                                            <th class="text-center">ACTION</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>


                                                        <!-- class could be pending, accept, reject -->
                                                        <!--Checking for records before fetching-->

                                                        @foreach($requests as $request)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="{{'/mentor/'.$request->mentee_id.'/'.$request->id.'/mentee'}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$request->creator->ImagePath}}" alt="User Image"></a>
                                                                        <a href="{{'/mentor/'.$request->mentee_id.'/'.$request->id.'/mentee'}}">{{$request->creator->name}} <span>{{$request->creator->email}}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>
                                                                    <p style="margin-bottom: 1px;">{{$request->apprenticeship->title}}</p>
                                                                    <small style="color: rgba(210,138,32,0.76)"><i class="fas fa-star filled"></i> {{$request->apprenticeship->type}}
                                                                        @if($request->apprenticeship->type  == 'Premium')
                                                                            || <i class="fas fa-dollar-sign filled"></i> {{$request->apprenticeship->price}}
                                                                        @endif
                                                                        <i class="fas fa-star filled"></i>
                                                                    </small>
                                                                </td>
                                                                <td>{{$request->created_at->format('d M Y')}}</td>


                                                                @if($request->status == "Pending")
                                                                    <td class="text-center"><span class="pending">PENDING</span></td>
                                                                @endif

                                                                @if($request->status == "Accepted")
                                                                    <td class="text-center"><span class="accept">ACCEPTED</span></td>
                                                                @endif

                                                                @if($request->status == "Rejected")
                                                                    <td class="text-center"><span class="reject">DECLINED</span></td>
                                                                @endif


                                                                <td class="text-center"><a href="{{'/mentor/'.$request->mentee_id.'/'.$request->id.'/mentee'}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
                                                            </tr>
                                                        @endforeach




                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    @endif

                    @if($meetings)
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-4">My Appointments</h4>

                                    <div class="card card-table">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if($appointments)
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>TOPIC</th>
                                                            <th>DATE</th>
                                                            <th class="text-center">TIME</th>
                                                            <th class="text-center">PLATFORM</th>
                                                            <th class="text-center">STATUS</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>


                                                        <!-- class could be pending, accept, reject -->
                                                        <!--Checking for records before fetching-->

                                                        @foreach($appointments as $app)
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                       @if($app->platform == 'Zoom')
                                                                        <a href="{{route('mentor.meeting.view', $app->id)}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="https://seeklogo.com/images/Z/zoom-icon-logo-C552F99BAC-seeklogo.com.png" alt="User Image"></a>
                                                                        @endif
                                                                        @if($app->platform == 'Google_Meet')
                                                                           <a href="{{route('mentor.meeting.view', $app->id)}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="https://images.ctfassets.net/p24lh3qexxeo/40AfbIMy7oQHvbC1n7yaNn/ecf23341db2f55d7d1894ab67621f8d4/google_meet.png?w=320&q=50" alt="User Image"></a>
                                                                        @endif
                                                                        <a href="#">{{ Str::limit($app->topic, $limit = 40, $end = '...') }} <span>{{ Str::limit($app->details, $limit = 40, $end = '...') }}</span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>{{strftime("%a", $app->timestamp)}}, {{strftime("%b", $app->timestamp)}} {{strftime("%e", $app->timestamp)}} {{strftime("%G", $app->timestamp)}}</td>
                                                                <td>{{strftime("%I", $app->timestamp)}}:{{strftime("%M", $app->timestamp)}} {{strftime("%p", $app->timestamp)}}</td>
                                                                <td>{{$app->platform}}</td>

                                                                @if($app->status == "Done")
                                                                    <td class="text-center"><span class="pending">Done</span></td>
                                                                @endif

                                                                @if($app->status == "Active")
                                                                    <td class="text-center"><span class="accept">Active</span></td>
                                                                @endif

                                                                @if($app->status == "Cancelled")
                                                                    <td class="text-center"><span class="reject">Cancelled</span></td>
                                                                @endif


                                                                <td class="text-center"><a href="{{route('mentor.meeting.view', $app->id)}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
                                                            </tr>
                                                        @endforeach




                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
</div>
