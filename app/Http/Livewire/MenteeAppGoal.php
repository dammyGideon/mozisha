<?php

namespace App\Http\Livewire;

use App\Models\Goal;
use Livewire\Component;

class MenteeAppGoal extends Component
{
    public $conn;
    public $user;
    public $goal;

    public function mount($conn){
        $this->user = $conn->mentor;
        $this->conn = $conn;
        $this->fetchGoal();
    }

    public function fetchGoal(){
        $goal =  Goal::where('connect_id', $this->conn->id)->first();
        if ($goal){
            $this->goal = $goal;
        }
    }
    public function render()
    {
        return view('livewire.mentee.app.mentee-app-goal');
    }
}
