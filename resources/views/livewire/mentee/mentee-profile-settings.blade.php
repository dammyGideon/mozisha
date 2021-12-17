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
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Profile Settings</h2>
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

          

             <!--Other User Information-->
             @livewire('other-data', ['user' => $user])
             <!--End Other User Information-->


            <!--About User Information-->
            @livewire('about-data', ['user' => $user])
            <!--End About User Information-->
        </div>

    </div>
    <!-- /Page Content -->
</div>
