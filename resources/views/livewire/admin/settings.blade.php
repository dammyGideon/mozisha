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
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4 custom-tab-scroll">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li>
                            <a class="nav-link active" href="#generalsettings" data-toggle="tab">General Settings</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#paymentgateway" data-toggle="tab">Payment gateway</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#sociallogin" data-toggle="tab">Social Login</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->


                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- General -->
                    <div role="tabpanel" id="generalsettings" class="tab-pane fade show active">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">General Settings</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                                        <li class="breadcrumb-item active">General Settings</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <x-alert />
                                    <x-modal />
                                    <div class="card-header">
                                        <h4 class="card-title">General website setting</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" wire:submit.prevent = "updateSetting">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <h4 class="card-title">Website Details</h4>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Company</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "company" placeholder="Company name" class="form-control">
                                                            @error('company') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Website</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "website"  placeholder="Website name" class="form-control">
                                                            @error('website') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Slogan</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "slogan" placeholder="Company slogan" class="form-control">
                                                            @error('slogan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label  class="col-lg-3 col-form-label">Website Logo</label>
                                                        <div class="col-lg-9">
                                                            <input type="file" class="form-control" wire:model = "logo">
                                                            @error('logo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                            @if($logo)
                                                                <br/><br/><img src="{{$logo->temporaryUrl()}}" alt="Random text" style="max-width: 50px;"><br>
                                                            @endif
                                                            <div wire:loading wire:target="logo">
                                                                <p class="help-block text-blue-700"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i> Loading logo preview...</p>
                                                            </div>
                                                            <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Favicon</label>
                                                        <div class="col-lg-9">
                                                            <input type="file" class="form-control" wire:model = "favicon">
                                                            @error('favicon') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                            @if($favicon)
                                                                <br/><br/><img src="{{$favicon->temporaryUrl()}}" alt="Random text" style="max-width: 50px;"><br>
                                                            @endif
                                                            <div wire:loading wire:target="favicon">
                                                                <p class="help-block text-blue-700"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i> Loading favicon preview...</p>
                                                            </div>
                                                            <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                                                            <small class="text-secondary">Accepted formats : only png and ico</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Domain</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "domain" placeholder="Domain name" class="form-control">
                                                            @error('domain') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xl-6">
                                                    <h4 class="card-title">Other details</h4>
                                                    <div class="row">
                                                        <label class="col-lg-3 col-form-label">Alerts</label>
                                                        <div class="col-lg-9">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" wire:model = "alert_email" placeholder="Alert email" class="form-control">
                                                                        @error('alert_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" wire:model = "alert_email_pass" placeholder="Email password" class="form-control">
                                                                        @error('alert_email_pass') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Email</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "email" placeholder="Official email" class="form-control">
                                                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Phone</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "phone" placeholder="Phone number" class="form-control">
                                                            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Address</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" wire:model = "address" placeholder="Company address" class="form-control m-b-20">
                                                            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" wire:model = "country" placeholder="Country/Nationality" class="form-control">
                                                                        @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" wire:model = "state" placeholder="State/Province" class="form-control">
                                                                        @error('state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">About</label>
                                                        <div class="col-lg-9">
                                                            <textarea rows="4" cols="5" class="form-control" wire:model = "about" placeholder="Enter brief information about the company.."></textarea>
                                                            @error('about') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button style="background-color: #420175 !important; border-color: #420175;" type="submit"  wire:loading.remove wire:target="updateSetting" class="btn btn-primary">Submit</button>
                                                <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading wire:target="updateSetting" class="btn btn-primary">
                                                    <i class="fa fa-spinner fa-spin"></i> Prosessing request...</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /General -->

                    <!-- Payment gateway -->
                    <div role="tabpanel" id="paymentgateway" class="tab-pane fade">
                        <livewire:payment />
                    </div>
                    <!-- /Payment gateway -->

                    <!-- Social Login -->
                    <div role="tabpanel" id="sociallogin" class="tab-pane fade">
                        <livewire:social />
                    </div>
                    <!-- /Social Login -->

                </div>
                <!-- /Tab Content -->

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

</div>

{{--<script>--}}
{{--    window.livewire.on('alert', param => {--}}
{{--       toastr[param['type']](param['message'], param['type']);--}}
{{--    });--}}
{{--</script>--}}
