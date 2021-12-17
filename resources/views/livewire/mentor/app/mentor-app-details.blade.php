<div class="col-md-7 col-lg-8 col-xl-9">

    <div>
        <div class="card alert alert-success alert-dismissible fade show" style="padding: 10px;" >
            <div class="card-body"  style="border: 1px solid black; margin: auto;">


                <!-- Profile Settings Form -->
                <form wire:submit.prevent="updateStatus" >
                    <div class="row form-row" >
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>==> Details of this apprenticeship</h4>
                                        <h6>({{$conn->status}})</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12" style="border: 1px dotted rgba(82,116,100,0.75); border-radius: 20px; margin: auto; width: 100%;">
                            <div class="form-group">
                                <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 20px;">{{$conn->apprenticeship->title}}</label>
                                <hr>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter;"><b><i>{{$conn->apprenticeship->details}}</i></b></small>
                            </div>
                            <hr>
                            <div class="form-group">

                                <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 20px;">Timing.</label>
                                <hr>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px; text-decoration: underline; color: rgba(3,90,4,0.99);"><b><i><b>Started:</b> {{$conn->created_at->format('d-M-Y')}}, {{$conn->created_at->format('h:iA')}}</i></b></small>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px;"><b><i><b>Initial Start:</b> {{$conn->initial_start_month. ', ' .$conn->initial_start_year }}</i></b></small>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px;"><b><i><b>Initial End:</b> {{$conn->initial_end_month. ', ' .$conn->initial_end_year }}</i></b></small>
                                <hr>
                                <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 20px;">Service Exchange(hrs/week).</label>
                                <hr>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px; text-decoration: underline; color: rgba(3,90,4,0.99);"><b><i><b>Mentorship period: </b> {{$conn->mentor_period}}hrs/week</i></b></small>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px;"><b><i><b>Apprentice duty:</b> {{$conn->apprentice_period }}hrs/week</i></b></small>
                                <hr>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 10px;"><b><i>We strongly advice you to stick to the agreed timing, do your part of the agreement and we beleive your apprentice will do the same.</i></b></small>


                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="row form-row" >
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>==> Goal of apprenticeship</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($goal)
                            <div class="col-12 col-md-12" style="border: 1px dotted rgba(82,116,100,0.75); border-radius: 20px; margin: auto; width: 100%;">
                                <div class="form-group">
                                    <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 20px;">{{$goal->title}}</label>
                                    <hr>
                                    <small class="form-text text-muted" style="text-align: justify; font-weight: lighter;"><b><i>{{$goal->details}}</i></b></small>
                                </div>
                            </div>
                        @else
                            <div class="col-12 col-md-12" style="border: 1px dotted rgba(82,116,100,0.75); border-radius: 20px; margin: auto; width: 100%;">
                                <div class="form-group">
                                    <label  style=" width: 100%; text-align: center; font-weight: lighter; margin-bottom: -20px; margin-top: 20px; font-size: 15px; color: red;">Goal of this aprrenticeship has not been set.</label>
                                </div>
                            </div>
                        @endif

                    </div>

                    <hr>
                    <div class="row form-row">
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>==> Status of apprenticeship</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Update Status</label><br>
                                <small>Change the status of this apprenticeship.</small>
                                <select class="form-control {{$errors->has('status')? 'is-invalid' : '' }}" wire:model.lazy="status">
                                    <option value="">Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Terminated">Terminated</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Reason</label><br>
                                <small>Tell your apprentice the reason for this update.</small>
                                <input type="text" wire:model.lazy="reason" class="form-control {{$errors->has('reason')? 'is-invalid' : '' }}" placeholder="The reason you're making this update..">
                                @error('reason') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Any Comment so far?</label><br>
                                <small>Drop a comment on this apprenticeship program, it'll be visible to your apprentice</small>
                                <small class="form-text text-muted">A detailed explaination of this task.</small>
                                <textarea rows="5" class="form-control {{$errors->has('comment')? 'is-invalid' : '' }}" wire:model.lazy="comment" placeholder="Share some comments about this apprenticeship."></textarea>
                                @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="submit-section">
                        <button type="submit" wire:loading.remove wire:target="updateStatus" class="btn btn-primary submit-btn"  style="border-color: #420175; background-color: #420175;">Update Status</button>
                        <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateStatus" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                    </div>
                </form>

<hr>
                <form wire:submit.prevent="updateComment" >
                    <div class="row form-row">
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>==> Apprenticeship comments so far!.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 ">
                            <div class="form-group">
                                {{--                                    <label>Update Status</label><br>--}}
                                <h5>==> Your Apprentice's comment.</h5>
                                @if($conn->mentee_comment)
                                    <small>{{$conn->mentee_comment}}</small>
                                @else
                                    <small>Your Apprentice has'nt commented yet!</small>
                                @endif


                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="form-group">
                                {{--                                    <label>Update Status</label><br>--}}
                                <h5>==> Your comment.</h5>
                                @if($conn->mentor_comment)
                                    <small>{{$conn->mentor_comment}}
                                        <br><i class="fas fa-close" style="cursor: pointer; color:crimson;" wire:click="removeComment"> Remove</i>
                                    </small>
                                @else
                                    <small>{{$conn->mentor_comment}}
                                        You've not commented yet!!!
                                    </small>
                                @endif

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Have a comment?</label><br>
                                <small>You can say something about this apprenticeship and it will be visible to your apprentice.</small>
                                <textarea rows="5" class="form-control {{$errors->has('comment')? 'is-invalid' : '' }}" wire:model.lazy="comment" placeholder="Share some comments on this apprenticeship."></textarea>
                                @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>


                    </div>

                    <div class="submit-section">
                        <button type="submit" wire:loading.remove wire:target="updateComment" class="btn btn-primary submit-btn"  style="border-color: #420175; background-color: #420175;">Comment</button>
                        <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateComment" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing comment..</button>
                    </div>
                </form>


                <!-- /Profile Settings Form -->

            </div>
        </div>
    </div>

</div>
