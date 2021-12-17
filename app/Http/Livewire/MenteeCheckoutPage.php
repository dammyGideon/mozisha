<?php

namespace App\Http\Livewire;

use App\Http\Requests\CheckoutRequest;
use App\Mail\MenteePaymentSuccessfulEmail;
use App\Mail\MentorPaymentSuccessfulEmail;
use App\Models\Connect;
use App\Models\Invoice;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use Cartalyst\Stripe\Stripe;

class MenteeCheckoutPage extends Component
{
    public $user;
    public $userInfo;
    public $connect;

    //Card Information
    public $name;
    public $number;
    public $expiryMonth;
    public $expiryYear;
    public $cvv;
    public $terms;

    public $successForm;
    public $paymentForm;

    protected $rules = [
        'name'        => 'required|max:255',
        'number'      => 'required|numeric|min:1000000000000000',
        'expiryMonth' => 'required|numeric|min:1|max:31',
        'expiryYear'  => 'required|numeric|min:1000|max:3000',
        'cvv'         => 'required|numeric|min:100|max:999',
        'terms'       => 'required',
    ];

    protected $messages = [
        'name.required' => 'The card name is required',
        'name.max'      => 'The card name is too long',
        'number.required' => 'The card number is required',
        'number.numeric'  => 'Card number must be numbers',
        'number.min'      => 'Invalid card number',
        'expiryMonth.required' => 'The card expiry Month is required',
        'expiryMonth.numeric'  => 'expiry month must be numbers',
        'expiryMonth.min'      => 'Invalid card expiry Month',
        'expiryMonth.max'     => 'Invalid card expiry Month',

        'expiryYear.required' => 'The card expiry Year is required',
        'expiryYear.numeric'  => 'expiry year must be numbers',
        'expiryYear.min'      => 'Invalid card expiry Year',
        'expiryYear.max'     => 'Invalid card expiry Year',

        'cvv.required' => 'The card cvv is required',
        'cvv.numeric'  => 'Cvv must be numbers',
        'cvv.min'      => 'Invalid card cvv',
        'cvv.max'     => 'Invalid card cvv',

        'terms.required' => 'You have to accept our terms conditions.',

    ];


    public function showSuccessForm()
    {
        $this->successForm = true;
        $this->paymentForm = false;
    }

    public function showPaymentForm()
    {
        $this->successForm = false;
        $this->paymentForm = true;
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }


    public function makePayment()
    {
        $this->validate();


        //Process payment
        $stripe =  Stripe::make(env('STRIPE_KEY'));
        try {
            $token = $stripe->tokens()->create([
               'card' => [
                   'number'    => $this->number,
                   'exp_month' => $this->expiryMonth,
                   'exp_year'  => $this->expiryYear,
                   'cvc'       => $this->cvv
               ]
            ]);

            //Check for token error
            if (!isset($token['id']))
            {
                //Flash error message
                $this->emit('alert', ['type' => 'error', 'message' => 'The token was not generated correctly!']);
            }

            //Create stripe customer
            $customer = $stripe->customers()->create([
                'name'                  => $this->user->name,
                'email'                 => $this->user->email,
                'phone'                 => $this->userInfo->phone,
                'address' => [
                    'line1'             => $this->userInfo->phone,
                    'postal_code'       =>  $this->userInfo->zipcode,
                    'city'              =>  $this->userInfo->city,
                    'state'             =>  $this->userInfo->state,
                    'country'           =>  $this->userInfo->country,
                ],
                'shipping' => [
                    'name'              => $this->user->name,
                    'address' => [
                        'line1'         => $this->userInfo->phone,
                        'postal_code'   =>  $this->userInfo->zipcode,
                        'city'          =>  $this->userInfo->city,
                        'state'         =>  $this->userInfo->state,
                        'country'       =>  $this->userInfo->country,
                    ],
                ],
                'source' => $token['id']
            ]);
            $charge =  $stripe->charges()->create([
               'customer' => $customer['id'],
                'currency'=> 'USD',
                'amount' => $this->connect->price+5,
                'description' => "Payment For the apprenticeship program: ".($this->connect->apprenticeship->title)
            ]);
            if ($charge['status'] == 'succeeded')
            {
//                $this->emit('alert', ['type' => 'success', 'message' => 'Payment successful.']);
               $this->makeInvoice();
            }else{
                $this->emit('alert', ['type' => 'error', 'message' => 'Error in transaction.']);
            }
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => $e->getMessage()]);
        }

        //Enter payment info into invoice table

    }

    public function makeInvoice()
    {
        Invoice::create([
            'mentee_id'         => $this->user->id,
            'mentor_id'         => $this->connect->mentor_id,
            'connect_id'        => $this->connect->id,
            'apprenticeship_id' => $this->connect->apprenticeship_id,
            'invoice_no'        => 'INV-'.Str::random(10).'-'.$this->user->id,
            'card_number'       => $this->number,
            'amount'            => $this->connect->price+5,
            'status'            => 'Successful'
        ]);

        //Change the apprenticeship status
        Connect::where('id', $this->connect->id)->update([
            'price'          => $this->connect->price+5,
            'payment_status' => 'Paid',
            'status'         => 'Active'
        ]);

        //Mail the users concerning the successful payment
        try {
            //Mails mentee concerning the connect
            $data = [
                'email'         => Auth::user()->email,
                'name'          => Auth::user()->name,
                'mentee_name'   => $this->user->name,
                'app_name'      => $this->connect->apprenticeship->title,
                'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
            ];
            Mail::to(Auth::user()->email)->send(new MenteePaymentSuccessfulEmail($data));

            //Mails mentor concerning the connect
            $data = [
                'email'         => $this->connect->mentor->email,
                'name'          => $this->connect->mentor->name,
                'app_name'      => $this->connect->apprenticeship->title,
                'mentee_name'   => $this->user->name,
                'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
            ];
            Mail::to($this->connect->mentor->email)->send(new MentorPaymentSuccessfulEmail($data));


        }catch (\Exception $e){

        }

        //Show Success Message
        $this->showSuccessForm();

    }


    public function mount($user, $connect)
    {
        $this->user    = $user;
        $this->connect = $connect;
        $this->fetchUserDetails();
        $this->showPaymentForm();
    }

    public function fetchUserDetails()
    {
        $this->userInfo = UserDetail::where('user_id', $this->user->id)->first();
    }

    public function render()
    {
        return view('livewire.mentee.mentee-checkout-page');
    }
}
