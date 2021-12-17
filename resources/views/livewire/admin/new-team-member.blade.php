<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!--Admin header-->
        <livewire:admin-header />
        <!-- /Admin header-->

        <!-- Admin siebar-->
        <x-admin_sidebar />
        <!-- /Sidebar -->


        <!-- Page Wrapper -->
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Mozisha Team</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Team member</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Team Member</h4>
                                <x-alert />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Personal Information</h4>
                                <form action="#" wire:submit.prevent="addMember">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model="first_name" class="form-control" placeholder="First Name">
                                                    @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model="last_name" class="form-control" placeholder="Last Name">
                                                    @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gender</label>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" wire:model.lazy="gender" id="gender_male" value="Male" checked>
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" wire:model.lazy="gender" id="gender_female" value="Female">
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>
                                                    @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Team</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" wire:model.lazy="userTeam">
                                                         <option value="">Select member team</option>
                                                         <option value="Management">Management</option>
                                                         <option value="Advisory">Advisory</option>
                                                         <option value="Others">Others</option>
                                                    </select>
                                                    @error('userTeam') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Position</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" placeholder="Member's role" wire:model.lazy="position">
                                                    @error('position') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="email" class="form-control" placeholder="Your Email">
                                                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image</label>
                                                <div class="col-lg-9">
                                                    <input type="file" wire:model.lazy="image" class="form-control">
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" class="img-fluid" />
                                                    @endif
                                                    <small class="form-text text-muted">Max. file size: 500KB. (480x480<sup style="color: red">*</sup>) Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    <small wire:loading wire:target="image" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Facebook</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="facebook" class="form-control" placeholder="Facebook">
                                                    @error('facebook') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">LinkedIn</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="linkedin" class="form-control" placeholder="LinkedIn Profile">
                                                    @error('linkedin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Twitter</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="twitter" class="form-control" placeholder="Twitter handle">
                                                    @error('twitter') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Behance</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="behance" class="form-control" placeholder="Behance">
                                                    @error('behance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="state" class="form-control" placeholder="State">
                                                    @error('state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="country" class="form-control" placeholder="Country">
                                                    @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Details</label>
                                                <div class="col-lg-9">
                                                    <textarea  class="form-control"  wire:model.lazay="details" placeholder="Details about the team member">
                                                    </textarea>
                                                    @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="addMember" class="btn btn-primary btn-lg"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                                        <button class="btn btn-primary btn-lg" wire:loading.remove wire:target="addMember" style="background-color: #420175; border-color: #420175;">Add Member</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /Main Wrapper -->
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
</div>

