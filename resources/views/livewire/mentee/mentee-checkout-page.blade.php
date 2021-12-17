<div class="main-wrapper">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('mentee.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Checkout</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    @if($paymentForm)
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <!-- Checkout Form -->
                            <form wire:submit.prevent="makePayment">

                                <div class="payment-widget">
                                    <h4 class="card-title">Payment Method</h4>

                                    <!-- Credit Card Payment -->
                                    <div class="payment-list">
                                        <label class="payment-radio credit-card-option">
                                            <input type="checkbox" name="radio" disabled checked>
                                            <span class="checkmark"></span>
                                            Credit card
                                        </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group card-label">
                                                    <label for="card_name">Name on Card</label>
                                                    <input wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" id="card_name" type="text">
                                                    @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group card-label">
                                                    <label for="card_number">Card Number</label>
                                                    <input wire:model.lazy="number" class="form-control {{$errors->has('number')? 'is-invalid' : '' }}" id="card_number" placeholder="1234  5678  9876  5432" min="1" type="number">
                                                    @error('number') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group card-label">
                                                    <label for="expiry_month">Expiry Month</label>
                                                    <input  wire:model.lazy="expiryMonth"  class="form-control {{$errors->has('expiryMonth')? 'is-invalid' : '' }}" id="expiry_month" placeholder="MM" min="1"  type="number">
                                                    @error('expiryMonth') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group card-label">
                                                    <label for="expiry_year">Expiry Year</label>
                                                    <input wire:model.lazy="expiryYear"  class="form-control {{$errors->has('expiryYear')? 'is-invalid' : '' }}" id="expiry_year" placeholder="YY" type="number">
                                                    @error('expiryYear') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group card-label">
                                                    <label for="cvv">CVV</label>
                                                    <input wire:model.lazy="cvv" class="form-control {{$errors->has('cvv')? 'is-invalid' : '' }}" id="cvv" type="number">
                                                    @error('cvv') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Credit Card Payment -->

                                    <!-- Paypal Payment -->
                                    <div class="payment-list">
                                        <label class="payment-radio paypal-option">
                                            <input type="checkbox" name="save_card">
                                            <span class="checkmark"></span>
                                            Save Card Details
                                        </label>
                                    </div>
                                    <!-- /Paypal Payment -->

                                    <!-- Terms Accept -->
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input wire:model.lazy="terms" type="checkbox" class="{{$errors->has('terms')? 'is-invalid' : '' }}" id="terms_accept">
                                            <label for="terms_accept">I have read and accepted <a href="#">Terms &amp; Conditions</a></label>
                                            @error('terms') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!-- /Terms Accept -->

                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button wire:loading.remove wire:target="makePayment" type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
                                        <button wire:loading wire:target="makePayment" class="btn btn-primary submit-btn" type="submit"> <i class="fa fa-spinner fa-spin"></i> &nbsp; Processing</button>
                                    </div>
                                    <!-- /Submit Section -->

                                </div>
                            </form>
                            <!-- /Checkout Form -->

                        </div>
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 theiaStickySidebar">

                    <!-- Booking Summary -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Summary</h4>
                        </div>
                        <div class="card-body">

                            <!-- Booking Mentee Info -->
                            <div class="booking-user-info">
                                <a href="{{route('business.profile', $connect->mentor_id)}}" class="booking-user-img">
                                    <img src="{{$connect->mentor->ImagePath}}" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="{{route('mentee.apprenticeship.view', $connect->apprenticeship_id)}}">{{$connect->apprenticeship->title}}</a></h4>
                                    <div class="rating">
                                       <p style="margin-top: -8px; color: rgba(210,138,32,0.76);"><i class="fa fa-star-half-full"></i> {{$connect->mentor->name}} <i class="fa fa-star-half-full"></i></p>
                                    </div>
                                    <div class="mentor-details">
                                        <p class="user-location"><i class="fas fa-map-marker-alt"></i> {{$connect->type}} Apprenticeship</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Booking Mentee Info -->

                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Date <span> {{$connect->created_at->format('d M Y')}}</span></li>
                                        <li>Time <span>{{$connect->created_at->format('h:i A')}}</span></li>
                                    </ul>
                                    <ul class="booking-fee">
                                        <li>Consulting Fee <span>${{$connect->price/2}}</span></li>
                                        <li>Booking Fee <span>${{$connect->price/2}}</span></li>
                                        <li>System charges <span>$5</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">${{$connect->price + 5}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Summary -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    @endif

    @if($successForm || $connect->payment_status == 'Paid')
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
                                        <h3>Payment Successful!</h3>
                                        <p>Apprenticeship on <b><u>{{$connect->apprenticeship->title}}</u></b> activated with <strong>{{$connect->mentor->name}}</p>

                                        <a href="{{route('mentee.app.dashboard', $connect->id)}}" class="btn btn-primary view-i nv-btn"  style="border-color: #420175; background-color: #420175;">Visit Dashboard</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Success Card -->

                        </div>
                    </div>

                </div>
            </div>
        <!-- /Page Content -->
    @endif
</div>
