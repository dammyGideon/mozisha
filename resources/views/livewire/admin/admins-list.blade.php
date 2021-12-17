<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!--Admin header-->
        <livewire:admin-header />
        <!-- /Admin header-->

        <!-- Admin siebar-->
        <x-admin_sidebar />
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">List of Administrators</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active">Administrators</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Admins Name</th>
                                            <th>Email</th>
                                            <th>Member Since</th>
                                            <th>Last Update</th>
                                            <th class="text-center">Account Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($admins)
                                            @foreach($admins as  $app)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$app->ImagePath}}" alt="User Image"></a>
                                                            <a href="{{route('admins.view', $app->id)}}">{{$app->name}} </a>
                                                        </h2>
                                                    </td>
                                                    <td>{{$app->email}}</td>

                                                    <td>{{$app->created_at->format('d M Y')}} <br><small>{{$app->created_at->format('h:iA')}}</small></td>

                                                    <td>{{$app->updated_at->format('d M Y')}} <br><small>{{$app->updated_at->format('h:iA')}}</small></td>

                                                    <td>
                                                        <div class="status-toggle d-flex justify-content-center">
                                                            <input type="checkbox" disabled id="status_1" class="check" @if($app->status == 'Active') checked @else '' @endif>
                                                            <label for="status_1" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif


                                        </tbody>
                                    </table>

                                    {{ $admins->links('components.admin.pagination-links') /* For pagination links */}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
</div>
