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
                                <i class="fas fa-check"  style="border-color: #420175; background-color: #420175;"></i>
                                <h3>Apprenticeship booked Successfully!</h3>
                                <p>Apprenticeship booked with <strong>{{$app->creator->name}}</strong><br> on <strong>{{$date}} {{$time}}</strong></p>

                                @if($app->type == 'Premium')
                                    <p>Please note that you have to proceed to make a payment of <b><u>${{$app->price}}</u></b> through your dashboard immediately your apprenticeship is approved
                                    by your prospective mentor in order for this apprenticeship program to be fully activated. Good luck!
                                    </p>
                                @endif

                                <a href="/apprenticeship/{{$app->id}}/view" class="btn btn-primary view-i nv-btn"  style="border-color: #420175; background-color: #420175;">View Details</a>
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
