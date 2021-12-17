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

                        @if(Auth::user()->hasRole('mentor'))
                        @livewire('mentor-sidebar', ['user' => $user])
                        @endif
                        @if(Auth::user()->hasRole('mentee'))
                        @livewire('mentee-sidebar', ['user' => $user])
                        @endif

                    </div>
                    <!-- /Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">



                    <div>

                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    @if($meeting->platform == 'Zoom')
                                        <a href="{{$meeting->link}}" target="_blank" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="https://seeklogo.com/images/Z/zoom-icon-logo-C552F99BAC-seeklogo.com.png" alt="User Image"></a>
                                    @endif
                                    @if($meeting->platform == 'Google_Meet')
                                       <a href="{{$meeting->link}}" target="_blank" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="https://images.ctfassets.net/p24lh3qexxeo/40AfbIMy7oQHvbC1n7yaNn/ecf23341db2f55d7d1894ab67621f8d4/google_meet.png?w=320&q=50" alt="User Image"></a>
                                    @endif
                                    <img src="" class="img-rounded"/>
                                    <h4 class="card-title">{{$meeting->topic}}</h4>
                                    <small>(This meeting was set to last for {{$meeting->duration}} minutes)</small>
                                </div>
                                <div class="card-body">
                                    <blockquote>
                                        <p class="mb-0">{{$meeting->details}}</p>
                                    </blockquote>

                                        <p class="mb-0" style="text-decoration: underline; font-weight: bold;">Schedule:</p>
                                        <small>{{strftime("%a", $meeting->timestamp)}}, {{strftime("%b", $meeting->timestamp)}} {{strftime("%e", $meeting->timestamp)}} {{strftime("%G", $meeting->timestamp)}}</small>
                                        <small>{{strftime("%I", $meeting->timestamp)}}:{{strftime("%M",  $meeting->timestamp)}} {{strftime("%p", $meeting->timestamp)}}</small>
                                       <br>
                                        Platform: <small>{{$meeting->platform}}</small>
                                        <hr>
                                         Link: <a href="{{$meeting->link}}" target="_blank" >{{$meeting->link}}</a><br>
                                         Meeting_id: {{$meeting->meeting_id}}<br>
                                         Passcode: {{$meeting->passcode}}<br>

                                </div>
                            </div>

                            @if($meeting->initiator_id == Auth::user()->id)
                            <div class="card">
                                <div class="card-header" style="text-align: center;">
                                    <h4 class="card-title">Participating Apprentices</h4>
                                    <small>Apprentices that are participants of this meeting</small>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($targets as $target)
                                        <tr>
                                            <td>
                                            <h2 class="table-avatar">
                                               <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$target->mentee->ImagePath}}" alt="User Image"></a>
                                                <a href="#">{{ $target->mentee->name}} <span>{{ $target->mentee->email }}</span></a>
                                            </h2>
                                            </td>
                                            <td><a href="mailto:{{$target->mentee->email}}" target="_blank">{{$target->mentee->email}}</a></td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer">
                                    <button wire:click="cancelMeeting" style="border-color: #420175; background-color: #420175; width: 30%;" type="button" wire:loading.remove wire:target="cancelMeeting"
                                          class="btn btn-primary btn-block">Cancel meeting
                                    </button>
                                    <button  style="border-color: #420175; background-color: #420175; width: 30%;" type="submit" wire:loading wire:target="cancelMeeting"
                                             class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing
                                        request...
                                    </button>
                                </div>
                            </div>
                            @else
                            <div class="card">
                                <div class="card-header" style="text-align: center;">
                                    <h4 class="card-title">Mentor Information</h4>
                                    <small>This is the information of your mentor that's going to meet with you.</small>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$mentor->ImagePath}}" alt="User Image"></a>
                                                        <a href="#">{{ $mentor->name}} <span>{{ $mentor->email }}</span></a>
                                                    </h2>
                                                </td>
                                                <td><a href="mailto:{{$mentor->email}}" target="_blank">{{$mentor->email}}</a></td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            @endif


                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
</div>
