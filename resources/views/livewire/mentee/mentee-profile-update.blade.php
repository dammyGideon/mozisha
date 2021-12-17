<div>
    <!-- Breadcrumb -->
    <style>
        .text-xs{
            color: red;
        }
    </style>
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Update Profile </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->



    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <!--Primary Information-->
            @livewire('primary-data', ['user' => $user])
            <!--End Primary Information-->

            <!--About User Information-->
            @livewire('about-data', ['user' => $user])
            <!--End About User Information-->

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Sidebar -->
                    <div class="profile-sidebar">
                        <div class="user-widget">
                            <div class="user-info-cont">
                                <h4 class="usr-name">Get to know me</h4>
                                <p class="mentor-type">Other information about you.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Sidebar -->

                </div>
                <!-- /Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">

                    <!--Other User Information-->
                    @livewire('other-data', ['user' => $user])
                    <!--End Other User Information-->

                </div>



            </div>
        </div>

    </div>
    <!-- /Page Content -->
</div>

