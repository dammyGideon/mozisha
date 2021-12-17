<div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rate your mentor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--            <div class="modal-header">--}}
            {{--                <p style="text-align: center;"> <small>Note that your apprentice will be notified about this new meeting and its details.</small></p>--}}
            {{--            </div>--}}

            <div class="modal-body">
                <form wire:submit.prevent="dropRate">
                    <div class="row form-row">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label>Rating</label>
                                <small class="form-text text-muted">Preferred performance rate.</small>
                                <select class="form-control {{$errors->has('rate')? 'is-invalid' : '' }}" wire:model.lazy="rate">
                                    <option value="">Select performance</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very good</option>
                                    <option value="3">good</option>
                                    <option value="2">Fair</option>
                                    <option value="1">Poor</option>
                                </select>
                                @error('rate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label>Comment</label>
                                <small class="form-text text-muted">Tell us something about your mentor's overall performance, it'll help other apprentices make the right choice.</small>
                                <div class="form-group">
                                    <textarea class="form-control {{$errors->has('comment')? 'is-invalid' : '' }}" wire:model.lazy="comment"
                                              placeholder="Details of your mentor's performance..."></textarea>
                                    @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading.remove wire:target="dropRate"
                             class="btn btn-primary btn-block">Drop Rating
                    </button>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="dropRate"
                             class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing
                        request...
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
