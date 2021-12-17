<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Change Password</h5>
            <x-pass />
            <div class="row">

                <div class="col-md-10 col-lg-6">
                    <form wire:submit.prevent="updatePassword">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" wire:model="old_password" placeholder="Current password" class="form-control">
                            @error('old_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" wire:model="password" placeholder="Choose new password" class="form-control">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" wire:model="password_confirmation"  placeholder="Confirm password" class="form-control">
                            @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <button class="btn btn-primary" wire:loading.remove wire:target="updatePassword"  type="submit">Save Changes</button>
                        <button class="btn btn-primary" wire:loading wire:target="updatePassword"  type="submit"><i class="fa fa-spinner fa-spin"></i> Saving Changes...</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
