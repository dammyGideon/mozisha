<?php

namespace App\Http\Livewire;

use App\Mail\MentorMeetingCancelledEmail;
use App\Mail\MentorNewMeetingEmail;
use App\Models\NewSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MentorViewMeetingPage extends Component
{
    public $meeting;
    public $user;
    public $targets;
    public $mentor;

    public function mount($meeting, $user)
    {
        $this->meeting = $meeting;
        $this->user    = $user;
        $this->fetchTargets();
        $this->fetchMentor();
    }

    public function fetchTargets()
    {
        $this->targets = NewSchedule::where('link', $this->meeting->link)->get();
    }
    public function fetchMentor()
    {
        $this->mentor = NewSchedule::where('link', $this->meeting->link)->first()->mentor;
    }

    public function cancelMeeting()
    {
       NewSchedule::where('link', $this->meeting->link)->update([
            'status' => 'Cancelled'
        ]);


        foreach ($this->targets as $meeting) {
            //Mails mentee concerning the request
            $data = [
                'email' => $meeting->mentee->email,
                'name' => $meeting->mentee->name,
                'mentor_name' => Auth::user()->name,
                'platform' => $meeting->platform,
                'topic' => $meeting->topic,
                'details' => $meeting->details,
                'link' => $meeting->link,
                'meeting_date' => $meeting->date . ' | ' . $meeting->time,
                'meeting_id' => $meeting->meeting_id,
                'passcode' => $meeting->passcode,
                'date_and_time' => Carbon::now()->format('d M Y') . ', ' . Carbon::now()->format('h:iA'),
            ];
            try {
                Mail::to($meeting->mentee->email)->send(new   MentorMeetingCancelledEmail($data));
            } catch (\Exception $exception) {

            }

        }

        $this->emit('alert', ['type' => 'success', 'message' => 'Meeting Terminated Successfully.']);
    }

    public function render()
    {
        return view('livewire.mentor.mentor-view-meeting-page');
    }
}
