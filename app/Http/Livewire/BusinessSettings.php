<?php

namespace App\Http\Livewire;

use App\Models\UserDetail;
use Livewire\Component;

class BusinessSettings extends Component
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
        return view('livewire.mentor.business-settings');
    }
}
