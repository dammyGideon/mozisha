
<div>
    <div class="bg-pattern-style bg-pattern-style-register">
        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Account Content -->
                        <div class="account-content" >
                            <div class="row align-items-center justify-content-center" >
                                <div class="card col-md-12 col-lg-6 login-right" style="border-radius: 40px;">
                                    <div class="card-body" style=" padding-top: 13px; padding-bottom: 10px; ">
                                        <div class="login-header" >
                                            <img style="max-width: 25px; margin-right: 8px; margin-left: 14px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                                            <h3>Sign up <span style="color: #420175;"> | Mozisha </span></h3>
                                            <br>
                                            

                                        </div>


                                        <!-- Register Form -->
                                        <form action="#" wire:submit.prevent="addUser">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">First Name</label>
                                                        <input id="first-name" type="text" class="form-control {{$errors->has('first_name')? 'is-invalid' : '' }}" wire:model.lazy="first_name" name="name" autofocus="">
                                                        @error('first_name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Last Name</label>
                                                        <input id="last-name" type="text" class="form-control {{$errors->has('last_name')? 'is-invalid' : '' }}" wire:model.lazy="last_name" name="last_name">
                                                        @error('last_name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <input id="email" type="email"  wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}">
                                                @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Password</label>
                                                        <input id="password" type="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" wire:model.lazy="password" name="password">
                                                        @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control {{$errors->has('password_confirmation')? 'is-invalid' : '' }}" wire:model.lazy="password_confirmation" name="password_confirmation">
                                                        @error('password_confirmation') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <div class="custom-control custom-control-xs custom-checkbox">--}}
                                            {{--                                                    <input type="checkbox" wire:model="terms" style="float: left" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user">--}}
                                            {{--                                                    <label class="custom-control-label" for="agree_checkbox_user" style="font-size: 10px;">I agree to Apprenticeship Terms and condition.</label>--}}
                                            {{--                                                    @error('terms')<br> <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <label  style="font-size: 10px;">By clicking 'Create Account, you agree to our Apprenticeship Terms and condition.</label>
                                            <button class="btn btn-primary login-btn" wire:loading.remove wire:target="addUser" type="submit" style="background-color: #420175; margin-bottom: -15px;">Create Account</button>
                                            <button class="btn btn-primary login-btn" wire:loading wire:target="addUser" type="submit" style="background-color: #420175; border-color: #420175;"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                                            <div class="account-footer text-center mt-3" style="font-size: 10px;">
                                                Already have an account? <a class="forgot-link mb-0" href="{{route('login')}}" style="color: #420175;  ">Login</a>
                                            </div>
                                        </form>
                                        <!-- /Register Form -->

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Account Content -->

                    </div>
                </div>

            </div>

        </div>
        <!-- /Page Content -->
    </div>

</div>
