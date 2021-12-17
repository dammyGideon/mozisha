<div class="col-md-7 col-lg-8 col-xl-9">
    <div>
        @if($goal)
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h4 class="card-title">{{$goal->title}}</h4>
                    <small>(This goal can only be modified by your mentor, contact you mentor for changes)</small>
                </div>
                <div class="card-body">
                    <blockquote>
                        <p class="mb-0">{{$goal->details}}</p>
                    </blockquote>
                    <blockquote class="blockquote mb-0">
                        <p class="mb-0">(Read carefully)</p>
                    </blockquote>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h4 class="card-title">Goal of this apprenticeship has not been set.</h4>
                    <small>Contact your mentor for more details</small>
                </div>
            </div>
        @endif

    </div>

</div>
