<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body" >
        <div class="login-wrapper">
            <div class="container" >
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{asset('admin/img/logo-white.png')}}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Choose a password </p>
                            <x-alert />
                            <x-modal />
                            <!-- Form -->
                            <form wire:submit.prevent="updatePassword">
                                <div class="form-group">
                                    <input class="form-control" wire:model="password" type="password" placeholder="Password">
                                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" wire:model="password_confirmation" type="password" placeholder="Confirm Password">
                                    @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" wire:loading.remove wire:target="updatePassword" type="submit">Register</button>
                                    <button class="btn btn-primary btn-block" wire:loading wire:target="updatePassword" type="submit"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing request...</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <span>Register with</span>
                                <a href="{{route('auth.facebook')}}" class="facebook"><i class="fa fa-facebook"></i></a><a href="{{route('auth.google')}}" class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->

                            <div class="text-center dont-have">Already have an account? <a href="{{route('admin.home')}}">Return home</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
</div>
