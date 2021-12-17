<div>
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
                            <h3 class="page-title">List of Mentor</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index_admin.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                                <li class="breadcrumb-item active">Mentor</li>
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
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                        <tr>
                                            <th>Mentor Name</th>
                                            <th>Course</th>
                                            <th>Member Since</th>
                                            <th>Earned</th>
                                            <th class="text-center">Account Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('admin/img/profiles/avatar-08.jpg')}}" alt="User Image"></a>
                                                    <a href="profile.html">James Amen</a>
                                                </h2>
                                            </td>
                                            <td>Maths</td>

                                            <td>14 Jan 2019 <br><small>02.59 AM</small></td>

                                            <td>$3100.00</td>

                                            <td >
                                                <div class="status-toggle d-flex justify-content-center">
                                                    <input type="checkbox" id="status_1" class="check" checked>
                                                    <label for="status_1" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
