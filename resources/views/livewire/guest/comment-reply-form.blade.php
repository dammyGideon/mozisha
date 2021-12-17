<div>
    <ul class="comment-sub-list">

            <div class="content" >
        <div class="comment-heading" style="margin-left: 100px;">
            <a href="" style="border: 1px solid black;" wire:click.prevent="showReplyForm" class="reply">Reply</a>
        </div>
            </div>

        @if($replies)
            @foreach($replies as $reply)
            <li class="comments">
            <div class="thumb">
                <img src="{{$reply->ImagePath}}" alt="thumb">
            </div>
            <div class="content">
                <div class="comment-heading">
                    <a class="name" href="#">{{$reply->name}}</a> <span>{{$reply->created_at->format('M d, Y')}} at {{$reply->created_at->format('h:i A')}}</span>
{{--                    <a href="" wire:click.prevent="showReplyForm" class="reply">Reply</a>--}}
                </div>
                <p>{{$reply->message}} </p>
            </div>

        </li>
            @endforeach

        @endif



        @if($formStatus)
        <div class="mas-section mb--60 mb-0">
            <hr>
            <h5 class="section-title" style="font-size: 100%;">Leave a Response
            </h5>


            <div class="comment-response">
                <form wire:submit.prevent="postReply">
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
                    <button class="btn btn-primary login-btn" wire:loading.remove wire:target="postReply" type="submit" style="background-color: #420175; margin-bottom: -15px;">Submit</button>
                    <button class="btn btn-primary login-btn" wire:loading wire:target="postReply" type="submit" style="background-color: #420175; border-color: #420175;"><i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                </form>
            </div>
        </div>
        @endif
    </ul>

</div>
