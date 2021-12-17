<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class UserPastEvents extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.event.user-past-events', [
            'upcomings' => Event::where('status', 'Past')->latest()->paginate(15),]);
    }
}
