<?php

namespace App\Http\Livewire;

use App\Models\ApprenticeshipStatusChangeRequest;
use App\Models\Connect;
use App\Models\DutyResponse;
use App\Models\MentorRating;
use App\Models\NewSchedule;
use App\Models\PeriodicDuty;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\MentorAvailability;

class MentorAppDashboard extends Component
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
    public $showRequests     = false;

    public $conn;
    public $task_id;

    //Counters
    public $taskNo;
    public $appointmentNo;
    public $responseNo;


    public $status;
    public $requestCount;
    public $rating;
    public $ratingText;
    public $availability;

    public function updated()
    {
        if ($this->status){$this->updateStatus();}

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

    public function fetchRating()
    {
        $rating = MentorRating::where('connect_id', $this->conn->id)->first();
        if ($rating)
        {
            $this->rating = $rating->rating;
            if ($rating->rating == 5){$this->ratingText = "Excellent";}
            if ($rating->rating == 4){$this->ratingText = "Very Good";}
            if ($rating->rating == 3){$this->ratingText = "Good";}
            if ($rating->rating == 2){$this->ratingText = "Fair";}
            if ($rating->rating == 1){$this->ratingText = "Bad";}
        }

    }

    public function updateStatus()
    {
        Connect::where('id', $this->conn->id)->update([
            'status' => $this->status,
        ]);
        if ($this->status == 'Active'){
            $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship Activated']);
            return;
        }
        $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship ' . '  ' . $this->status]);
    }

    public function countTask(){
       $this->taskNo =  PeriodicDuty::where(['connect_id' => $this->conn->id,  'status' => 'Unseen', ['status', '!=', 'deleted']])->count();
    }

    public function countResponse(){
        $this->responseNo =  DutyResponse::where('connect_id', $this->conn->id)->count();
    }

    public function countAppointments(){
        $this->appointmentNo =  NewSchedule::where(['connect_id' => $this->conn->id, 'status' => 'Active'])->count();
    }

    public function mount($conn){
        $this->conn = $conn;
        $this->user = $conn->mentee;
        Session::put('conn', $conn);

        //Initializing counters
        $this->refreshCounts();
        $this->fetchRating();
        $this->fetchAvailability();
    }

    /*
     *Toggle Scenes functions
     *
     */
    public function showDashboard(){
        $this->showDashboard    = true;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
    }

    public function showSetGoal(){
        $this->showDashboard    = false;
        $this->showSetGoal      = true;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
    }

    public function showNewTask(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = true;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
    }

    public function showAllTask(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = true;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
    }

    public function showViewTask($task_id){
        $this->task_id          = $task_id;
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = true;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
    }

    public function showResponses(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = true;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = false;
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
        $this->showRequests     = false;
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
        $this->showRequests     = false;
    }

    public function showStatusRequests(){
        $this->showDashboard    = false;
        $this->showSetGoal      = false;
        $this->showNewTask      = false;
        $this->showAllTask      = false;
        $this->showResponses    = false;
        $this->showAppProfile   = false;
        $this->showViewTask     = false;
        $this->showAppointments = false;
        $this->showApp          = false;
        $this->showRequests     = true;
    }

    public function countUnseenRequest()
    {
       $this->requestCount =  ApprenticeshipStatusChangeRequest::where(['connect_id' => $this->conn->id, 'seen' => 'No'])->count();
    }

    protected $listeners = ['refreshCounts' => 'refreshCounts'];

    public function refreshCounts()
    {
        $this->countTask();
        $this->countResponse();
        $this->countAppointments();
        $this->countUnseenRequest();
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-app-dashboard');
    }
}
