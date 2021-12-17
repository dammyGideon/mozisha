<div>
    <h4 class="footer-title" style="color:whitesmoke">Newsletter <i wire:loading="submitEmail" class="fa fa-spinner fa-spin"></i> </h4>
    <form action="#" wire:submit.prevent="submitEmail">
        <input wire:model.lazy="email" type="text" name="email" placeholder="Enter Your Email">
        @error('email') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror
        <button class="submit" style="font-size: 100%; color: white; border-radius: 5px; border: 1px solid #420175; background-color: #420175"><i class="fa- fa-email"></i>Submit</button>
    </form>
</div>
