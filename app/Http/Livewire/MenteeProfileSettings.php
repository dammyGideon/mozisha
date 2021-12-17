<?php

namespace App\Http\Livewire;

use App\Models\UserDetail;
use Livewire\Component;

class MenteeProfileSettings extends Component
{

    public $user;

    public function mount($user){
        $this->user = $user;
        $this->userDetails();
    }

    public function userDetails(){
        UserDetail::find($this->user->id);
    }

    public function render()
    {
        return view('livewire.mentee.mentee-profile-settings');
    }
}
