<div>
    <div class="container">


        <div class="mas-section">
            <h6 class="section-title"><span>{{$totalComments}}</span> Comments</h6>
            <ul class="comments-list">

                @if($comments)
                    @foreach($comments as $comment)
                    <li class="comments">
                    <div class="thumb">
                        <img src="{{$comment->ImagePath}}" alt="thumb">
                    </div>
                    <div class="content">
                        <div class="comment-heading">
                            <a class="name" href="#">{{$comment->name}}</a> <span>{{$comment->created_at->format('M d, Y')}} at {{$comment->created_at->format('h:i A')}} </span>
{{--                            <a href="" class="reply"  wire:click.prevent="$emit('showForm')">Reply</a>--}}
                        </div>
                        <p>{{$comment->message}} </p>
                    </div>

                    @livewire('comment-reply-form', ['comment' => $comment])
                </li>
                    @endforeach'
                @endif

            </ul><!-- /.comments-list -->
        </div><!-- /.ccr-section -->


        <div class="mas-section mb--60 mb-0">
            <h4 class="section-title">Leave a Comment
            </h4>


            <div class="comment-response">
                <form wire:submit.prevent="postComment">
                    <div class="form-input  row">
                        <div class="col-lg-4">
                            <input type="text" class="name {{$errors->has('name')? 'is-invalid' : '' }}" wire:model.lazy="name" name="name" placeholder="Your Name">
                            @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="email {{$errors->has('email')? 'is-invalid' : '' }}" wire:model.lazy="email" name="E-mail" placeholder="Your Email">
                            @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="email {{$errors->has('website')? 'is-invalid' : '' }}" wire:model.lazy="website" name="website" placeholder="Website">
                            @error('website') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <textarea name="massage" class=" {{$errors->has('message')? 'is-invalid' : '' }}" wire:model.lazy="message" id="massage" placeholder="Your Massage"></textarea>
                    @error('message') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    <button class="btn btn-primary login-btn" wire:loading.remove wire:target="postComment" type="submit" style="background-color: #420175; margin-bottom: -15px;">Submit</button>
                    <button class="btn btn-primary login-btn" wire:loading wire:target="postComment" type="submit" style="background-color: #420175; border-color: #420175;"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                </form>
            </div>
        </div>
    </div>
</div>
