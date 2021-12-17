<div>
    <div class="row">

        <!-- Profile Sidebar -->
        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="user-widget">
                    <div class="user-info-cont">
                        <h4 class="usr-name">Professional Profile</h4>
                        <p class="mentor-type">Your Qualification.</p>
                    </div>
                </div>
                <div class="progress-bar-custom">
{{--                    <h6>Professional details</h6>--}}
{{--                    <div class="pro-progress" >--}}
{{--                        <div class="tooltip-toggle" style="background-color: #9A4EAE;" tabindex="0"></div>--}}
{{--                        <div class="tooltip">50%</div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!-- /Sidebar -->

        </div>
        <!-- /Profile Sidebar -->

        <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
                <div class="card-body">

                    <!-- Profile Settings Form -->
                    <form wire:submit.prevent="updateProfile">
                        <div class="row form-row">
                            @if(Auth::user()->hasRole('mentee'))
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label>Note:</label><br>
                                    <hr>
                                    <small>"Resume, language and your military status" are not required for this form
                                        to be processed, but we advice you to provide them, they are necessary in order for your profile to be attractive to mentors.</small>
                                </div>
                                <hr>
                            </div>
                            @endif
                            @if(Auth::user()->hasRole('mentor'))
                            <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Note:</label><br>
                                            <hr>
                                            <small>"Business information Document, language and your military status" are not required for this form
                                                to be processed, but we advice you to provide them, they are necessary in order for your business profile to look authentic to prospective apprentices.</small>
                                        </div>
                                        <hr>
                                    </div>
                            @endif
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        @if(Auth::user()->hasRole('mentor'))
                                        <div class="upload-img">

                                            <div class="change-photo-btn" style="background-color: #420175;">
                                                <span><i class="fa fa-upload"></i> Document</span>
                                                <input type="file" wire:model="resume" class="upload">
                                            </div>
                                            @if($old_resume)
                                                <div class="profile-img">
                                                    <p>Current resume: <a href="{{$old_resume_path}}" target="_blank"> {{ $old_resume }}</a></p>
                                                </div>
                                            @endif
                                            @if($resume)
                                                <div class="profile-img">
                                                    <p>{{ $resume->getClientOriginalName()}}</p>
                                                </div>
                                            @endif
                                            <small wire:loading wire:target="resume" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>
                                            <small wire:loading.remove wire:target="resume" class="form-text text-muted">Allowed PDF, DOCS or DOC. Max size of 2MB</small>
                                            @error('resume') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </div>
                                        @else
                                        <div class="upload-img">

                                                <div class="change-photo-btn" style="background-color: #420175;">
                                                    <span><i class="fa fa-upload"></i> Resume</span>
                                                    <input type="file" wire:model="resume" class="upload {{$errors->has('resume')? 'is-invalid' : '' }}">
                                                </div>
                                                @if($old_resume)
                                                    <div class="profile-img">
                                                        <p>Current resume: <a href="{{$old_resume_path}}" target="_blank"> {{ $old_resume }}</a></p>
                                                    </div>
                                                @endif
                                                @if($resume)
                                                    <div class="profile-img">
                                                        <p>{{ $resume->getClientOriginalName()}}</p>
                                                    </div>
                                                @endif
                                                <small wire:loading wire:target="resume" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>
                                                <small wire:loading.remove wire:target="resume" class="form-text text-muted">Allowed PDF, DOCS or DOC. Max size of 2MB</small>
                                                @error('resume') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Current Location<span style="color: red">* </span> (Required)</label>
                                    <input type="text" class="form-control {{$errors->has('location')? 'is-invalid' : '' }}" wire:model.lazy="location">
                                    @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    @if(Auth::user()->hasRole('mentor'))
                                    <label>Tell your apprentices about language you can speak.</label>
                                    @else
                                    <label>Tell your mentors about language you can speak.</label>
                                    @endif
                                    <select class="form-control {{$errors->has('languages')? 'is-invalid' : '' }}" wire:model.lazy="languages" name="language">
                                        <option value="English">Select Language</option>
                                        <option value="English">English</option>
                                        <option value="Pidging">Pidgin</option>
                                        <option value="Yoruba">Yoruba</option>
                                        <option value="Hausa">Hausa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <span class="or-line"></span>
                                <br>
                            </div>
                            <div class="col-12 col-md-6">


                                <div class="form-group">
                                    <div class="alert alert-success alert-dismissible fade show" style="text-align: center;" role="alert">
                                        <label style="text-decoration: underline;">Languages you speak <i wire:loading wire:target="removeLanguage" class="fa fa-spinner fa-spin"></i>
                                            <i wire:loading wire:target="insertOtherLanguage" class="fa fa-spinner fa-spin"></i></label><br>
                                    </div>
                                    @if($old_languages)
                                        <ol class="alert alert-success alert-dismissible fade show" style="padding-left: 40px;" >
                                            @foreach($old_languages as $language)
                                            <li wire:click="removeLanguage({{$language->id}})" style="cursor: pointer; font-weight: bold;" > <small style="font-weight: bold;">{{$language->language}} </small></li>
                                            @endforeach
                                        </ol>

                                    @endif
                                </div>




                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <small style="cursor: pointer;" wire:click="showLanguageForm" class="form-text text-muted"><li class="fa fa-plus"></li> Add language</small>
                                </div>
                            </div>


                            @if($showForm == true)
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Add other languages you can speak. <li wire:click="hideLanguageForm" style="cursor: pointer;" class="fa fa-minus-circle"></li></label>
                                    <select class="form-control {{$errors->has('other_language')? 'is-invalid' : '' }}" wire:model.lazy="other_language" name="language[]">
                                        <option value="">Select Language</option>
                                        <option value="English">English</option>
                                        <option value="Pidging">Pidgin</option>
                                        <option value="Yoruba">Yoruba</option>
                                        <option value="Hausa">Hausa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <small style="cursor: pointer;" wire:click="insertOtherLanguage" class="form-text text-muted"><li class="fa fa-check"></li> Save language</small>
                                </div>
                            </div>
                            @endif
                            <div class="col-12">
                                <span class="or-line"></span>
                                <br>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>If you're a military veteran, you can display it on your profile.</label><br>
                                    <input wire:model.lazy="military"  type="checkbox" value="Yes" >
                                    <label>I'm a military veteran</label>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" wire:loading.remove wire:target="updateProfile" class="btn btn-primary submit-btn" style="border-color: #420175; background-color: #420175;">Save Profile</button>
                            <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateProfile" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                        </div>
                    </form>
                    <!-- /Profile Settings Form -->

                </div>
            </div>
        </div>
    </div>
</div>
