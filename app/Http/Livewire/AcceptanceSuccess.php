<?php

namespace App\Http\Livewire;

use App\Models\Connect;
use App\Models\Request;
use Livewire\Component;

class AcceptanceSuccess extends Component
{
    public $user;
    public $conn;
    public $date;
    public $time;

    public function mount($user, $conn){
        $this->user = $user;
        $this->conn  = $conn;


        $this->date = $conn->created_at->format('d M Y');
        $this->time = $conn->created_at->format('h:iA');

    }


    public function render()
    {
        return view('livewire.mentor.acceptance-success');
    }
}
