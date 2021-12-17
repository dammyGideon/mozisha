<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class OurTeam extends Component
{
    public $ceo;
    public $management;
    public $other;
    public $advisory;


    public function mount(){
        $this->ceo = Team::where('position', 'CEO')->orWhere('position', 'Chief Executive Officer')->first();

//        $this->secretary = Team::where('position', 'Secretary')->first();
//        $this->manager = Team::where('position', 'Manager')->first();

        $this->management = Team::where([
            ['position', '!=', 'CEO'],
            ['position', '!=', 'Chief Executive Officer'],
            ['team',     '=', 'Management'],
        ])->inRandomOrder()->get();

        $this->advisory = Team::where([
            ['position', '!=', 'CEO'],
            ['position', '!=', 'Chief Executive Officer'],
            ['team',     '=', 'Advisory'],
        ])->inRandomOrder()->get();

        $this->other = Team::where([
            ['position', '!=', 'CEO'],
            ['position', '!=', 'Chief Executive Officer'],
            ['team',     '=', 'Others'],
        ])->inRandomOrder()->get();

    }

    public function render()
    {
        return view('livewire.guest.our-team');
    }
}
