<div class="bg-pattern-style" xmlns:livewire="">

    <div class="content">

        <!-- Login Tab Content -->
        <div class="account-content" >
            <div class="account-box" style="max-width: 410px;">
                <div  class="login-right">
                    <div class="login-header">
                        <img style="max-width: 25px; margin-right: 8px; float: left;" src="{{asset('user/img/cdiya.png')}}" class="img-responsive"/>
                        <h3>Reset <span style="color: #420175;"> token</span></h3>
                        <p style="padding-left: 35px;">Enter the reset token to your email.</p>
                        <x-alert />
                    </div>
                    <form action="" wire:submit.prevent="getCode">
                        <div class="form-group">
                            <label class="form-control-label">Reset token</label>
                            <input type="text" wire:model.lazy="email" class="form-control">
                            @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>

                        <button   style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading.remove wire:target="getCode" class="btn btn-primary login-btn" type="submit">Verify token</button>
                        <button  style="border-radius: 50px; background-color: #420175; border-color: #420175;" wire:loading wire:target="getCode" class="btn btn-primary login-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                        <div class="text-right" style="margin-top: 5px; ">
                            <p style="font-size: 10px; margin-top: 5px;"><a class="forgot-link" href="{{route('user.login')}}">Remember your password?</a>.</p>
                        </div>
                        <div style="margin-top: -30px; " class="text-center dont-have">Don’t have a Mozisha profile? <a href="{{route('user.account')}}"> Create one</a></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->

    </div>

</div>
