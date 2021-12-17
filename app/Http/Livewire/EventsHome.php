<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsHome extends Component
{
    public $latest;
    public $latestCount;
    public $upcoming;
    use WithPagination;

    public function mount()
    {
        $this->countEvent();
        $this->fetchLatest3();
    }
    public function countEvent()
    {
        $this->latestCount = Event::where([
            ['status', '=', 'Active'],
            ['start_time_stamp', '>', time()]
        ])->count();
    }
    public function fetchLatest3()
    {
      $this->latest = Event::where([
          ['status', '=', 'Active'],
          ['start_time_stamp', '>', time()]
      ])->limit(3)->get();
    }





    public function render()
    {
        return view('livewire.event.events-home', [
            'upcomings' => Event::where([
                ['status', '=', 'Active'],
                ['start_time_stamp', '>', time()]
            ])->latest()->paginate(3)
        ]);
    }
}
