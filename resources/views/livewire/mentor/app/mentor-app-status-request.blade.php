<div class="col-md-7 col-lg-8 col-xl-9">

    <div>
        <div class="card alert alert-info alert-dismissible fade show" style="padding: 10px;" >
            <div class="card-body"  style="margin: auto;">


                <!-- Profile Settings Form -->
                <form wire:submit.prevent="updateStatus" >
                    <div class="row form-row" >
                        <div class="col-12 col-md-12" style="text-align: center">
                            <div class="form-group" style="text-align: center;">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <h4>==> Apprentice status change requests</h4>
                                        <h6>Currently: ({{ $conn->status}})</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12" style="border: 1px dotted rgba(82,116,100,0.75); border-radius: 10px; margin: auto; width: 100%; padding: 10px;">

                            <br>
                            @if($requests)
                                @foreach($requests as $request)
                            <div class="form-group" style="">
                                @if($request->status == "Active")
                                    <h5>==> Activation request.@if($request->seen == "No")<sup style="color: crimson">New</sup>@endif
                                    </h5>
                                @endif
                                @if($request->status == "Suspended")
                                        <h5>==> Suspension request.@if($request->seen == "No")<sup style="color: crimson">New</sup>@endif</h5>
                                @endif
                                @if($request->status == "Terminated")
                                        <h5>==> Termination request.@if($request->seen == "No")<sup style="color: crimson">New</sup>@endif</h5>
                                @endif
                                @if($request->status == "Completed")
                                        <h5>==> Completion request.@if($request->seen == "No")<sup style="color: crimson">New</sup>@endif</h5>
                                @endif

                                <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 15px;">{{$conn->apprenticeship->title}}</label>
                                <hr>
                                <small class="form-text text-muted" style="text-align: justify; font-weight: lighter;"><b><i>{{$conn->apprenticeship->details}}</i></b></small><br>
                                    <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 20px;"><b><i>{{$request->created_at->diffForHumans()}}</i></b></small>
                                    <small class="form-text text-muted" style="text-align: justify; font-weight: lighter; padding-left: 20px;"><b><i>{{$request->created_at->format('d-M-Y')}}</i></b></small>
                            </div>
                            <hr>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label  style=" width: 100%; text-align: center; font-weight: bold; margin-bottom: -20px; margin-top: 20px; font-size: 15px;">You have no request from your apprentice.</label>
                                </div>
                            @endif


                        </div>

                    </div>

                </form>



                <!-- /Profile Settings Form -->

            </div>
        </div>
    </div>

</div>

