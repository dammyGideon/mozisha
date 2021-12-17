<div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Apprentices List</h4>

            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($connects)
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>BASIC INFO</th>
                                    <th>CREATED DATE</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>


                                <!-- class could be pending, accept, reject -->
                                <!--Checking for records before fetching-->

                                @foreach($connects as $connect)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{'/apprenticeship/'.$connect->apprenticeship_id.'/view'}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$connect->mentor->ImagePath}}" alt="User Image"></a>
                                                <a href="{{'/apprenticeship/'.$connect->apprenticeship_id.'/view'}}">{{$connect->mentor->name}} <span>{{$connect->mentor->email}}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{$connect->created_at->format('d M Y')}}</td>


                                        @if($connect->status == "Suspended")
                                            <td class="text-center"><span class="pending">SUSPENDED</span></td>
                                        @endif

                                        @if($connect->status == "Active")
                                            <td class="text-center"><span class="accept">ACTIVE</span></td>
                                        @endif

                                        @if($connect->status == "Completed")
                                            <td class="text-center"><span class="accept">COMPLETED</span></td>
                                        @endif

                                        @if($connect->status == "Terminated")
                                            <td class="text-center"><span class="reject">TERMINATED</span></td>
                                        @endif


                                        <td class="text-center"><a href="{{'/apprenticeship/'.$connect->apprenticeship_id.'/view'}}" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td>
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
