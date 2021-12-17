<?php

namespace App\Http\Livewire;

use App\Models\Apprenticeship;
use App\Models\Connect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllMentors extends Component
{

    public $user;
    public $connects;

    public function mount(){
        $this->fetchConnects();
    }

    public function fetchConnects(){
        $this->connects = Connect::where('mentee_id', Auth::user()->id)->get();
    }


    public function render()
    {
        return view('livewire.mentee.all-mentors');
    }
}
