<?php

namespace App\Http\Livewire;

use App\Models\MozishaSubscription;
use Livewire\Component;
use Livewire\WithPagination;

class MozishaSubscribers extends Component
{
    public $count;
    use WithPagination;

    public function mount()
    {
        $this->fetchCount();
    }

    public function fetchCount()
    {
        $this->count = MozishaSubscription::count();
    }

    public function render()
    {
        return view('livewire.admin.mozisha-subscribers', [
            'subs' => MozishaSubscription::paginate(15),
        ]);
    }
}
