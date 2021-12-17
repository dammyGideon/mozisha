<?php

namespace App\Http\Livewire;

use App\Mail\AdminMozishaSubscriberMail;
use App\Mail\MozishaSubscriberMail;
use App\Models\MozishaSubscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class HomeSubscribersForm extends Component
{
    public $email;

    public function submitEmail()
    {
        $this->validate([
            'email' => 'required|email|max:255|unique:mozisha_subscriptions,email'
        ]);

        //Check if exists
        if(MozishaSubscription::where('email', $this->email)->first()){
            $this->emit('alert', ['type' => 'error', 'message' => 'Email already exist in our list']);
            return;
        }
        //If new email
        MozishaSubscription::create([
            'email' => $this->email,
        ]);

        $data = [
            'email' => $this->email,
        ];


        try {
            Mail::to($this->email)->send(new MozishaSubscriberMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        try {
            Mail::to(['bolaji@mozisha.com', 'kene@mozisha.com', 'support@mozisha.com', 'info@mozisha.com', 'hello@mozisha.com'])->send(new AdminMozishaSubscriberMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        $this->email = '';
        $this->emit('alert', ['type' => 'success', 'message' => 'Subscription Successful']);
    }

    public function render()
    {
        return view('livewire.guest.home-subscribers-form');
    }
}
