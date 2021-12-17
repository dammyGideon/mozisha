<div class="col-md-7 col-lg-8 col-xl-9">

    @if($appointments)

        <div class="row">
        <!--For each starts here-->
            @foreach($appointments as $app)
            <div class="col-md-6" >
                <div class="card" style="">
                    <div class="card-header">
                       Topic:  <h6 class="card-title">{{$app->topic}}
                            @if($app->initiator_id == Auth::user()->id)
                                (By you)
                            @endif
                        </h6>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#basic-justified-tab1_{{$app->id}}" data-toggle="tab">
                                    <i wire:loading wire:target="cancel" class="fa fa-spinner fa-spin"></i>
                                    <i wire:loading wire:target="remind" class="fa fa-spinner fa-spin"></i>
                                    <i wire:loading wire:target="accept" class="fa fa-spinner fa-spin"></i>
                                    <i wire:loading wire:target="decline" class="fa fa-spinner fa-spin"></i>
                                    Details</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Action</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if($app->initiator_id == Auth::user()->id)
                                        <a class="dropdown-item" href="#"  wire:click="remind({{$app->id}})" data-toggle="tab">Remind</a>
                                        <a class="dropdown-item" href="#"  wire:click="cancel({{$app->id}})" data-toggle="tab"> Cancel </a>
                                    @else
                                        <a class="dropdown-item" href="#"  wire:click="accept({{$app->id}})" data-toggle="tab">Accept</a>
                                        <a class="dropdown-item" href="#"  wire:click="decline({{$app->id}})" data-toggle="tab">Decline</a>
                                    @endif

                                </div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-justified-tab1_{{$app->id}}">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {{$app->details}}
                                </div>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Platform: {{$app->platform}}<br>
                                    Date: {{$app->date}} <br>
                                    Time: {{$app->start_time}}<br>
                                    Meeting link: <a target="_blank" href="{{$app->link}}"> {{$app->link}}</a><br>
                                    Meeting_id: {{$app->meeting_id}}
                                    Meeting_passcode: {{$app->passcode}}


                                    Status:


                                </div>
                            </div>
                            <div class="tab-pane" id="basic-justified-tab2_{{$app->id}}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        <!--For each ends here-->
    </div>
    @else
        <div class="alert alert-danger alert-dismissible fade show" style="text-align: center" role="alert">
            <strong>Sorry!</strong> You currently have no appointments on your list
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

</div>
