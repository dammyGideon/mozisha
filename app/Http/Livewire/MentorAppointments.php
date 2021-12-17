<?php

namespace App\Http\Livewire;

use App\Mail\MenteeMeetingAcceptedEmail;
use App\Mail\MenteeMeetingDeclinedEmail;
use App\Mail\MentorMeetingAcceptedEmail;
use App\Mail\MentorMeetingCancelledEmail;
use App\Mail\MentorMeetingDeclinedEmail;
use App\Mail\MentorMeetingRemindEmail;
use App\Mail\MentorNewMeetingEmail;
use App\Models\NewSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MentorAppointments extends Component
{
    public $conn;
    public $appointments;

    public function mount($conn){
        $this->conn = $conn;
        $this->fetchAppointments();
    }

    public function fetchAppointments(){
        $this->appointments =  NewSchedule::orderBy('id', 'DESC')->where(['connect_id' => $this->conn->id, 'status' => 'Active'])->get();
    }

    public function cancel($id){
        NewSchedule::where(['id' => $id])->update([
            'status' => 'Cancelled'
        ]);

       $app = NewSchedule::find($id);

        $this->fetchAppointments();
        $this->emit('alert', ['type' => 'success', 'message' => 'Appointments Cancelled.']);

        //Mail the mentee concerning the cancellation
        //Mails mentee concerning the request
        $data = [
            'email'         => $this->conn->mentee->email,
            'name'          => $this->conn->mentee->name,
            'mentor_name'   => Auth::user()->name,
            'platform'      => $app->platform,
            'topic'         => $app->topic,
            'details'       => $app->details,
            'link'          => $app->link,
            'meeting_date'  => $app->date. ' | ' . $app->start_time,
            'meeting_id'    => $app->meeting_id,
            'passcode'      => $app->passcode,
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        Mail::to($this->conn->mentee->email)->send(new MentorMeetingCancelledEmail($data));

        $this->emit('alert', ['type' => 'info', 'message' => 'Email sent to your mentee.']);
    }

    public function remind($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentee->email,
            'name'          => $this->conn->mentee->name,
            'mentor_name'   => Auth::user()->name,
            'platform'      => $app->platform,
            'topic'         => $app->topic,
            'details'       => $app->details,
            'link'          => $app->link,
            'meeting_date'  => $app->date. ' | ' . $app->start_time,
            'meeting_id'    => $app->meeting_id,
            'passcode'      => $app->passcode,
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        Mail::to($this->conn->mentee->email)->send(new MentorMeetingRemindEmail($data));

        $this->emit('alert', ['type' => 'info', 'message' => 'Reminder sent to your mentee.']);
    }

    public function accept($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentee->email,
            'name'          => $this->conn->mentee->name,
            'mentor_name'   => Auth::user()->name,
            'platform'      => $app->platform,
            'topic'         => $app->topic,
            'details'       => $app->details,
            'link'          => $app->link,
            'meeting_date'  => $app->date. ' | ' . $app->start_time,
            'meeting_id'    => $app->meeting_id,
            'passcode'      => $app->passcode,
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        try {
            Mail::to($this->conn->mentee->email)->send(new MentorMeetingAcceptedEmail($data)); //Mails the mentor
            $this->emit('alert', ['type' => 'info', 'message' => 'Notice sent to your apprentice.']);
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Something went wrong, try again.']);
        }

    }


    public function decline($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentee->email,
            'name'          => $this->conn->mentee->name,
            'mentor_name'   => Auth::user()->name,
            'platform'      => $app->platform,
            'topic'         => $app->topic,
            'details'       => $app->details,
            'link'          => $app->link,
            'meeting_date'  => $app->date. ' | ' . $app->start_time,
            'meeting_id'    => $app->meeting_id,
            'passcode'      => $app->passcode,
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        try {
            Mail::to($this->conn->mentee->email)->send(new MentorMeetingDeclinedEmail($data)); //Mails the mentor
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification sent to your apprentice.']);
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Something went wrong, try again.']);
        }



    }


    public function render()
    {
        return view('livewire.mentor.app.mentor-appointments');
    }
}
