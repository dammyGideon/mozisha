<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MentorsList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.mentors-list', [
            'apprentices' => User::whereRoleIs('mentor')->latest()->paginate(10),
        ]);
    }
}
