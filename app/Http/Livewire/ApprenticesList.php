<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApprenticesList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.apprentices-list', [
        'apprentices' => User::whereRoleIs('mentee')->latest()->paginate(10),
        ]);
    }
}
