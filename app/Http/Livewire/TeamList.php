<?php

namespace App\Http\Livewire;


use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class TeamList extends Component

{
    use WithPagination;

    public function remove($id){
        Team::where('id', $id)->delete();
        session()->flash('message', 'Member Deleted!.'); //displays a flash message
    }

    public function render()
    {
        return view('livewire.admin.team-list', [
            'members' => Team::latest()->paginate(15),]);
    }
}
