<div>
    <style>
        .text-xs{
            color: red;
        }
    </style>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Apprenticeship</li>
                        </ol>
                    </nav>

                    <h2 class="breadcrumb-title"> Apprenticeship Dashboard</h2>
                    @if($availability)
                       Availability: {{$availability}}, Daily.
                    @endif

                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">

                        <i  wire:loading wire:target="status" class="fa fa-spinner fa-spin" style="font-size: 130%;"></i>
                        <span wire:loading.remove wire:target="status" class="sort-title">{{$conn->apprenticeship->title}}


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

                                        <div class="profile-img">
                                            <img src="{{$user->ImagePath}}" style="border-radius: 50px;" alt="User Image">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="user-info-cont">
                                <h4 class="usr-name">{{$user->name}}</h4>
                                <small class="mentor-type">{{$user->email}}</small>
                                <p style="color: crimson;"><i>
                                    @if($conn->status != "Active")
                                        {{$conn->status}}
                                    @endif
                                    @if(!$rating)
                                    <small  style="text-align: center; margin: auto; width: 100%; ">Apprenticeship rating unavailable.</small>
                                    @endif
                                    </i> </p>
                            </div>
                        </div>

                        <div>
                            @if($rating)
                            <div class="progress-bar-custom">


                                    <h6>Apprenticeship rating.</h6>


                                    <div class="pro-progress">
                                        <div class="progress progress" style=" height: 25px;">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 100%; background-color: #420175 !important; padding-bottom: 2px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                <div class="rating" style="height: 5px;">
                                                    @if($rating == 5)
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                    @endif
                                                    @if($rating == 4)
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star "></i>
                                                    @endif
                                                    @if($rating == 3)
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                    @endif
                                                    @if($rating == 2)
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                    @endif
                                                    @if($rating == 1)
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                        <i class="fas fa-star "></i>
                                                    @endif

                                                    <span class="d-inline-block average-rating"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tooltip" style="background-color: #420175; width: 30%;">{{$ratingText}}</div>

                                    </div>


                            </div>
                            @endif


                            <div class="custom-sidebar-nav">
                                <ul>
                                    <li wire:click="showDashboard()"><a href="#"><i class="fas fa-home"></i>Dashboard <span><i wire:loading.remove wire:target="showDashboard" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showDashboard" class="fa fa-spinner fa-spin"></i></span></a></li>
                                @if($conn->status == "Active")
                                        <li wire:click="showSetGoal()"><a href="#" class="edit-link" href="#" ><i class="fas fa-golf-ball"></i>Set Goal <span><i wire:loading.remove wire:target="showSetGoal" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showSetGoal" class="fa fa-spinner fa-spin"></i></span></a></li>
                                        <li wire:click="showAllTask()"><a href="#"><i class="fas fa-list"></i>All tasks <span><i wire:loading.remove wire:target="showAllTask" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showAllTask" class="fa fa-spinner fa-spin"></i></span><span><i class="fas fa-chevron-right"></i></span></a></li>
                                        <li><a href="{{route('mentor.profile')}}"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
                                        <li><a class="edit-link" data-toggle="modal" href="#mentor-availability"><i class="fas fa-clock"></i>Availability <span><i class="fas fa-chevron-right"></i></span></a></li>
                                    @endif
                                    <li wire:click="showStatusRequests()"><a href="#" class="edit-link" href="#" ><i class="fas fa-book"></i>Requests @if($requestCount > 0 ) <sup style="color: crimson">{{$requestCount}}</sup> @endif  <span><i wire:loading.remove wire:target="showStatusRequests" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showStatusRequests" class="fa fa-spinner fa-spin"></i></span></a></li>
                                     <li wire:click="showApprenticeship()"><a href="#" class="edit-link" href="#" ><i class="fas fa-book"></i>Apprenticeship <span><i wire:loading.remove wire:target="showApprenticeship" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showApprenticeship" class="fa fa-spinner fa-spin"></i></span></a></li>
                                     <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Sidebar -->

                </div>

            @if($showDashboard)
                <!---The top three boxed segment--->
                <div class="col-md-7 col-lg-8 col-xl-9">

                    @if($conn->status == 'Active' )
                        <div class="row">
                            <div class="col-md-12 col-lg-4 dash-board-list blue">
                                <div class="dash-widget">
                                    <div class="circle-bar">
                                        <div class="icon-col">
                                            <i wire:loading wire:target="showAppointments" class="fa fa-spinner fa-spin"></i>
                                            <i class="fas fa-users" wire:loading.remove wire:target="showAppointments" ></i>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info" wire:click="showAppointments()" style="cursor:pointer;">
                                        <h3>{{$appointmentNo}}</h3>
                                        <h6>Appointments</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4 dash-board-list yellow">
                                <div class="dash-widget">
                                    <div class="circle-bar">
                                        <div class="icon-col">
                                            <i wire:loading wire:target="showAllTask" class="fa fa-spinner fa-spin"></i>
                                            <i wire:loading.remove wire:target="showAllTask" wire:target="status" class="fas fa-edit"></i>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info"  wire:click="showAllTask()" style="cursor:pointer;" >
                                        <h3>{{$taskNo}}</h3>
                                        <h6> Tasks</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4 dash-board-list pink">
                                <div class="dash-widget">
                                    <div class="circle-bar">
                                        <div class="icon-col">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                    </div>
                                    <div style="cursor:pointer;"  class="dash-widget-info">
                                        <h3>{{$responseNo}}</h3>
                                        <h6>Responses</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">

                            <div class="col-md-12 dash-board-list pink">
                                <div class="dash-widget">
                                    <div class="circle-bar">
                                        <div class="icon-col">
                                            <i class="fas fa-warning"></i>
                                        </div>
                                    </div>
                                    <div style="cursor:pointer;"  class="dash-widget-info">
                                        <h3>NOTICE</h3>
                                        <h6>This apprenticeship program has been {{strtoupper($conn->status)}} for now.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            @endif

                <!---The Set Goal segment--->
            @if($showSetGoal)
                @livewire('mentor-app-goal', ['conn' => $conn])
            @endif

                <!---Apprenticeship details-->
            @if($showApp)
                @livewire('mentor-app-details', ['conn' => $conn])
            @endif

            <!---Status change requests from mentee-->
            @if($showRequests)
               @livewire('mentor-app-status-request', ['conn' => $conn])
            @endif

            @if($showNewTask)
              @livewire('mentor-app-new-task', ['conn' => $conn])
            @endif

            @if($showAllTask)
                @livewire('mentor-app-all-task', ['conn' => $conn])
            @endif

            @if($showViewTask)
                @livewire('mentor-app-all-task', ['conn' => $conn, 'task_id' => $task_id])
             @endif

             @if($showAppointments)
                 @livewire('mentor-appointments', ['conn' => $conn])
             @endif

            </div>

            <div class="row">






            </div>

        </div>

    </div>
    <!-- /Page Content -->

</div>
<!-- Edit Details Modal -->
