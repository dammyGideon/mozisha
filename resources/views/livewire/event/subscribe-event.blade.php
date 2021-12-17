<div>

    <section>
        <div class="block gray half-parallax blackish remove-bottom">
            <div style="background:url('{{asset('event/images/moz.jpg')}}');" class="parallax"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="page-title">
                            <span>{{$event->theme}}</span>
                            <h1>REGISTRATION <span>FORM</span></h1>
                            <p>Fill the form below to be a part of this event.</p>
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
                                    <input wire:ignore class="form-control {{$errors->has('first_name')? 'is-invalid' : '' }} " name="name" type="text" wire:model.lazy="first_name" placeholder="First Name" />
                                    @error('first_name') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <input wire:ignore class="{{$errors->has('last_name')? 'is-invalid' : '' }}" name="name" type="text" wire:model.lazy="last_name" placeholder="Last Name" />
                                    @error('last_name') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <input class="{{$errors->has('country')? 'is-invalid' : '' }}"  type="text" wire:model.lazy="country"  placeholder="Country" />
                                    @error('country') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <input class="{{$errors->has('city')? 'is-invalid' : '' }}"  type="text" wire:model.lazy="city"  placeholder="City" />
                                    @error('city') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <input class="{{$errors->has('email')? 'is-invalid' : '' }}"  type="text" wire:model.lazy="email"  placeholder="Email" />
                                    @error('email') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror


                                    <select name="age_range" wire:model.lazy="age_range" class="form-control" style="height: 50px; background-color: rgba(5,2,14,0.99); color: rgba(145,145,157,0.72);">
                                        <option value="">Select your age range</option>
                                        <option value="10-20">10-20</option>
                                        <option value="10-20">21-30</option>
                                        <option value="10-20">31-40</option>
                                        <option value="10-20">41-50</option>
                                        <option value="10-20">51-60</option>
                                        <option value="10-20">61-70</option>
                                        <option value="10-20">71-80</option>
                                        <option value="10-20">81-90</option>
                                        <option value="10-20">91-100</option>
                                    </select>
                                    @error('age_range') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <input style="margin-top: 10px;"  class="{{$errors->has('phone')? 'is-invalid' : '' }}"  type="tel" id="telephone" wire:model.lazy="phone"  placeholder="Phone" />
                                    @error('phone') <span style="color: darkred; font-family: Arial;">{{ $message }}</span><br> @enderror

                                    <textarea name="details" class="{{$errors->has('details')? 'is-invalid' : '' }}"  id="comments" wire:model.lazy="details" placeholder="Why do you want to join this event? "></textarea>
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
