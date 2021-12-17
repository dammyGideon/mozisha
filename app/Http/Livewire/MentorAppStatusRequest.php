<?php

namespace App\Http\Livewire;

use App\Models\ApprenticeshipStatusChangeRequest;
use Livewire\Component;

class MentorAppStatusRequest extends Component
{
    public $conn;
    public $requests;

    public function mount($conn)
    {
        $this->conn = $conn;
        $this->fetchRequest();
    }

    public function fetchRequest(){
        $this->requests = ApprenticeshipStatusChangeRequest::orderBy('id', 'DESC')->where('connect_id', $this->conn->id)->limit(10)->get();
        //Updated Seen to  'Yes'
        ApprenticeshipStatusChangeRequest::where('connect_id', $this->conn->id)->update([
           'seen' => 'Yes',
        ]);
        $this->emitTo('mentor-app-dashboard', 'refreshCounts');
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-app-status-request');
    }
}
