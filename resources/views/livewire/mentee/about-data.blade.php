<div>
    <div class="row">

        <!-- Profile Sidebar -->
        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="user-widget">
                    <div class="user-info-cont">
                        <h4 class="usr-name">Skills</h4>
                        <p class="mentor-type">Say something about yourself.</p>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->

        </div>
        <!-- /Profile Sidebar -->

        <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
                <div class="card-body">

                    <!-- Profile Settings Form -->
                    <form wire:submit.prevent="updateAbout">
                        <div class="row form-row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="upload-img">
                                            <h4>Skills</h4>
                                            <small class="form-text text-muted">Tell your mentor about yourself and what you're looking to learn from an apprenticeship.</small>
                                            <hr>
                                            
                                        <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Looking for apprenticeship in? (First Choice)</label>
                                    <select class="form-control" wire:model.lazy="preferred_skill" name="preferred_skill">
                                        <option value="Null">Select Skill</option>
                                        <option value="Blockchain Technology">Blockchain Technology</option>
                                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                                        <option value="Web Development">Web Development</option>
                                        <option value="Graphics Design">Graphics Design</option>
                                        <option value="UX Design">UX Design</option>
                                        <option value="Affiliate Marketing">Affiliate Marketing</option>
                                        <option value="Copy Writing">Copy Writing</option>
                                        <option value="Data Analytics">Data Analytics</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                        <option value="Cloud Computing">Cloud Computing</option>
                                        <option value="Mobile App Development">Mobile App Development</option>
                                        <option value="Audio Production">Audio Production</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Translation">Translation</option>
                                        <option value="Textile/Fashion Designing">Textile/Fashion Designing</option>
                                        <option value="Hand Leather Bag Sewing">Hand Leather Bag Sewing</option>
                                        <option value="Shoe-Making">Shoe-Making</option>
                                        <option value="Catering">Catering</option>
                                        <option value="Interior Decoration">Interior Decoration</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Looking for apprenticeship in? (Second Choice)</label>
                                    <select class="form-control" wire:model.lazy="less_preferred_skill" name="less_preferred_skill">
                                        <option value="Null">Select Skill</option>
                                        <option value="Blockchain Technology">Blockchain Technology</option>
                                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                                        <option value="Web Development">Web Development</option>
                                        <option value="Graphics Design">Graphics Design</option>
                                        <option value="UX Design">UX Design</option>
                                        <option value="Affiliate Marketing">Affiliate Marketing</option>
                                        <option value="Copy Writing">Copy Writing</option>
                                        <option value="Data Analytics">Data Analytics</option>
                                        <option value="Video Production">Video Production</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                        <option value="Cloud Computing">Cloud Computing</option>
                                        <option value="Mobile App Development">Mobile App Development</option>
                                        <option value="Audio Production">Audio Production</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Translation">Translation</option>
                                        <option value="Textile/Fashion Designing">Textile/Fashion Designing</option>
                                        <option value="Hand Leather Bag Sewing">Hand Leather Bag Sewing</option>
                                        <option value="Shoe-Making">Shoe-Making</option>
                                        <option value="Catering">Catering</option>
                                        <option value="Interior Decoration">Interior Decoration</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Level of Competency in First Choice?</label>
                                    <select class="form-control" wire:model.lazy="expertise_in_preferred_skill" name="expertise_in_preferred_skill">
                                        <option value="Null">Select...</option>
                                        <option value="Blockchain Technology">Beginner</option>
                                        <option value="Artificial Intelligence">Intermediate </option>
                                        <option value="Web Development">Advanced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Level of Competency  in Second Choice?</label>
                                    <select class="form-control" wire:model.lazy="expertise_in_less_preferred_skill" name="expertise_in_less_preferred_skill">
                                        <option value="Null">Select...</option>
                                        <option value="Blockchain Technology">Beginner</option>
                                        <option value="Artificial Intelligence">Intermediate </option>
                                        <option value="Web Development">Advanced</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Familiar tools</label>
                                    <small class="form-text text-muted">Share what tools you're familiar with, separated by comma.</small>
                                    <input type="text" class="form-control"  wire:model.lazy="tool" placeholder="Enter any familiar tool(s)...">

                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading.remove wire:target="updateAbout" class="btn btn-primary submit-btn" style="border-color: #9A4EAE;">Save Profile</button>
                            <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateAbout" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                        </div>
                    </form>
                    <!-- /Profile Settings Form -->

                </div>
            </div>
        </div>
    </div>
</div>
