<?php

namespace App\Http\Livewire;

use App\Models\Connect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllMentees extends Component
{
    public $user;
    public $connects;
    public $type;

    public function mount(){
        $this->fetchConnects();
    }



    public function fetchConnects(){
        $this->connects = Connect::where('mentor_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.mentor.all-mentees');
    }
}
