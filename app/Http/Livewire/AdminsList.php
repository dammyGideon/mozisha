<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminsList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.admins-list',  [
            'admins' => User::whereRoleIs('administrator')
                ->orWhereRoleIs('superadministrator')
                ->orWhereRoleIs('developer')
                ->orWhereRoleIs('writer')
                ->orWhereRoleIs('editor')
                ->latest()->paginate(10),
        ]);
    }
}
