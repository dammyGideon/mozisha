<?php

namespace App\Http\Livewire;

use App\Models\Connect;
use App\Models\NewSchedule;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenteeDashboard extends Component
{

    public $user;
    public $showMentors  = true;
    public $showRequests = false;
    public $meetings     = false;

    public $appointmentNo;
    public $mentorNo;
    public $requestNo;

    public $appointments;


    public function countAppointments(){
        $this->appointmentNo = NewSchedule::where(['mentee_id' => Auth::user()->id, 'status' => 'Active', ['timestamp', '>', now()->timestamp]])->count();
    }

    public function countMentors(){
        $this->mentorNo = Connect::where(['mentee_id' => Auth::user()->id, 'status' => 'Active'])->count();
    }

    public function countRequests(){
        $this->requestNo = Request::where(['mentee_id' => Auth::user()->id, 'status' => 'Pending'])->count();
    }

    public function fetchAppointments()
    {
        $this->appointments = NewSchedule::orderBy('timestamp', 'ASC')->where(['mentee_id' => Auth::user()->id, 'status' => 'Active', ['timestamp', '>', now()->timestamp]])
            ->get();
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->countAppointments();
        $this->countMentors();
        $this->countRequests();
        $this->fetchAppointments();
    }

    public function showMentors()
    {
        $this->showRequests   = false;
        $this->showMentors    = true;
        $this->meetings       = false;
    }

    public function showRequests()
    {
        $this->showRequests = true;
        $this->showMentors  = false;
        $this->meetings     = false;
    }

    public function showMeetings()
    {
        $this->showRequests = false;
        $this->showMentors  = false;;
        $this->meetings     = true;
    }


    public function render()
    {
        return view('livewire.mentee.mentee-dashboard');
    }
}
