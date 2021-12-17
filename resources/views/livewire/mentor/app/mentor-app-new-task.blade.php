<div class="col-md-7 col-lg-8 col-xl-9">

 <div>
        <div class="card">
            <div class="card-body">


                <!-- Profile Settings Form -->
                <form wire:submit.prevent="setTask">
                    <div class="row form-row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>Upload a new Task</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Set a new task for {{$user->name}}</label>
                                <small class="form-text text-muted"><b><i>All target apprentices will see this task.</i></b></small>
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
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Submission date</label>
                                <input type="date" wire:model.lazy="deadline" class="form-control {{$errors->has('deadline')? 'is-invalid' : '' }}">
                                @error('deadline') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Task Title</label>
                                <input type="text" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Example: To do this and that...">
                                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label style="font-weight: bold;">Target Apprentices</label>
                            <div class="form-group">
                                @if($connects)
                                    @foreach($connects as $conn)
                                        <input type="checkbox" value="{{$conn->mentee->email}}" wire:model.lazy="students"> <label for="{{$conn->mentee->email}}">{{$conn->mentee->name}}</label><br>
                                    @endforeach
                                @endif
                                @error('students') <span class="text-red-500 text-xs" >{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Details of this task</label>
                                <small class="form-text text-muted">Give a detailed explaination of this task.</small>
                                <textarea name="details" rows="5" class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" wire:model.lazy="details" placeholder="Share some information about this task."></textarea>
                                @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Resource link 1(Optional)</label>
                                <input type="text" wire:model.lazy="link_1" class="form-control {{$errors->has('link_1')? 'is-invalid' : '' }}" placeholder="Add link to a useful resource...">
                                @error('link_1') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Resource link 2(Optional)</label>
                                <input type="text" wire:model.lazy="link_2" class="form-control {{$errors->has('link_2')? 'is-invalid' : '' }}" placeholder="Add link to a useful resource...">
                                @error('link_2') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Attachment(Optional)</label>
                                <input type="file"  wire:model.lazy="attach" class="form-control {{$errors->has('attach')? 'is-invalid' : '' }}">
                                @error('attach') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button type="submit" wire:loading.remove wire:target="setTask" class="btn btn-primary submit-btn"  style="border-color: #420175; background-color: #420175;">Upload Task</button>
                        <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="setTask" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing task...</button>
                    </div>
                </form>

		 <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('details');
                </script>

                <!-- /Profile Settings Form -->

            </div>
        </div>
    </div>

</div>
