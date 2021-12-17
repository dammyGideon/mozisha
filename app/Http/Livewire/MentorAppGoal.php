<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppGoalSetEmail;
use App\Mail\MenteeAppGoalUpdateEmail;
use App\Mail\MenteeConnectEmail;
use App\Models\Goal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MentorAppGoal extends Component
{

    public $user;
    public $conn;

    public $title;
    public $details;

    public function mount($conn){
        $this->conn = $conn;
        $this->user = $conn->mentee;
        $this->refresh();
    }


    public function refresh(){
        $goal =  Goal::where('connect_id', $this->conn->id)->first();
       if ($goal){
           $this->title   = $goal->title;
           $this->details = $goal->details;
       }

    }

    public function updated($field){
        $this->validateOnly($field, [
            'title'   => 'required|max:255',
            'details' => 'required|max:4000'
        ]);
    }

    public function setGoal(){
        $this->validate([
            'title'   => 'required|max:255',
            'details' => 'required|max:4000'
        ]);

        //Check if record exists
        $goalCheck = Goal::where('connect_id', $this->conn->id)->count();
        if($goalCheck > 0){
            //update existing record
            Goal::where('connect_id', $this->conn->id)->update([
               'title'    => $this->title,
                'details' => $this->details,
            ]);


            try {
                //Mails the mentee about the update
                $data = [
                    'email'         => $this->user->email,
                    'name'          => $this->user->name,
                    'mentor_name'   => $this->conn->mentor->name,
                    'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
                ];
                Mail::to($this->user->email)->send(new MenteeAppGoalUpdateEmail($data));
            }catch (\Exception $e){

            }

            $this->refresh();
            $this->emit('alert', ['type' => 'success', 'message' => 'Goal updated successfully.']);
        }else{
            Goal::create([
                'connect_id' => $this->conn->id,
                'title'      => $this->title,
                'details'    => $this->details,
            ]);

            try {
                //Mails mentee concerning the goal set
                $data = [
                    'email'         => $this->user->email,
                    'name'          => $this->user->name,
                    'mentor_name'   => $this->conn->mentor->name,
                    'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
                ];
                Mail::to($this->user->email)->send(new MenteeAppGoalSetEmail($data));
            }catch (\Exception $exception){

            }

            $this->refresh();
            $this->emit('alert', ['type' => 'success', 'message' => 'Goal set successfully.']);
        }
    }



    public function render()
    {
        return view('livewire.mentor.app.mentor-app-goal');
    }
}
