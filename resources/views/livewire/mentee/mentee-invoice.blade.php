
<div>
    <!-- Breadcrumb -->
    <style>
        .text-xs{
            color: red;
        }
    </style>
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Update Profile </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->



    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

    <div class="row">


        <!-- Profile Sidebar -->
        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">



            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="user-widget">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar" style=" width: 40%; margin: auto;  text-align: center;">

                                    <div class="profile-img">
                                        <img src="{{$user->ImagePath}}" style="border-radius: 50px;" alt="User Image">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="user-info-cont">
                        <h4 class="usr-name">{{$user->name}}</h4>
                        <p class="mentor-type">{{$user->email}}</p>
                    </div>
                </div>

                @if(Auth::user()->hasRole('mentor'))
                    @livewire('mentor-sidebar', ['user' => $user])
                @endif
                @if(Auth::user()->hasRole('mentee'))
                    @livewire('mentee-sidebar', ['user' => $user])
                @endif
            </div>
            <!-- /Sidebar -->

        </div>
        <!-- /Profile Sidebar -->






    <div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card card-table">
        <div class="card-body">

            <!-- Invoice Table -->
            <div class="table-responsive">
                <table class="table table-hover table-center mb-0">
                    <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Apprenticeship</th>
                        <th>Amount</th>
                        <th>Paid On</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($invoices)
                        @foreach($invoices as $invoice)
                    <tr>
                        <td>
                            <a href="">{{$invoice->invoice_no}}</a>
                        </td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile-mentee.html" class="avatar avatar-sm mr-2">
                                    <img class="avatar-img rounded-circle" src="{{$invoice->mentor->ImagePath}}" alt="User Image">
                                </a>
                                <a href="profile-mentee.html">{{$invoice->apprenticeship->title}}<span>{{$invoice->mentor->name}}</span></a>
                            </h2>
                        </td>
                        <td>${{$invoice->apprenticeship->price + 5}}</td>
                        <td>{{$invoice->created_at->diffForHumans()}}</td>
                        <td class="text-right">
                            <div class="table-action">
                                <a href="#" class="btn btn-sm bg-info-light">
                                    <i class="far fa-eye"></i> View
                                </a>
                            </div>
                        </td>
                    </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
            <!-- /Invoice Table -->

        </div>
    </div>
</div>




    </div>


        </div>

    </div>
    <!-- /Page Content -->
</div>

