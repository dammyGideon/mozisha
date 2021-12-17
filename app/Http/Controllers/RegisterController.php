<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseReg;
use Unicodeveloper\Paystack\Facades\Paystack;

class RegisterController extends Controller
{
    //

    public function paystackReg(){
        return view('user/paystackReg');
    }

    public function Pay(){

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return redirect()->back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }


    }


    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }



}
