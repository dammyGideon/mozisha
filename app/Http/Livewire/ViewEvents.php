<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Team;
use Livewire\Component;

class ViewEvents extends Component
{
    public $event;
    public $ceo;
    public $others;
    public $showForm = false;

    public function mount($event)
    {
        $this->event = $event;
        $this->fetchOthers();
        $this->fetchCeo();
    }

    public function fetchCeo()
    {
       $this->ceo =  Team::where('position', 'Chief Executive Officer')->first();
    }

    public function showEventForm()
    {
        $this->showForm = true;
    }

    public function fetchOthers()
    {
        $this->others = Event::where([
            ['status', '=', 'Active'],
            ['start_time_stamp', '>', time()],
            ['id', '!=', $this->event->id]
        ])->inRandomOrder()->limit(1)->get();
    }

    public function render()
    {
        return view('livewire.event.view-events');
    }
}
