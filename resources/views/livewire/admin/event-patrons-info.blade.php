<div>
    <div class="main-wrapper">
        <!--Admin header-->
        <livewire:admin-header />
        <!-- /Admin header-->

        <!-- Admin siebar-->
        <x-admin_sidebar />
        <!-- /Sidebar -->
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Patron Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{$sub->name}}</li>
                            </ul>
                            <x-alert />
                        </div>
                    </div>
                </div>

                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">

                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Operation</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">

                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit-link"  href="{{url()->previous()}}"><i class="fa fa-arrow-left mr-1"></i>Go back</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">{{$sub->name }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Booking Time</p>
                                                    <p class="col-sm-10">{{$sub->created_at->format('d-M-Y')}} at {{$sub->created_at->format('h:iA')}}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-10">{{$sub->email}}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10">{{$sub->phone}}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Details</p>
                                                    <p class="col-sm-10 mb-0">{{$sub->details}}</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <!--Password reset livewire component-->
{{--                                <button class="btn btn-primary">Remind Patron</button>--}}
                                <button wire:click="remove" wire:loading.remove wire:target="remove" class="btn btn-danger">Remove patron</button>
                                <button wire:click="remove" wire:loading wire:target="remove" class="btn btn-danger"><i class="fa fa-spinner fa-spin"></i> Processing request</button>



                            </div>
                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
