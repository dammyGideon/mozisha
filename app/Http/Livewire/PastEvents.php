<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class PastEvents extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.admin.past-events', [
            'events' => Event::where('status', 'Past')->latest()->paginate(15),]);
    }
}
