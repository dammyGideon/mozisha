<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminMentorList extends Component
{

    public $paginate;

    public function render()
    {
        return view('livewire.admin.admin-mentor-list', [
            'mails' => User::where(['category' => 'mentor'])->latest()->paginate(20),]);
    }
}
