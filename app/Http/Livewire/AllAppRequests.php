<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllAppRequests extends Component
{
    public $user;
    public $requests;

    public function mount(){
        $this->fetchRequests();
    }

    public function fetchRequests(){
        $this->requests = Request::where(['mentor_id' => Auth::user()->id, 'status' => 'Pending'])->get();
    }

    public function render()
    {
        return view('livewire.mentor.all-app-requests');
    }
}
