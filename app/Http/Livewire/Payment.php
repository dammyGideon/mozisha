<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Payment as PaymentModel;

class Payment extends Component
{
    /**
     * @var mixed
     */
    public $gateway_name;
    public $stripe;
    public $api_key;
    public $rest_key;

    public function refresh()
    {
        $payment =  PaymentModel::latest()->first();
        $this->gateway_name     = $payment->gateway_name;
        $this->stripe   = $payment->stripe;
        $this->api_key  = $payment->api_key;
        $this->rest_key = $payment->rest_key;
    }

    public function mount(){
        $this->refresh();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'gateway_name'   => 'required',
            'stripe'         => 'required|max:255',
            'api_key'        => 'required|max:255',
            'rest_key'       => 'required|max:255',
        ]);
    }

    public function updatePayment()
    {
        $setting = PaymentModel::latest()->first();
        $this->validate([
            'stripe'        => 'required',
            'gateway_name'  => 'required|max:255',
            'api_key'       => 'required|max:255',
            'rest_key'      => 'required|max:255',
        ]);

        $setting->first()->update([
            'gateway_name'      => $this->gateway_name,
            'stripe'            => $this->stripe,
            'api_key'           => $this->api_key,
            'rest_key'          => $this->rest_key,
            'user_id'           => Auth::user()->id,
        ]);

        $this->refresh();
        session()->flash('pay_message', 'Payment method updated successfully.'); //displays a flash message
        $this->emit('alert', ['type' => 'success', 'message' => 'Payment method updated successfully.']);
    }

    public function render()
    {
        return view('livewire.admin.payment');
    }


}
