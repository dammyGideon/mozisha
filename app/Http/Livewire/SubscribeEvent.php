<?php

namespace App\Http\Livewire;

use App\Mail\AdminEventSubscriptionMail;
use App\Mail\EventSubscriptionMail;
use App\Models\EventSubscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubscribeEvent extends Component
{
    public $event;
    public $first_name;
    public $last_name;
    public $country;
    public $city;
    public $age_range;
    public $email;
    public $phone;
    public $details;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'country'       => 'required|max:255',
            'city'          => 'required|max:255',
            'age_range'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|max:255',
            'details'       => 'required|max:4000',
        ]);
    }

    public function submitRequest()
    {
        $this->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'country'       => 'required|max:255',
            'city'          => 'required|max:255',
            'age_range'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|max:255',
            'details'       => 'required|max:4000',
        ]);
        //check if exists
        if(EventSubscription::where(['email' => $this->email, 'event_id' => $this->event->id])->first()){
            $this->emit('alert', ['type' => 'error', 'message' => 'Email already exist in our list']);
            session()->flash('error', 'Email already exist in our list!.'); //displays a flash message
            return;
        }

        EventSubscription::create([
            'name'          => $this->last_name. ' '. $this->first_name,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'country'       => $this->country,
            'city'          => $this->city,
            'age_range'     => $this->age_range,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'event_id'      => $this->event->id,
            'details'       => $this->details,
        ]);

        //Mails user concerning the subscription
        $data = [
            'name' => $this->last_name. ' ' . $this->first_name,
            'title'  => $this->event->theme,
            'email' => $this->email,
        ];
        try {
            Mail::to($this->email)->send(new EventSubscriptionMail($data));
         }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        try {
            Mail::to(['kene@mozisha.com', 'info@mozisha.com'])->send(new AdminEventSubscriptionMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        $this->discard();//Clear user inputs
        $this->emit('alert', ['type' => 'success', 'message' => 'Subscription successful, we\'ll notify you shortly']);
        session()->flash('success', 'Subscription successful, we\'ll notify you shortly.'); //displays a flash message
    }

    public function discard()
    {
        $this->last_name    = '';
        $this->first_name   = '';
        $this->country      = '';
        $this->city         = '';
        $this->age_range    = '';
        $this->email        = '';
        $this->phone        = '';
        $this->details      = '';
    }

    public function render()
    {
        return view('livewire.event.subscribe-event');
    }
}
