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
                        <span wire:loading.remove wire:target="status" class="sort-title">{{$user->name}}</span>
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
                                    </i> </p>
                            </div>
                        </div>

                        <div>
                           <hr>
                            <div class="custom-sidebar-nav">
                                <ul>

                                    <li wire:click="showDashboard()"><a href="#"><i class="fas fa-home"></i>Dashboard <span><i wire:loading.remove wire:target="showDashboard" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showDashboard" class="fa fa-spinner fa-spin"></i></span></a></li>

                                    @if($conn->status == "Active")
                                    <li><a class="edit-link" data-toggle="modal" href="#mentee_new_meeting"><i class="fas fa-clock"></i>Book Meeting <span><i class="fas fa-chevron-right"></i></span></a></li>

                                    <li wire:click="showSetGoal()"><a href="#" class="edit-link" href="#" ><i class="fas fa-mars"></i>Goal <span><i wire:loading.remove wire:target="showSetGoal" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showSetGoal" class="fa fa-spinner fa-spin"></i></span></a></li>
                                    <li wire:click="showAllTask()"><a href="#"><i class="fas fa-hourglass-end"></i>My tasks <span><i wire:loading.remove wire:target="showAllTask" class="fas fa-chevron-right"></i> <i wire:loading wire:target="showAllTask" class="fa fa-spinner fa-spin"></i></span><span><i class="fas fa-chevron-right"></i></span></a></li>
                                     <li><a href="{{route('mentee.profile')}}"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
                                        <li><a class="edit-link" data-toggle="modal" href="#app_rating"><i class="fas fa-star"></i>Rate<span><i class="fas fa-chevron-right"></i></span></a></li>
                                    @endif

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

                        @if($conn->status == "Active")
                        <div class="row">
                            <div class="col-md-12 col-lg-4 dash-board-list blue">
                                <div class="dash-widget">
                                    <div class="circle-bar">
                                        <div class="icon-col">
                                            <i wire:loading wire:target="showAppointments" class="fa fa-spinner fa-spin"></i>
                                            <i class="fas fa-users" wire:loading.remove wire:target="showAppointments" ></i>
                                        </div>
                                    </div>
                                    @if($appointmentNo > 0)
                                        <div class="dash-widget-info" wire:click="showAppointments()" style="cursor:pointer;">
                                            <h3>{{$appointmentNo}}</h3>
                                            <h6>Appointments</h6>
                                        </div>
                                    @else
                                        <div class="dash-widget-info" onclick="alert('You have no upcoming appointment.')" style="cursor:pointer;">
                                            <h3>{{$appointmentNo}}</h3>
                                            <h6>Appointments</h6>
                                        </div>
                                    @endif

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
                                    @if($taskNo > 0)
                                    <div class="dash-widget-info"  wire:click="showAllTask()" style="cursor:pointer;" >
                                        <h3>{{$taskNo}}</h3>
                                        <h6> Tasks</h6>
                                    </div>
                                    @else
                                        <div class="dash-widget-info"  wire:click="showAllTask()" onclick="alert('You have no unseen task!')"  style="cursor:pointer;" >
                                            <h3>{{$taskNo}}</h3>
                                            <h6> Tasks</h6>
                                        </div>
                                    @endif

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
                                        <h6>This apprenticeship program has been {{strtoupper($conn->status)}} for now, you can contact your mentor, or request for a status change.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

            @endif
            <!---The Set Goal segment--->
                @if($showSetGoal)
                    @livewire('mentee-app-goal', ['conn' => $conn])
                @endif

                @if($showAllTask)
                    @livewire('mentee-app-tasks', ['conn' => $conn])
                @endif

                @if($showApp)
                    @livewire('mentee-app-details', ['conn' => $conn])
                @endif


                @if($showViewTask)
                    @livewire('mentor-app-all-task', ['conn' => $conn, 'task_id' => $task_id])
                @endif

                @if($showAppointments)
                    @livewire('mentee-appointments', ['conn' => $conn])
                @endif
            </div>

            <div class="row">






            </div>

        </div>

    </div>
    <!-- /Page Content -->
</div>
