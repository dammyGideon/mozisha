<div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Meeting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--            <div class="modal-header">--}}
            {{--                <p style="text-align: center;"> <small>Note that your apprentice will be notified about this new meeting and its details.</small></p>--}}
            {{--            </div>--}}

            <div class="modal-body">
                <form wire:submit.prevent="newMeeting">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Platform</label>
                                <small class="form-text text-muted">Preferred Meeting platform.</small>
                                <select class="form-control {{$errors->has('platform')? 'is-invalid' : '' }}" wire:model.lazy="platform">
                                    <option value="">Select Platform</option>
                                    <option value="Google_Meet">Google Meet</option>
                                    <option value="Zoom">Zoom</option>
                                </select>
                                @error('platform') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Date</label>
                                <small class="form-text text-muted">Scheduled Date.</small>
                                <input type="date" wire:model.lazy="date" class="form-control {{$errors->has('date')? 'is-invalid' : '' }}" placeholder="Date of the meeting.">
                                @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-text text-muted">Time.</label>
                                <input type="time" class="form-control {{$errors->has('time')? 'is-invalid' : '' }}" wire:model.lazy="time">
                                @error('time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-text text-muted">Duration</label>
                                <select class="form-control {{$errors->has('duration')? 'is-invalid' : '' }}" wire:model.lazy="duration">
                                    <option value="">Select Duration</option>
                                    <option value="10">10mins</option>
                                    <option value="15">15mins</option>
                                    <option value="20">20mins</option>
                                    <option value="25">25mins</option>
                                    <option value="30">30mins</option>
                                    <option value="35">35mins</option>
                                    <option value="40">40mins</option>
                                    <option value="45">45mins</option>
                                    <option value="50">50mins</option>
                                    <option value="55">55mins</option>
                                    <option value="60">1 hr</option>
                                    <option value="75">Above 1hr 15mins</option>
                                    <option value="90">Above 1hr 30mins</option>
                                    <option value="105">Above 1hr 45mins</option>
                                    <option value="120">Above 2hrs</option>
                                    <option value="135">Above 2hrs 15mins</option>
                                    <option value="150">Above 2hrs 30mins</option>
                                    <option value="165">Above 2hrs 45mins</option>
                                    <option value="180">Above 3hrs</option>
                                    <option value="195">Above 3hrs 15mins</option>
                                    <option value="210">Above 3hrs 30mins</option>
                                    <option value="225">Above 3rs 45mins</option>
                                    <option value="250">Above 4hrs</option>
                                    <option value="00">Unpredictable</option>
                                </select>
                                @error('duration') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Topic</label>
                                <div class="form-group">
                                    <input type="text" class="form-control {{$errors->has('topic')? 'is-invalid' : '' }}" wire:model.lazy="topic"
                                           placeholder="Topic the  of meeting">
                                    @error('topic') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" wire:model.lazy="details"
                                              placeholder="Details of the meeting.."></textarea>
                                    @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Meeting link</label>
                                <small class="form-text text-muted">Meeting link.</small>
                                <input type="text" class="form-control {{$errors->has('link')? 'is-invalid' : '' }}" wire:model.lazy="link">
                                @error('link') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Meeting id</label>
                                <input type="text" class="form-control {{$errors->has('meeting_id')? 'is-invalid' : '' }}" wire:model.lazy="meeting_id">
                                @error('meeting_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Meeting passcode</label>
                                <input type="text" class="form-control {{$errors->has('passcode')? 'is-invalid' : '' }}" wire:model.lazy="passcode">
                                @error('passcode') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading.remove wire:target="newMeeting"
                             class="btn btn-primary btn-block">Initiate meeting
                    </button>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="newMeeting"
                             class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing
                        request...
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
