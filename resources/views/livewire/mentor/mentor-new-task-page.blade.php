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
                    @livewire('mentor-app-new-task', ['user' => $user])
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
</div>
