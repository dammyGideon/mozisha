<div>
    <div class="search-event">
        <h4>Want The Latest Event News <i wire:loading="submitEmail" class="fa fa-spinner fa-spin"></i> </h4>
        <span>Subscribe To Our News Letter And get notifications on our subsequent events.</span>
        <form wire:submit.prevent="submitEmail">
            <input type="text" wire:model.lazy="email" placeholder="Enter Your E-mail Address" />

            <input type="submit" style="background-color: #420175;" value="Submit Now "/>
         @error('email') <span style="color: wheat; font-family: Arial;">{{ $message }}</span><br> @enderror
        </form>
    </div><!-- Subscribe Events -->
</div>
