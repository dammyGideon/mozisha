<?php

namespace App\Http\Livewire;

use App\Mail\MenteeMeetingAcceptedEmail;
use App\Mail\MenteeMeetingCancelledEmail;
use App\Mail\MenteeMeetingDeclinedEmail;
use App\Mail\MenteeMeetingRemindEmail;
use App\Mail\MentorMeetingCancelledEmail;
use App\Mail\MentorMeetingRemindEmail;
use App\Models\NewSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MenteeAppointments extends Component
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
            'email'         => $this->conn->mentor->email,
            'name'          => $this->conn->mentor->name,
            'mentee_name'   => Auth::user()->name,
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
            $this->emit('alert', ['type' => 'info', 'message' => 'Reminder sent to your mentor.']);

        }catch (\Exception $e){

            $this->emit('alert', ['type' => 'error', 'message' => 'Something ernt wrong, try again.']);
        }
        Mail::to($this->conn->mentor->email)->send(new MenteeMeetingCancelledEmail($data)); //Mails the mentor

    }

    public function remind($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentor->email,
            'name'          => $this->conn->mentor->name,
            'mentee_name'   => Auth::user()->name,
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
            Mail::to($this->conn->mentor->email)->send(new MenteeMeetingRemindEmail($data)); //Mails the mentor
            $this->emit('alert', ['type' => 'info', 'message' => 'Reminder sent to your apprentice.']);
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Something ernt wrong, try again.']);
        }



    }


    public function accept($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentor->email,
            'name'          => $this->conn->mentor->name,
            'mentee_name'   => Auth::user()->name,
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
            Mail::to($this->conn->mentor->email)->send(new MenteeMeetingAcceptedEmail($data)); //Mails the mentor
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification to your mentor.']);
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Something went wrong, try again.']);
        }



    }

    public function decline($id){
        $app = NewSchedule::find($id);

        $data = [
            'email'         => $this->conn->mentor->email,
            'name'          => $this->conn->mentor->name,
            'mentee_name'   => Auth::user()->name,
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
            Mail::to($this->conn->mentor->email)->send(new MenteeMeetingDeclinedEmail($data)); //Mails the mentor
            $this->emit('alert', ['type' => 'info', 'message' => 'Notofication sent to your mentor.']);
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'error', 'message' => 'Something went wrong, try again.']);
        }



    }


    public function render()
    {
        return view('livewire.mentee.app.mentee-appointments');
    }
}
