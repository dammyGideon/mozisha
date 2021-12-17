<div class="bg-pattern-style" xmlns:livewire="">

    <div class="content" >

        <!-- Login Tab Content -->
        <div class="account-content" >
            <div class="account-box" style=" padding-top: 13px; padding-bottom: 10px;">
                <div  class="login-right">
                    <div class="login-header">
                        <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                        <h3>Sign in to<span style="color: #420175;"> Mozisha</span></h3>

                        <x-alert />
                    </div>
                    
                    <form action="" wire:submit.prevent="login">
                        <div class="form-group">
                            <label class="form-control-label">Email Address</label>
                            <input type="email" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}">
                            @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <div class="pass-group">
                                <input type="password" wire:model.lazy="password" class="form-control pass-input {{$errors->has('password')? 'is-invalid' : '' }}">
                                <span class="fas fa-eye toggle-password"></span>
                                @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button wire:loading.remove wire:target="login" class="btn btn-primary login-btn" type="submit" style="background-color: #420175; border-radius: 50px;">Login</button>
                        <button style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading wire:target="login" class="btn btn-primary login-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                        <p style="font-size: 10px; text-align: center;">By continuing, you agree to Mozisha’s <u>Terms of Service</u>.</p>
                        <div class="text-right" style="margin-top: -13px;">
                            <a class="forgot-link" href="{{route('password.reset')}}" style="font-size: 10px;">Forgot Password ?</a>
                        </div>
                        <div style="margin-top: -11px; font-size: 10px; " class="text-center dont-have">Don’t have a Mozisha profile? <a href="{{route('user.account')}}" style="color: #420175;"> Create one</a></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->

    </div>

</div>
