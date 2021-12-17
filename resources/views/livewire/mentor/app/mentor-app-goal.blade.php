
<div class="col-md-7 col-lg-8 col-xl-9">

    <div>
        <div class="card">
            <div class="card-body">


                <!-- Profile Settings Form -->
                <form wire:submit.prevent="setGoal">
                    <div class="row form-row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>Goal of this Apprenticeship</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Set a Goal</label>
                                <small class="form-text text-muted">{{$user->name}} will see this goal.</small>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Goal Title</label>
                                <input type="text" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Example: To do this and that...">
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Details of the Goal</label>
                                <small class="form-text text-muted">A detailed explaination of the goal of this apprenticeship.</small>
                                <textarea rows="10" class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" wire:model.lazy="details" placeholder="Share some information about you goal."></textarea>
                                @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button type="submit" wire:loading.remove wire:target="setGoal" class="btn btn-primary submit-btn"  style="border-color: #420175; background-color: #420175;">Save Information</button>
                        <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="setGoal" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                    </div>
                </form>



                <!-- /Profile Settings Form -->

            </div>
        </div>
    </div>

</div>
