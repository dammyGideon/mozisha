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
                            <h3 class="page-title">Edit Testimonial</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Testimonial</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Name of testifier</h4>
                                <x-alert />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Testifier Information</h4>
                                <form action="#" wire:submit.prevent="updateTestimonial">
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
                                                <label class="col-lg-3 col-form-label">Rating</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" wire:model.lazy="rating">
                                                        <option value="">Rate Mozisha service</option>
                                                        <option value="5">Excellent</option>
                                                        <option value="4">Very Good</option>
                                                        <option value="3">Good</option>
                                                        <option value="2">Fair</option>
                                                        <option value="1">Poor</option>
                                                    </select>
                                                    @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Profession</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" placeholder="Testifier's profession" wire:model.lazy="profession">
                                                    @error('profession') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Image</label>
                                                <div class="col-lg-9">
                                                    <input type="file" wire:model="image" class="form-control">
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" class="img-fluid" />
                                                    @else
                                                        <img src="{{$old_image}}" class="img-fluid" />
                                                    @endif
                                                    <small class="form-text text-muted">Max. file size: 500KB.(480x480<sup style="color: red">*</sup>) Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    <small wire:loading wire:target="image" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">LinkedIn</label>
                                                <div class="col-lg-9">
                                                    <input type="text" wire:model.lazy="linkedin" class="form-control" placeholder="LinkedIn Profile">
                                                    @error('linkedin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Testimony(max: 1000 chars)</label>
                                                <div class="col-lg-9">
                                                    <textarea  class="form-control" cols="30" rows="10"  wire:model.lazay="testimony" placeholder="How has Mozisha helped?">
                                                    </textarea>
                                                    @error('testimony') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateTestimonial" class="btn btn-primary btn-lg"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                                        <button class="btn btn-primary btn-lg" wire:loading.remove wire:target="updateTestimonial" style="background-color: #420175; border-color: #420175;">Update Testimonial</button>
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

