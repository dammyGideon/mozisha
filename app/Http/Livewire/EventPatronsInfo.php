<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  \App\Models\EventsPatron;

class EventPatronsInfo extends Component
{
    public $sub;

    public function mount($sub)
    {
        $this->sub = $sub;
    }

    public function remove()
    {
       EventsPatron::where('id', $this->sub->id)->delete();
        $link = "admin/events/patrons";
        session()->flash('message', 'Patron removed successfully!.'); //displays a flash message
        return redirect($link);
    }

    public function render()
    {
        return view('livewire.admin.event-patrons-info');
    }
}
