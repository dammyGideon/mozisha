<?php

namespace App\Http\Livewire;

use App\Models\DutyResponse;
use App\Models\MentorAvailability;
use App\Models\NewSchedule;
use App\Models\PeriodicDuty;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MenteeAppDashboard extends Component
{
    public $user;
    public $showDashboard    = true;
    public $showSetGoal      = false;
    public $showNewTask      = false;
    public $showAllTask      = false;
    public $showResponses    = false;
    public $showAppProfile   = false;
    public $showViewTask     = false;
    public $showAppointments = false;
    public $showApp          = false;


    public $conn;
    public $task_id;

    //Counters
    public $taskNo;
    public $appointmentNo;
    public $responseNo;
    public $availability;

    public function countTask(){
        $this->taskNo =  PeriodicDuty::where(['connect_id' => $this->conn->id, 'status' => 'Unseen', ['status', '!=', 'deleted']])->count();
    }

    //Availability
    public function fetchAvailability()
    {
        $availability = MentorAvailability::where('connect_id', $this->conn->id)->first();
        if ($availability){
            $available_from = "$availability->from_hour:$availability->from_minute $availability->from_meridian";
            $available_to  = "$availability->to_hour:$availability->to_minute $availability->to_meridian";
            $this->availability = "$available_from to $available_to";
        }
    }

    public function countResponse(){
        $this->responseNo =  DutyResponse::where('connect_id', $this->conn->id)->count();
    }

    public function countAppointments(){
        $this->appointmentNo =  NewSchedule::where(['connect_id' => $this->conn->id, 'status' => 'Active'])->count();
    }

    /*
     *Toggle Scenes functions
     *
     */
    public function showDashboard(){
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showDashboard    = true;
    }

    public function showSetGoal(){
        $this->showDashboard    = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showSetGoal      = true;
    }

    public function showNewTask(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showNewTask      = true;
    }

    public function showAllTask(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showAllTask      = true;
    }

    public function showViewTask($task_id){
        $this->task_id          = $task_id;
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showViewTask     = true;
    }

    public function showResponses(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showResponses    = true;
    }

    public function showAppointments(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showApp          = false;
        $this->showAppointments = true;
    }

    public function showApprenticeship(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = true;
    }


    public function mount($conn){
        $this->conn = $conn;
        $this->user = $conn->mentor;
        Session::put('conn', $conn);

        //Initializing counters
        $this->refreshCounts();
        $this->fetchAvailability();
    }

    protected $listeners = ['refreshCounts' => 'refreshCounts'];

    public function refreshCounts(){
        $this->countTask();
        $this->countResponse();
        $this->countAppointments();
    }



    public function render()
    {
        return view('livewire.mentee.app.mentee-app-dashboard');
    }
}
