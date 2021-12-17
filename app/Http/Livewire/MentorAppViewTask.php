<?php

namespace App\Http\Livewire;

use App\Models\PeriodicDuty;
use Livewire\Component;

class MentorAppViewTask extends Component
{
    public $conn;
    public $user;
    public $task_id;
    public $task;

    public function mount($conn, $task_id){
        $this->conn    = $conn;
        $this->task_id = $task_id;
        $this->user    = $conn->mentee;
        $this->fetchTask();
    }

    public function fetchTask(){
        $this->task = PeriodicDuty::where('id', $this->task_id)->first();
    }


    public function render()
    {
        return view('livewire.mentor.app.mentor-app-view-task');
    }
}
