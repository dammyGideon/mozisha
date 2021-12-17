<div class="bg-pattern-style" xmlns:livewire="">

    <div class="content" >

        @if($showResetForm)
        <!-- Login Tab Content -->
        <div class="account-content" >
            <div class="account-box" style="max-width: 410px;">
                <div  class="login-right">
                    <div class="login-header">
                        <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                        <h3>Reset <span style="color: #420175"> password</span></h3>
                        <p style="padding-left: 35px; font-size: 12px;">Enter your email to get a password reset code.</p>
                        <x-alert />
                    </div>
                    <form action="" wire:submit.prevent="getCode">
                        <div class="form-group">
                            <label class="form-control-label">Email Address</label>
                            <input type="email" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Your email address.">
                            @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>

                        <button  style="border-radius: 50px; background-color: #420175; border-color: #420175;"  wire:loading.remove wire:target="getCode" class="btn btn-primary login-btn" type="submit">Reset password</button>
                        <button  style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading wire:target="getCode" class="btn btn-primary login-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                         <div class="text-right" style="margin-top: 5px; ">
                             <p style="font-size: 10px; margin-top: 5px;"><a class="forgot-link" style="font-size: 10px;" href="{{route('user.login')}}">Remember your password?</a>.</p>
                         </div>
                        <div style="margin-top: -30px; font-size: 12px;" class="text-center dont-have">Don’t have a Mozisha profile? <a style="color: #420175;" href="{{route('user.account')}}"> Create one</a></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->
        @endif
        @if($showTokenForm)
         <!-- Login Tab Content -->
         <div class="account-content" >
                    <div class="account-box" style="max-width: 410px;">
                        <div  class="login-right">
                            <div class="login-header">
                                <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                                <h3>Reset <span style="color: #420175"> token</span></h3>
                                <p style="padding-left: 35px; font-size: 12px;">Enter the reset token sent to your email.</p>
                                <x-alert />
                            </div>
                            <form action="" wire:submit.prevent="verifyToken">
                                <div class="form-group">
                                    <label class="form-control-label">Reset token</label>
                                    <input type="text" wire:model.lazy="token" class="form-control {{$errors->has('token')? 'is-invalid' : '' }}" placeholder="Enter your reset token.">
                                    @error('token') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>

                                <button   style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading.remove wire:target="verifyToken" class="btn btn-primary login-btn" type="submit">Verify token</button>
                                <button  style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading wire:target="verifyToken" class="btn btn-primary login-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                                <div class="text-right" style="margin-top: 5px; ">
                                    <p style="font-size: 10px; margin-top: 5px; "><a style="font-size: 12px;" class="forgot-link" href="{{route('user.login')}}">Remember your password?</a>.</p>
                                </div>
                                <div style="margin-top: -30px;  font-size: 12px;" class="text-center dont-have">Don’t have a Mozisha profile? <a href="{{route('user.account')}}"> Create one</a></div>

                            </form>
                        </div>
                    </div>
                </div>
         <!-- /Login Tab Content -->
        @endif
        @if($showChoosePass)
            <!-- Login Tab Content -->
          <div class="account-content" >
                    <div class="account-box" style="max-width: 410px;">
                        <div  class="login-right">
                            <div class="login-header">
                                <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                                <h3>Choose<span style="color: #420175;"> password</span></h3>
                                <p style="padding-left: 35px; font-size: 12px;">Enter a secured password for your account.</p>
                                <x-alert />
                            </div>
                            <form action="" wire:submit.prevent="updatePass">

                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <input id="password" type="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" wire:model.lazy="password" placeholder="Enter new password" name="password">
                                        @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Confirm Password</label>
                                        <input id="password_confirmation" type="password" class="form-control {{$errors->has('password_confirmation')? 'is-invalid' : '' }}" wire:model="password_confirmation" placeholder="Verify password"  name="password_confirmation">
                                        @error('password_confirmation') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                    </div>


                                <button   style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading.remove wire:target="updatePass" class="btn btn-primary login-btn" type="submit">Verify token</button>
                                <button  style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading wire:target="updatePass" class="btn btn-primary login-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                                <div class="text-right" style="margin-top: 5px; ">
                                    <p style="font-size: 10px; margin-top: 5px;"><a class="forgot-link" style="font-size: 10px;" href="{{route('user.login')}}">Remember your password?</a>.</p>
                                </div>
                                <div style="margin-top: -30px; font-size: 12px;" class="text-center dont-have">Don’t have a Mozisha profile? <a href="{{route('user.account')}}"> Create one</a></div>

                            </form>
                        </div>
                    </div>
                </div>
        <!-- /Login Tab Content -->
        @endif

    </div>

</div>
