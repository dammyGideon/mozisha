<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\EventsPatron as Patrons;
use Livewire\WithPagination;

class AdminEventPatrons extends Component
{

    use WithPagination;
    public $count;

    public function mount()
    {
        $this->fetchCount();
    }

    public function fetchCount(){
        $this->count = Patrons::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-event-patrons', [
            'subs' => Patrons::paginate(15)
        ]);
    }
}
