<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TeamMemberView extends Component
{
    public $member;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function render()
    {
        return view('livewire.guest.team-member-view');
    }
}
