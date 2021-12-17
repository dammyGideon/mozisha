<?php

namespace App\Http\Livewire;

use App\Models\ApprenticeshipStatusChangeRequest;
use App\Models\Connect;
use App\Models\Goal;
use Livewire\Component;

class MenteeAppDetails extends Component
{
    public $conn;
    public $user;
    //Apprenticeship goal
    public $goal;

    //Status parameters
    public $status;
    public $reason;
    public $details;
    public $comment;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'status' => 'required|max:255',
            'reason'     => 'required|max:255',
            'details'    => 'required|max:4000',
        ]);
    }

    public function updateStatus(){
        $this->validate([
            'status'  => 'required|max:255',
            'reason'  => 'required|max:255',
            'details' => 'required|max:1000',
        ]);

        ApprenticeshipStatusChangeRequest::create([
            'status'         => $this->status,
            'reason'         => $this->reason,
            'connect_id'     => $this->conn->id,
            'details'        => $this->details,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Status request sent']);
        $conn = Connect::find($this->conn->id);
        $this->refresh($conn);

    }


    public function mount($conn)
    {
        if ($conn->status == 'Suspended' || $conn->status == 'Terminated')
        {
            $this->refreshSuspended($conn);
            return;
        }
        $this->refresh($conn);

    }

    public function refresh($conn)
    {
        $this->conn = $conn;
//        $this->status = $this->conn->status;
//        $this->reason = $this->conn->reason;
        $this->comment = $this->conn->mentee_comment;
        $this->user = $conn->mentee;
        $this->fetchGoal();
    }

    public function updateComment()
    {
        $this->validate([
           'comment' => 'required|max:2000',
        ]);
        Connect::where('id', $this->conn->id)->update([
           'mentee_comment' => $this->comment,
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Comment submitted.']);
        $conn = Connect::find($this->conn->id);
        $this->refresh($conn);
    }

    public function removeComment()
    {
        Connect::where('id', $this->conn->id)->update([
            'mentee_comment' => '',
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Comment removed.']);
        $conn = Connect::find($this->conn->id);
        $this->refresh($conn);
    }

    public function refreshSuspended($conn)
    {
        $this->conn = $conn;
        $this->status = $this->conn->status;
//        $this->reason = $this->conn->reason;
//        $this->comment = $this->conn->mentee_comment;
        $this->user = $conn->mentee;
        $this->fetchGoal();
    }

    public function fetchGoal()
    {
        $this->goal =  Goal::where('connect_id', $this->conn->id)->first();
    }

    public function render()
    {
        return view('livewire.mentee.app.mentee-app-details');
    }
}
