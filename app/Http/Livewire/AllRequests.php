<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllRequests extends Component
{

    public $user;
    public $requests;

    public function mount(){
       $this->fetchRequests();
    }

    public function fetchRequests(){
        $this->requests = Request::where(['mentee_id' => Auth::user()->id, 'status' => 'Pending'])->get();
    }


    public function render()
    {
        return view('livewire.mentee.all-requests');
    }
}
