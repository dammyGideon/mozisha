<div>

    <section>
        <div class="block gray half-parallax blackish remove-bottom">
            <div style="background:url('{{asset('event/images/moz.jpg')}}');" class="parallax"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="page-title">
                            <span>Become our sponsor today</span>
                            <h1>PATRON <span>FORM</span></h1>
                            <p>Fill the form below to be a part of this community.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-gap gray" >
            <div class="container" >
                <div class="row" >
                    <div class="col-md-offset-1 col-md-10 column" >
                        <br><br>

                        <div class="widget">
                            <x-alert />
                            <h1 style="text-align: center;">Please fill this form</h1>
                            <div id="message"></div>
                            <form  method="post" wire:submit.prevent="submitRequest" >
                                <input wire:ignore class="{{$errors->has('name')? 'is-invalid' : '' }}" name="name" type="text" wire:model.lazy="name" placeholder="Full Name" />
                                @error('name') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror


                                <input class="{{$errors->has('email')? 'is-invalid' : '' }}"  type="text" wire:model.lazy="email"  placeholder="Email" />
                                @error('email') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                <input  class="{{$errors->has('phone')? 'is-invalid' : '' }}"  type="text" wire:model.lazy="phone"  placeholder="Phone" />
                                @error('phone') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                <textarea name="details" class="{{$errors->has('details')? 'is-invalid' : '' }}"  id="comments" wire:model.lazy="details" placeholder="Why do you want to sponsor us? "></textarea>
                                @error('details') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                <button class="button" wire:loading="submitRequest" type="submit"  style="background-color: #420175;"> <i class="fa fa-spinner fa-spin"></i> PROCESSING REQUEST...</button>
                                <button class="button" wire:loading.remove="submitRequest" type="submit" style="background-color: #420175;">SUBMIT REQUEST</button>
                            </form>
                        </div><!-- SUB Form Widget -->

                    </div>
                </div>
            </div>
        </div>
    </section><!-- Become a Sponsor -->


</div>
