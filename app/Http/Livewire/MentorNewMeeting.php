<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppRequestEmail;
use App\Mail\MentorNewMeetingEmail;
use App\Models\Connect;
use App\Models\NewSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MentorNewMeeting extends Component
{
    public $topic;
    public $details;
    public $platform;
    public $duration;
    public $date;
    public $time;
    public $link;
    public $meeting_id;
    public $passcode;
    public $students = [];

    public $user;
    public $conn;
    public $connects;

    public function mount(){
        $this->conn = Session::get('conn');
        $this->fetchApprentices();
    }

    public function fetchApprentices()
    {
        $this->connects = Connect::where('mentor_id', Auth::user()->id)->groupBy('mentee_id')->get();
    }

    public function updated($field){
        $this->validateOnly($field, [
            'topic'      => 'required|max:255',
            'details'    => 'required|max:600',
            'platform'   => 'required|max:255',
            'date'       => 'required|max:255',
            'time'       => 'required|max:255',
            'students'   => 'required|min:1',
            'duration'   => 'required|min:1|max:5000',
            'link'       => 'required|max:2000|unique:new_schedules,link',
            'meeting_id' => 'nullable|max:255|unique:new_schedules,meeting_id',
            'passcode'   => 'nullable|max:255',

        ]);

    }

    public function newMeeting(){
        $this->validate([
            'topic'      => 'required|max:255',
            'details'    => 'required|max:600',
            'platform'   => 'required|max:255',
            'date'       => 'required|max:255',
            'time'       => 'required|max:255',
            'students'   => 'required|min:1',
            'duration'   => 'required|min:1|max:5000',
            'link'       => 'required|max:2000||unique:new_schedules,link',
            'meeting_id' => 'nullable|max:255|unique:new_schedules,meeting_id',
            'passcode'   => 'nullable|max:255',
        ]);


        foreach ($this->students as $student){

        $studentDetails = User::where('email', $student)->first();
        NewSchedule::create([
            'topic'        => $this->topic,
            'details'      => $this->details,
            'platform'     => $this->platform,
            'date'         => $this->date,
            'start_time'   => $this->time,
            'timestamp'    => date(strtotime("$this->date $this->time")),
            'link'         => $this->link,
            'duration'     => $this->duration,
            'meeting_id'   => $this->meeting_id,
            'passcode'     => $this->passcode,
            'mentor_id'    => Auth::user()->id,
            'mentee_id'    => $studentDetails->id,
            'initiator_id' => Auth::user()->id,
        ]);

        //Mails mentee concerning the request
        $data = [
            'email'         => $studentDetails->email,
            'name'          => $studentDetails->name,
            'mentor_name'   => Auth::user()->name,
            'platform'      => $this->platform,
            'topic'         => $this->topic,
            'details'       => $this->details,
            'link'          => $this->link,
            'duration'      => $this->duration,
            'meeting_date'  => $this->date. ' | ' . $this->time,
            'meeting_id'    => $this->meeting_id,
            'passcode'      => $this->passcode,
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        Mail::to($student)->send(new   MentorNewMeetingEmail($data));
//        //Formatting the inputted data for database and mailing.

        }

        //Discarding user input
        $this->emit('alert', ['type' => 'success', 'message' => 'Meeting Initiated Successfully.']);
        $this->discard();
    }

    public function discard(){
      $this->topic      = '';
      $this->details    = '';
      $this->platform   = '';
      $this->date       = '';
      $this->meeting_id = '';
      $this->link       = '';
      $this->passcode   = '';
      $this->students   = [];
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-new-meeting');
    }
}
