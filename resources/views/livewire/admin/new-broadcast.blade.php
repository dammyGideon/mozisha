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
                            <h3 class="page-title">Broadcast message</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">New broadcast message</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create a broadcast message</h4>
                                <x-alert />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Broadcast Information</h4>
                                <form action="#" wire:submit.prevent="broadcast">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Subject</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="subject" class="form-control" placeholder="Subject">
                                                    @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image</label>
                                                <div class="col-lg-9">
                                                    <input type="file" wire:model="image" class="form-control">
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" class="img-fluid" />
                                                    @endif
                                                    <small class="form-text text-muted">Max. file size: 500KB. (480x480<sup style="color: red">*</sup>) Allowed images: jpg, gif, png.</small>
                                                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    <small wire:loading wire:target="image" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Target</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" wire:model.lazy="target">
                                                        <option value="">Select Audience</option>
                                                        <option value="All">All</option>
                                                        <option value="Administrators">Administrators</option>
                                                        <option value="Team">Mozisha team</option>
                                                        <option value="Mentors">Mentors</option>
                                                        <option value="Apprentices">Apprentices</option>
                                                        <option value="Subscribers">Subscribers</option>
                                                        <option value="Patrons">Patrons</option>
                                                    </select>
                                                    @error('target') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Message</label>
                                                <div class="col-lg-9">
                                                    <textarea placeholder="Enter broadcast message here" class="form-control" wire:model.lazy="message"></textarea>
                                                    @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="broadcast" class="btn btn-primary btn-lg"> <i class="fa fa-spinner fa-spin"></i> Processing request...</button>
                                        <button class="btn btn-primary btn-lg" wire:loading.remove wire:target="broadcast" style="background-color: #420175; border-color: #420175;">Initiate Broadcast</button>
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

