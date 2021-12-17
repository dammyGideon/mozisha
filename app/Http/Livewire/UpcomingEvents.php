<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class UpcomingEvents extends Component
{

    use WithPagination;


    public function render()
    {

        return view('livewire.admin.upcoming-events', [
            'events' =>
                Event::where([
                    ['status', '=', 'Active'],
//                    ['start_time_stamp', '>', time()]
                ])->latest()->paginate(15),
            ]);
    }
}
