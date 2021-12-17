<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body" >
        <div class="login-wrapper">
            <div class="container" >
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{asset('user/img/logo-white.png')}}" style="min-width: 80%;" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <x-alert />
                            <x-modal />
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our system</p>
                            <!-- Form -->
                            <form wire:submit.prevent="addUser">
                                <div class="form-group">
                                    <input class="form-control" wire:model="last_name" type="text" placeholder="Last Name">
                                    @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" wire:model="first_name" type="text" placeholder="First Name">
                                    @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" wire:model="email" type="text" placeholder="Email">
                                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <select class="form-control" wire:model="role">
                                        <option value="">Select Role</option>
                                        <option value="mentor">Mentor</option>
                                        <option value="mentee">Apprentice</option>
                                        <option value="writer">Writer</option>
                                        <option value="editor">Editor</option>
                                        <option value="administrator">Admin</option>
                                        <option value="superadministrator">SuperAdmin</option>
                                    </select>
                                    @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" wire:model="password" type="password" placeholder="Password">
                                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" wire:model="password_confirmation" type="password" placeholder="Confirm Password">
                                    @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" wire:loading.remove wire:target="addUser" type="submit">Register</button>
                                    <button class="btn btn-primary btn-block" wire:loading wire:target="addUser" type="submit"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing request...</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="text-center dont-have">Already have an account? <a href="{{route('admin.home')}}">Return home</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
</div>
