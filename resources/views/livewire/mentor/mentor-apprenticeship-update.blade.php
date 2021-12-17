<div>
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Apprenticeship</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                <p style="text-align: center;"> <small>Note: Apprenticeship programs will be updated based on your business profile, Make sure your profile is up to date. Feel free to update any information
                        about this apprenticeship..
                        GOOD LUCK!</small></p>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="form-group" style="text-align: center;" >
                                <label style="text-align: center;">{{$title}}</label>

                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Apprenticeship status</label>
                                <small class="form-text text-muted">Can be active, cancelled, suspended.</small>
                                <select class="form-control {{$errors->has('type')? 'is-invalid' : '' }}" wire:model.lazy="status">
                                    <option value="">Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Years of Experience</label>
                                @if($title)
                                    <small class="form-text text-muted">Your years of experience</small>
                                @endif
                                <input type="number" min="1" class="form-control {{$errors->has('experience')? 'is-invalid' : '' }}" wire:model.lazy="experience" placeholder="How many years of experience do you have?">
                                @error('experience') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Your Motivation</label>
                                @if($title)
                                    <small class="form-text text-muted">What motivates you into {{$title}}</small>
                                @endif
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('motivation')? 'is-invalid' : '' }}" wire:model.lazy="motivation" placeholder="What are the motivations for this program"></textarea>
                                    @error('motivation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 @if($type == 'Premium') col-sm-6 @endif">
                            <div class="form-group">
                                <label>Apprenticeship type</label>
                                <small class="form-text text-muted">Can be free or premium.</small>
                                <select class="form-control {{$errors->has('type')? 'is-invalid' : '' }}" wire:model.lazy="type">
                                    <option value="">Select apprenticeship type</option>
                                    <option value="Free">Free</option>
                                    <option value="Premium">Premium</option>
                                </select>
                                @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @if($type == 'Premium')
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Price(USD)</label>
                                    <small class="form-text text-muted">How much you will charge for this program?</small>
                                    <input type="number" class="form-control {{$errors->has('price')? 'is-invalid' : '' }}" wire:model.lazy="price">
                                    @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif

                        <div class="col-12">
                            <hr>
                            <p>Duration of the Apprenticeship program. <small>(How long is the program going to last?)</small></p>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Apprenticeship starting date</label>
                                <small class="form-text text-muted">Preferred starting date.</small>
                                <input type="date" class="form-control {{$errors->has('start_date')? 'is-invalid' : '' }}" wire:model.lazy="start_date">
                                @error('start_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Apprenticeship ending date</label>
                                <small class="form-text text-muted">Preferred ending date.</small>
                                <input type="date" class="form-control {{$errors->has('end_date')? 'is-invalid' : '' }}" wire:model.lazy="end_date">
                                @error('end_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Information about the skills to be learnt.</label>
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" wire:model.lazy="details" placeholder="Describe what the apprenticeship program is all about.."></textarea>
                                    @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>How the skills will be learnt.</label>
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('how')? 'is-invalid' : '' }}" wire:model.lazy="how" placeholder="How the apprentices will be trained."></textarea>
                                    @error('how') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Requirements of the apprenticeship.</label>
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('requirement')? 'is-invalid' : '' }}" wire:model.lazy="requirement" placeholder="What are the requirements of this program."></textarea>
                                    @error('requirement') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Practical session(hrs/week)</label>
                                <select class="form-control {{$errors->has('mentorship_period')? 'is-invalid' : '' }}" wire:model.lazy="mentorship_period" name="language">
                                    <option value="">Select Period</option>
                                    <option value="5">10</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                </select>
                                @error('mentorship_period') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Apprenticeship period(hrs/week)</label>
                                <select class="form-control {{$errors->has('apprentice_period')? 'is-invalid' : '' }}" wire:model.lazy="apprentice_period" name="language">
                                    <option value="">Select Period</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                </select>
                                @error('apprentice_period') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" wire:loading.remove wire:target="update"  class="btn btn-primary btn-block" style="background-color: #420175; border-color: #420175;">Post Apprenticeship</button>
                    <button type="submit" wire:loading wire:target="update"  class="btn btn-primary btn-block" style="background-color: #420175; border-color: #420175;"><i class="fa fa-spinner fa-spin"></i>  Processing request...</button>
                </form>
            </div>
        </div>
    </div>
</div>
