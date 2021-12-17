<?php

namespace App\Http\Livewire;

use App\Mail\MenteeNewMeetingEmail;
use App\Mail\MentorNewMeetingEmail;
use App\Models\NewSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MenteeNewMeeting extends Component
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

    public $user;
    public $conn;

    public function mount(){
        $this->conn = Session::get('conn');;
    }
    public function updated($field){
        $this->validateOnly($field, [
            'topic'      => 'required|max:255',
            'details'    => 'required|max:600',
            'platform'   => 'required|max:255',
            'date'       => 'required|max:255',
            'time'       => 'required|max:255',
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
            'duration'   => 'required|min:1|max:5000',
            'link'       => 'required|max:2000|unique:new_schedules,link',
            'meeting_id' => 'nullable|max:255|unique:new_schedules,meeting_id',
            'passcode'   => 'nullable|max:255',
        ]);

        //Formatting the inputted data for database and mailing.

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
            'mentor_id'    => $this->conn->mentor_id,
            'mentee_id'    => Auth::user()->id,
            'initiator_id' => Auth::user()->id,
        ]);

        //Discarding user input

        $this->emit('alert', ['type' => 'success', 'message' => 'Meeting Initiated Successfully.']);

        //Mails mentee concerning the request
        $data = [
            'email'         => $this->conn->mentor->email,
            'name'          => $this->conn->mentor->name,
            'mentee_name'   => Auth::user()->name,
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
        Mail::to($this->conn->mentor->email)->send(new MenteeNewMeetingEmail($data));
        $this->discard();
    }

    public function discard(){
        $this->topic      = '';
        $this->details    = '';
        $this->platform   = '';
        $this->time       = '';
        $this->duration   = '';
        $this->date       = '';
        $this->meeting_id = '';
        $this->link       = '';
        $this->passcode   = '';
    }

    public function render()
    {
        return view('livewire.mentee.app.mentee-new-meeting');
    }
}
