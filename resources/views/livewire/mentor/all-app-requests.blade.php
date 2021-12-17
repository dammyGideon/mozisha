<div>




    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Apprenticeship Requests</h4>

            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($requests)
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>BASIC INFO</th>
                                    <th>APPRENTICESHIP</th>
                                    <th>CREATED DATE</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>


                                <!-- class could be pending, accept, reject -->
                                <!--Checking for records before fetching-->

                                @foreach($requests as $request)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{'/mentor/'.$request->mentee_id.'/mentee'}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$request->creator->ImagePath}}" alt="User Image"></a>
                                                <a href="{{'/mentor/'.$request->mentee_id.'/mentee'}}">{{$request->creator->name}} <span>{{$request->creator->email}}</span></a>
                                            </h2>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{'/mentor/'.$request->mentee_id.'/mentee'}}" class="avatar avatar-sm mr-2"></a>
                                                <a href="{{'/mentor/'.$request->mentee_id.'/mentee'}}">{{$request->creator->name}} <span>{{$request->creator->email}}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{$request->created_at->format('d M Y')}}</td>


                                        @if($request->status == "Pending")
                                            <td class="text-center"><span class="pending">PENDING</span></td>
                                        @endif

                                        @if($request->status == "Accepted")
                                            <td class="text-center"><span class="accept">ACCEPTED</span></td>
                                        @endif

                                        @if($request->status == "Rejected")
                                            <td class="text-center"><span class="reject">DECLINED</span></td>
                                        @endif


                                        <td class="text-center"><a href="{{'/mentor/'.$request->mentee_id.'/'.$request->id.'/mentee'}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
