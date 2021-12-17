<?php

namespace App\Http\Livewire;

use App\Models\Connect;
use App\Models\NewSchedule;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MentorDashboard extends Component
{

    public $user;
    public $showPremiumApps     = true;
    public $showFreeApps        = false;
    public $showRequests = false;
    public $meetings     = false;

    /*All Mentees*/
    public $freeConnects;
    public $premiumConnects;
    public $status;

    /*All Requests*/
    public $requests;

    //All Appointments
    public $appointments;

    public $appointmentNo;
    public $freeMenteeNo;
    public $premiumMenteeNo;
    public $requestNo;

    public function countAppointments(){
        $this->appointmentNo = NewSchedule::where(['mentor_id' => Auth::user()->id, 'status' => 'Active'])
            ->groupBy('link')
            ->count();
    }

    public function countFreeMentee(){
        $this->freeMenteeNo = Connect::where(['mentor_id' => Auth::user()->id, 'type' => 'Free', 'status' => 'Active'])->count();
    }

    public function countPremiumMentee(){
        $this->premiumMenteeNo = Connect::where(['mentor_id' => Auth::user()->id, 'type' => 'Premium', 'status' => 'Active'])->count();
    }

    public function countRequests(){
        $this->requestNo = Request::where(['mentor_id' => Auth::user()->id, 'status' => 'Pending'])->count();
    }


    public function mount($user){
        $this->user = $user;
        $this->fetchFreeConnects();
        $this->fetchPremiumConnects();
        $this->fetchRequests();
        $this->countAppointments();
        $this->fetchAppointments();
        $this->countPremiumMentee();
        $this->countFreeMentee();
        $this->countRequests();
    }

//    public function updated(){
//            $this->freeConnects = Connect::where(['mentor_id' => Auth::user()->id, 'status' => $this->status])->get();
//    }

    public function fetchRequests(){
        $this->requests = Request::where(['mentor_id' => Auth::user()->id, 'status' => 'Pending'])->get();
    }

    public function fetchAppointments()
    {
        $this->appointments = NewSchedule::orderBy('timestamp', 'ASC')->where(['mentor_id' => Auth::user()->id, 'status' => 'Active'])
            ->groupBy('link')
            ->get();
    }

    public function fetchFreeConnects(){ //All Apprentices
        $this->freeConnects = Connect::where(['mentor_id' => Auth::user()->id, 'type' => 'Free'])->get();
    }

    public function fetchPremiumConnects(){ //All Apprentices
        $this->premiumConnects = Connect::where(['mentor_id' => Auth::user()->id, 'type' => 'Premium'])->get();
    }


    /**
     * Display toggle functions
     */
    public function showFreeApps()
    {
        $this->showRequests     = false;
        $this->showFreeApps     = true;
        $this->showPremiumApps  = false;
        $this->meetings         = false;
    }

    public function showPremiumApps()
    {
        $this->showRequests    = false;
        $this->showFreeApps    = false;
        $this->showPremiumApps = true;
        $this->meetings        = false;
    }

    public function showRequests()
    {
        $this->showRequests    = true;
        $this->showFreeApps    = false;
        $this->showPremiumApps = false;
        $this->meetings        = false;
    }

    public function showMeetings()
    {
        $this->showRequests    = false;
        $this->showFreeApps    = false;
        $this->showPremiumApps = false;
        $this->meetings        = true;
    }

    public function render()
    {
        return view('livewire.mentor.mentor-dashboard');
    }
}
