<div class="col-md-7 col-lg-8 col-xl-9">
    <!-- Cards -->
    <!--check for the typ efo view-->

    @if($showTasks)


        <div class="doc-review review-listing">

            <!-- Review Listing -->
            <ul class="comments-list">
            @if($tasks)
                <!-- Comment List -->
                    @foreach($tasks as $task)
                        <li>
                            <div class="comment">
                                <img class="avatar rounded-circle" alt="User Image" src="{{$task->mentor->ImagePath}}">
                                <div class="comment-body">
                                    <div class="meta-data">
                                <span class="comment-author">{{$task->title}}
                                    @if($task->status == 'Unseen')
                                        <sup style="color: rgba(187,4,10,0.92)"> unseen</sup>
                                    @endif
                                </span>
                                        <span class="comment-date">Assigned {{$task->created_at->diffForHumans()}}</span>
                                        {{--                                <div class="review-count rating">--}}
                                        {{--                                    <i class="fas fa-star filled"></i>--}}
                                        {{--                                    <i class="fas fa-star filled"></i>--}}
                                        {{--                                    <i class="fas fa-star filled"></i>--}}
                                        {{--                                    <i class="fas fa-star filled"></i>--}}
                                        {{--                                    <i class="fas fa-star"></i>--}}
                                        {{--                                </div>--}}
                                    </div>

                                    @if(count($task->responses) > 0)
                                        <p class="recommended"><i class="far fa-thumbs-up"></i> A solution has been provided for this task.</p>
                                    @else
                                        <p class="recommended" style="color: rgba(187,4,10,0.92);"><i class="far fa-thumbs-down"></i> No solution is available for this task.</p>
                                    @endif
                                    <p class="comment-content">
                                        {{ Str::limit($task->details, $limit = 500, $end = '...') }}
                                    </p>
                                    <div class="comment-reply">
                                        <a class="comment-btn" href="#" wire:click="removeTask({{$task->id}})" style="color: rgba(187,4,10,0.92);">
                                            <i wire:loading.remove wire:target="removeTask({{$task->id}})" class="fa fa-trash"></i> <i wire:loading wire:target="removeTask({{$task->id}})" class="fa fa-spinner fa-spin"></i> Delete
                                        </a>
                                        <p class="recommend-btn">
                                            <span>Explore </span>
                                            <a  style="cursor: pointer;" class="like-btn" wire:click="viewTask({{$task->id}})">
                                                <i wire:loading.remove wire:target="viewTask({{$task->id}})" class="far fa-eye"></i><i wire:loading wire:target="viewTask({{$task->id}})" class="fa fa-spinner fa-spin"></i> View
                                            </a>
                                            <a class="dislike-btn" data-toggle="modal" href="#mentor_new_meeting">
                                                <i class="far fa-edit"></i> Book Meeting
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                <!-- /Comment List -->
                @endif


            </ul>
            <!-- /Comment List -->

        </div>
    @endif
<!-- /Cards -->
    <style>
        .nav-link .active{
            background-color: #420175;
        }
    </style>
    @if($viewTask)
        <section class="comp-section" >
            <div class="comp-header">
                <h3 class="comp-title">Task Details</h3>
                <div class="line"></div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-view">


                        <div class="blog blog-single-post">
                            @if($editForm)
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <form wire:submit.prevent="updateTask" enctype="multipart/form-data">

                                                <div class="row form-row">
                                                    <div class="col-12 col-md-12">
                                                        <h4 style="text-align: center;">Update this task</h4>
                                                    </div>
                                                    <div class="col-12">

                                                        <small style="text-align: center;" class="form-text text-muted"><b><i>{{$user->name}} will see this update.</i></b></small>
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
                                                        <label>Title</label>
                                                        <input type="text" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Example: To do this and that...">
                                                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Details of this solution</label>
                                                        <small class="form-text text-muted">A detailed explanation of the task.</small>
                                                        <textarea rows="5" class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" wire:model.lazy="details" placeholder="Share some information about this solution."></textarea>
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
                                                        @if($attach_name)
                                                        <u><small style="color: #420175; display: block;">Current attachment: <a target="_blank" href="{{$task->FilePath}}">{{$attach_name}}</a> </small></u>
                                                        @endif
                                                        <small>Max file 1mb; for bigger files, use Google Drive and share link using the space above</small>

                                                        <input type="file" wire:model="attach" class="form-control {{$errors->has('attach')? 'is-invalid' : '' }}">
                                                        @error('attach') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="submit-section">
                                                <button type="submit" wire:loading.remove wire:target="updateTask" class="btn btn-primary submit-btn" style="border-color: #9A4EAE;">Submit</button>
                                                <button type="submit" wire:loading wire:target="updateTask" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing...</button>

                                                @if($editForm)
                                                    <button type="button" wire:click="hideEditForm" wire:loading.remove wire:target="hideEditForm" class="btn btn-warning">Cancel</button>
                                                    <button type="button" wire:loading wire:target="hideEditForm" class="btn btn-warning"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                                @endif

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <h3 class="blog-title">{{$task->title}}</h3>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            {{--                                        <li>--}}
                                            {{--                                            <div class="post-author">--}}
                                            {{--                                                <a href="profile.html"><img src="assets/img/user/user.jpg" alt="Post Author"> <span>Marvin Downey</span></a>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </li>--}}
                                            <li><i class="far fa-calendar"></i>{{$task->created_at->format('d M Y')}}</li>
                                            <li><i class="far fa-clock"></i>{{$task->deadline}}</li>
                                            <li><i class="fa fa-tags"></i>Last Updated: {{$task->updated_at->format('d M Y')}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <p>{{$task->details}}</p>
                                </div>
                                <div class="card-body">
                                    <ul class="social-share">
                                        <li wire:click="showEditForm"><a  title="Edit this task"><i wire:loading.remove wire:target="showEditForm" class="fa fa-edit"></i>  <i wire:loading wire:target="showEditForm" class="fa fa-spinner fa-spin"></i> </a> Edit Task</li>
                                    </ul>
                                </div>
                            @endif

                        </div>


                        <div class="card blog-share clearfix">
                            <div class="card-header">
                                <h4 class="card-title">File attached with this task.</h4>
                            </div>
                            <div class="card-body">
                                @if($task->file_original_name)
                                    <ul class="social-share" style="width: 100%;">
                                        <li><a target="_blank" href="{{$task->FilePath}}" style="width: 100%;" title="Facebook"><i class="fa fa-file"></i> {{$task->file_original_name}}</a></li>
                                    </ul>
                                @else
                                    <ul class="social-share">
                                        <li><a target="_blank" href="#" title="Facebook"><i class="fa fa-file"></i></a>  No file Attached.</li>
                                    </ul>
                                @endif
                            </div>

                            <hr>
                            <div class="card-header">
                                <h5 class="card-title">Links attached with this task.</h5>
                            </div>
                            <div class="card-body">
                                @if($task->link_1)
                                    <ul class="nav-link">
                                        <li><a target="_blank" href="{{$task->link_1}}" title="Facebook"><i class="fa fa-file"></i>  {{$task->link_1}}</a></li>
                                    </ul>
                                @endif
                                @if($task->link_2)
                                    <ul class="nav-link">
                                        <li><a target="_blank" href="{{$task->link_2}}" title="Facebook"><i class="fa fa-file"></i>  {{$task->link_2}}</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="card author-widget clearfix">
                            <div class="card-header">
                                <h4 class="card-title">Solution to the task</h4>
                            </div>


                            <div class="blog blog-single-post">
                                @if(!$response)
                                    <h3 class="blog-title" style="text-align: center; color: rgba(187,4,10,0.92);">Your apprentice has not provided a solution to this task</h3>
                                @else
                                    <h4 class="card-title">{{$response->title}}</h4>
                                    <div class="blog-info clearfix">
                                        <div class="post-left">
                                            <ul>
                                                {{--                                        <li>--}}
                                                {{--                                            <div class="post-author">--}}
                                                {{--                                                <a href="profile.html"><img src="assets/img/user/user.jpg" alt="Post Author"> <span>Marvin Downey</span></a>--}}
                                                {{--                                            </div>--}}
                                                {{--                                        </li>--}}
                                                <li><i class="far fa-calendar"></i>{{$response->created_at->format('d M Y')}}</li>
                                                @if($response->rating)
                                                    <li><i class="far fa-star"></i> Rated {{$response->rating->rating}} star</li>
                                                @else
                                                    <li><i class="far fa-star"></i> Rating Not available</li>
                                                @endif

                                                <li><i class="fa fa-tags"></i>Last Updated: {{$response->updated_at->format('d M Y')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <p>{{$response->details}}</p>
                                    </div>
                                @endif

                            </div>

                        </div>

                        @if($response)
                            <div class="card blog-share clearfix">
                                <div class="card-header">
                                    <h4 class="card-title">File attached with this response.</h4>
                                </div>
                                <div class="card-body">
                                    @if($response->file_original_name)
                                        <ul class="social-share">
                                            <li><a target="_blank" href="{{$response->FilePath}}" title="Facebook"><i class="fa fa-file"></i> {{$response->file_original_name}}</a></li>
                                        </ul>
                                    @else
                                        <ul class="social-share">
                                            <li><a target="_blank" href="#" title="Facebook"><i class="fa fa-file"></i></a>  No file Attached.</li>
                                        </ul>
                                    @endif

                                </div>

                            </div>
                        @endif

                        @if($response)
                            <div class="card blog-share clearfix">
                                <div class="card-header">
                                    <h4 class="card-title">Your rating for this solution.</h4>
                                </div>
                                <div class="card-body">
                                    @if($response->rating)
                                        <div class="review-count rating">
                                            @if($response->rating->rating == 5)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                            @endif
                                            @if($response->rating->rating == 4)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                            @endif
                                            @if($response->rating->rating == 3)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            @endif
                                            @if($response->rating->rating == 2)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            @endif
                                            @if($response->rating->rating == 1)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            @endif
                                        </div>
                                        <form wire:submit.prevent="addRating" wire:ignore.self>
                                            <div class="row form-row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="change-avatar">
                                                            <div class="upload-img">
                                                                <h4>Rate Apprentice response</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <small class="form-text text-muted"><b><i>{{$user->name}} will see this rating.</i></b></small>
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
                                                        <select class="form-control {{$errors->has('rating')? 'is-invalid' : '' }}" wire:model.lazy="rating">
                                                            <option value="">Rate Response</option>
                                                            <option value="5">Excellent</option>
                                                            <option value="4">Very Good</option>
                                                            <option value="3">Good</option>
                                                            <option value="2">Fair</option>
                                                            <option value="1">Poor</option>
                                                        </select>
                                                        @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="submit-section">
                                                <button type="submit" wire:loading.remove wire:target="addRating" class="btn btn-primary submit-btn" style="border-color: #9A4EAE;">Rate</button>
                                                <button type="submit" wire:loading wire:target="addRating" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                            </div>
                                        </form>
                                    @else
                                        <p class="text-danger">Please rate this solution.</p>
                                        <form wire:submit.prevent="addRating" wire:ignore.self>
                                            <div class="row form-row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="change-avatar">
                                                            <div class="upload-img">
                                                                <h4>Rate Apprentice response</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <small class="form-text text-muted"><b><i>{{$user->name}} will see this rating.</i></b></small>
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
                                                        <select class="form-control {{$errors->has('rating')? 'is-invalid' : '' }}" wire:model.lazy="rating">
                                                            <option value="">Rate Response</option>
                                                            <option value="5">Execellent</option>
                                                            <option value="4">Very Good</option>
                                                            <option value="3">Good</option>
                                                            <option value="2">Fair</option>
                                                            <option value="1">Poor</option>
                                                        </select>
                                                        @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="submit-section">
                                                <button type="submit" wire:loading.remove wire:target="addRating" class="btn btn-primary submit-btn" style="border-color: #9A4EAE;">Rate</button>
                                                <button type="submit" wire:loading wire:target="addRating" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        @endif


                        <div class="card blog-comments clearfix">
                            <div class="card-header">
                                @if($comments)
                                    <h4 class="card-title">Comments ({{count($comments)}})</h4>
                                @else
                                    <h4 class="card-title">Comment (0)</h4>
                                @endif

                            </div>
                            <div class="card-body pb-0">
                                <ul class="comments-list">
                                    @if($comments)
                                        @foreach($comments as $com)
                                            <li>
                                                <div class="comment">
                                                    <div class="comment-author">
                                                        <img class="avatar" alt="" src="{{$com->user->ImagePath}}">
                                                    </div>
                                                    <div class="comment-block">
													<span class="comment-by">
														<span class="blog-author-name">{{$com->user->name}}</span>
													</span>
                                                        <p>{{$com->message}}</p>
                                                        <p class="blog-date">{{$com->created_at->format('d M Y')}}</p>
                                                    </div>
                                                </div>
                                                <ul class="comments-list reply">

                                                    @if($com->replies)
                                                        @foreach($com->replies as $reply)
                                                            <li>
                                                                <div class="comment">
                                                                    <div class="comment-author">
                                                                        <img class="avatar" alt="" src="{{$reply->user->ImagePath}}">
                                                                    </div>
                                                                    <div class="comment-block">
															<span class="comment-by">
																<span class="blog-author-name">{{$reply->user->name}}</span>
															</span>
                                                                        <p>{{$reply->message}}</p>
                                                                        <p class="blog-date">{{$reply->created_at->format('d M Y')}}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                    <a class="comment-btn" style="cursor: pointer; margin-top: -15px; margin-bottom: 15px;" wire:click="showReplyForm({{$com->id}})">
                                                        <i wire:loading.remove wire:target="showReplyForm({{$com->id}})"  class="fa fa-reply"></i> <i class="fa fa-spinner fa-spin" wire:loading wire:target="showReplyForm({{$com->id}})" ></i> Drop Reply
                                                    </a>

                                                    @if($replyForm == $com->id)
                                                        <div class="card-body" style="margin-top: -30px;">
                                                            <form wire:submit.prevent="dropReply({{$com->id}})">
                                                                <div class="form-group">
                                                                    <textarea placeholder="Drop your reply here..." rows="4" wire:model.lazy="reply" class="form-control {{$errors->has('reply')? 'is-invalid' : '' }}"></textarea>
                                                                    @error('reply') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="submit-section">
                                                                    <button wire:loading.remove wire:target="dropReply" class="btn btn-primary submit-btn" type="submit">Submit</button>
                                                                    <button type="submit" wire:loading wire:target="dropReply" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>

                        <div class="card new-comment clearfix">
                            <div class="card-header">
                                <h4 class="card-title">Leave Comment</h4>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="dropComment">
                                    <div class="form-group">
                                        <label>Comments</label>
                                        <textarea rows="4" wire:model.lazy="comment" class="form-control {{$errors->has('comment')? 'is-invalid' : '' }}"></textarea>
                                        @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="submit-section">
                                        <button wire:loading.remove wire:target="dropComment" class="btn btn-primary submit-btn" type="submit">Submit</button>
                                        <button type="submit" wire:loading wire:target="dropComment" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing...</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <a class="card-link" href="#" wire:click="backToList" ><i wire:loading wire:target="backToList" class="fa fa-spinner fa-spin"></i> <i wire:loading.remove wire:target="backToList" class="fa fa-arrow-left"></i>  <u><b>Back to tasks</b></u></a>
                    </div>
                </div>



            </div>
</div>


</section>
@endif


</div>
