<div class="bg-pattern-style">
    <div class="content">

        <!-- Login Tab Content -->
        <div class="account-content" >
            <div class="account-box" style="max-width: 410px;">
                <div  class="login-right">
                    <div class="login-header">
                        <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                        <h3>Choose <span style="color: #420175;"> password</span></h3>

                        <x-alert />
                    </div>
                    <div class="login-header">
                        <div class="row form-row social-login" >
                            <div class="col-12" >
                                <a style="border-radius: 60px;"href="{{route('auth.google')}}" class="btn btn-default btn-block signup-google"> Sign in with<i class="ml-1"><img src="{{asset('user/img/google-logo.jpg')}}" alt="google-logo" style="width:70px;height:40px"/></i></a>
                            </div>
                        </div>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">Lastly</span>
                        </div>

                    </div>
                    <!-- Register Form -->
                        <form action="" wire:submit.prevent="updatePassword">
{{--                        <div class="form-group">--}}
{{--                            <label class="focus-label">Select account role</label>--}}
{{--                            <select class="form-control" wire:model="role">--}}
{{--                                <option value="">Choose account role</option>--}}
{{--                                <option value="mentee">Apprentice</option>--}}
{{--                                <option value="mentor">Mentor</option>--}}
{{--                            </select>--}}
{{--                            @error('role') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <input class="form-control" wire:model.lazy="password" type="password" placeholder="Password">
                            @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" wire:model.lazy="password_confirmation" type="password" placeholder="Confirm Password">
                            @error('password_confirmation') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-12" style="margin-bottom: 10px;">
                                <button style="background-color: #420175;" wire:loading.remove wire:target="updatePassword" class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
                                <button style="background-color: #420175;" wire:loading wire:target="updatePassword" class="btn btn-outline-warning btn-block btn-lg login-btn" type="submit"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                            </div>
                            <div class="col-md-6 col-12 col-12 text-right">
                                <a href="{{route('user.login')}}" class="forgot-link" style="font-size: 11px;">Already a member?</a>
                            </div>

                        </div>

                    </form>
                    <!-- /Register Form -->
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->

    </div>

</div>








