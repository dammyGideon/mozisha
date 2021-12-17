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
                            <h3 class="page-title">{{$member->name}}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admins')}}">Administrators</a></li>
                                <li class="breadcrumb-item active">{{$member->name}}</li>

                            </ul>
                            <x-alert />
                        </div>
                    </div>
                </div>

                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    @if($image)
                                        <img style="margin: auto;" class="rounded-circle" alt="User Image" src="{{ $image->temporaryUrl()}}">
                                    @else
                                        <a href="#">
                                            <img   style="margin: auto;" class="rounded-circle" alt="User Image" src="{{$member->ImagePath}}">
                                        </a>

                                    @endif
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{$member->name}}</h4>
                                    <h6 class="text-muted">{{$member->email}}</h6>
                                    <div class="pb-3"><i class="fa fa-map-marker"></i> {{$address}}</div>
                                </div>
                                <div class="col-auto profile-btn">

                                    <div class="col-12 col-sm-6">
                                        <form wire:submit.prevent = "updateImage">
                                            <div class="form-group">
                                                <input type="file" wire:model="image" class="form-control" >
                                                <div wire:loading wire:target="image">
                                                    <p class="help-block text-blue-700"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</p>
                                                </div>
                                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading.remove wire:target="updateImage"  class="btn btn-primary btn-block">Upload Image</button>
                                            <button  type="submit" wire:loading wire:target="updateImage" class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
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

                                            <div class="card-body alert alert-success" role="alert">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span style="font-size: 130%; font-weight: bold; text-align: center;"> >>Member's Personal Details</span>
                                                    <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">{{$lastname. ' '. $firstname }}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Date of Birth</p>
                                                    <p class="col-sm-10">{{$age}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-10">{{$email}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10">{{$phone}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Address 1</p>
                                                    <p class="col-sm-10 mb-0">{{$address}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Address 2</p>
                                                    <p class="col-sm-10 mb-0">{{$address_2}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">City</p>
                                                    <p class="col-sm-10 mb-0">{{$city}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">ZipCode</p>
                                                    <p class="col-sm-10 mb-0">{{$zipcode}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Country</p>
                                                    <p class="col-sm-10 mb-0">{{$country}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Gender</p>
                                                    <p class="col-sm-10 mb-0">{{$gender}}</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">About</p>
                                                    @if($about)
                                                        <p class="col-sm-10 mb-0">{{$about->biography}}</p>
                                                    @endif
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted mb-0">Joined</p>
                                                    @if($created_at)
                                                        <p class="col-sm-10 mb-0">{{$created_at->format('d M Y')}}, {{$created_at->format('h:iA')}}</p>
                                                    @endif
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
                                @livewire('admin-members-password', ['member' => $member])

                            </div>
                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>

            </div>









        </div>



        <!-- /Page Wrapper -->
        <!-- Edit Details Modal -->
        <div class="modal fade"  wire:ignore.self tabindex="-1" id="edit_personal_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Member Details</h5><br>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-alert />
                        <form wire:submit.prevent = "updateProfile">
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" wire:model="firstname" class="form-control">
                                        @error('firstname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" wire:model="lastname" class="form-control" >
                                        @error('lastname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="number" wire:model="age" class="form-control">
                                            @error('age') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" wire:model.lazy="phone" class="form-control">
                                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Account Status</label>

                                        <select class="form-control" wire:model.lazy="status" >
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disable</option>
                                        </select>
                                        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5 class="form-title"><span>Address</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" wire:model="address" class="form-control">
                                        @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" wire:model="city" class="form-control">
                                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" wire:model="state" class="form-control">
                                        @error('state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" wire:model="zipcode" class="form-control">
                                        @error('zipcode') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" wire:model="country" class="form-control" >
                                        @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading.remove wire:target="updateProfile"  class="btn btn-primary btn-block">Save Changes</button>
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading wire:target="updateProfile" class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing update...</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->
    </div>
</div>
