<?php

namespace App\Http\Livewire;


use App\Mail\AdminMozishaPatronMail;
use App\Mail\MozishaPatronMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\EventsPatron as Patron;

class EventsPatron extends Component
{

    public $name;
    public $email;
    public $phone;
    public $details;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|max:255',
            'details' => 'required|max:4000',
        ]);
    }

    public function submitRequest()
    {
        $this->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|max:255',
            'details' => 'required|max:4000',
        ]);
        //check if exists
        if(Patron::where('email', $this->email)->first()){
            $this->emit('alert', ['type' => 'error', 'message' => 'Email already exist in our list']);
            session()->flash('error', 'Email already exist in our list!.'); //displays a flash message
            return;
        }

       Patron::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'details'  => $this->details,
        ]);

        //Mails user concerning the success
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];
        try {
            Mail::to($this->email)->send(new MozishaPatronMail($data));
           }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        try {
            Mail::to(['kene@mozisha.com', 'support@mozisha.com', 'info@mozisha.com', 'hello@mozisha.com'])->send(new AdminMozishaPatronMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }



        $this->discard();
        $this->emit('alert', ['type' => 'success', 'message' => 'Request submitted, we\'ll get back to you shortly.']);
        session()->flash('success', 'Request submitted, we\'ll get back to you shortly.'); //displays a flash message
    }

    public function discard()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->details = '';
    }

    public function render()
    {
        return view('livewire.event.events-patron');
    }
}
