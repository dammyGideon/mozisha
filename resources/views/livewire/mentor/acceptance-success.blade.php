<div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Booking</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content success-page-cont">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-check" style="background-color: #420175; border-color: #420175;"></i>
                                <h3>Apprenticeship Accepted Successfully!</h3>
                                <p>Apprenticeship initiated with <strong>{{$conn->mentee->name}}</strong><br> on <strong>{{$date}} {{$time}}</strong></p>

                                @if($conn->apprenticeship->type == 'Premium')
                                    <p>Please note that your apprentice has to make a payment of <b><u>${{$conn->apprenticeship->price}}</u></b> in order for this apprenticeship program to be fully activated.
                                        Keep in touch with your dashboard, you'll be notified when the payment is verified. Good luck!
                                    </p>
                                    <a href="{{route('mentor.dashboard')}}" class="btn btn-primary view-i nv-btn" style="background-color: #420175 !important; border-color: #420175; cursor: pointer;">Back to dashboard</a>
                                @else

                                <a href="/mentor/{{$conn->id}}/app" class="btn btn-primary view-i nv-btn" style="background-color: #420175 !important; border-color: #420175; cursor: pointer;">View Platform</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->

</div>
