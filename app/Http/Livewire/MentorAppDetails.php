<?php

namespace App\Http\Livewire;

use App\Models\Connect;
use App\Models\Goal;
use Livewire\Component;

class MentorAppDetails extends Component
{
    public $conn;
    public $user;
    //Apprenticeship goal
    public $goal;

    //Status parameters
    public $status;
    public $reason;
    public $comment;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'status' => 'required|max:255',
            'reason'     => 'required|max:255',
            'comment'    => 'nullable|max:4000',
        ]);
    }

    public function updateStatus(){
        $this->validate([
            'status'  => 'required|max:255',
            'reason'  => 'required|max:255',
            'comment' => 'nullable|max:4000',
        ]);

        Connect::where('id', $this->conn->id)->update([
            'status'         => $this->status,
            'reason'         => $this->reason,
            'mentor_comment' => $this->comment,
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship Status updated.']);
        $conn = Connect::find($this->conn->id);
        $this->refresh($conn);

    }

    public function removeComment()
    {
        Connect::where('id', $this->conn->id)->update([
            'mentor_comment' => '',
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Comment removed.']);
        $conn = Connect::find($this->conn->id);
        $this->refresh($conn);
    }


    public function mount($conn)
    {
       $this->refresh($conn);
    }

    public function refresh($conn)
    {
        $this->conn = $conn;
        $this->status = $this->conn->status;
        $this->reason = $this->conn->reason;
        $this->comment = $this->conn->mentor_comment;
        $this->user = $conn->mentee;
        $this->fetchGoal();
    }

    public function fetchGoal()
    {
        $this->goal =  Goal::where('connect_id', $this->conn->id)->first();
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-app-details');
    }
}
