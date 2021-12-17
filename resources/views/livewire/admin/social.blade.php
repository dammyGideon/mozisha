<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Social Login</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                    <li class="breadcrumb-item active">Social Login</li>
                </ul>
            </div>
        </div>
    </div>
    <x-alert />
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Social login</h4>


                </div>
                <div class="card-body">
                    <form action="#" wire:submit.prevent = "updateSocial">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Fb Client Id</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="fb_client" placeholder="Facebook client ID" class="form-control">
                                @error('fb_client') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Google Client</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="google_client" placeholder="Google client ID" class="form-control">
                                @error('google_client') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Facebook</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model = "facebook" placeholder="Facebook Page" class="form-control">
                                @error('facebook') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Twitter</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model = "twitter" placeholder="Twitter handle" class="form-control">
                                @error('twitter') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Social Connects</h4>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Instagram</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="instagram" placeholder="Intagram handle" class="form-control">
                                @error('instagram') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">LinkedIn</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="linkedin" placeholder="LinkedIn Account" class="form-control">
                                @error('linkedin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Youtube</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="youtube" placeholder="Youtube channel" class="form-control">
                                @error('youtube') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Whatsapp</label>
                            <div class="col-lg-9">
                                <input type="text" wire:model="whatsapp" placeholder="Whatsapp number" class="form-control">
                                @error('whatsapp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit"  wire:loading.remove wire:target="updateSocial" class="btn btn-primary">Submit</button>
                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" wire:loading wire:target="updateSocial" class="btn btn-primary">
                                <i class="fa fa-spinner fa-spin"></i> Prosessing request...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
