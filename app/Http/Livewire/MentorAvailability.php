<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\MentorAvailability as Availability;

class MentorAvailability extends Component
{
    public $conn;
    public $from_hour;
    public $from_minute;
    public $from_meridian;
    public $to_hour;
    public $to_minute;
    public $to_meridian;

    public function mount ()
    {
        $this->conn = Session::get('conn');;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'from_hour'     => 'required|max:255',
            'from_minute'   => 'required|max:255',
            'from_meridian' => 'required|max:255',
            'to_hour'       => 'required|max:255',
            'to_minute'     => 'required|max:255',
            'to_meridian'   => 'required|max:255',
        ]);
    }

    public function setTime()
    {
        $this->validate([
            'from_hour'     => 'required|max:255',
            'from_minute'   => 'required|max:255',
            'from_meridian' => 'required|max:255',
            'to_hour'       => 'required|max:255',
            'to_minute'     => 'required|max:255',
            'to_meridian'   => 'required|max:255',
        ]);
        //Check how the time supplied
        if(!$this->validateTime())
        {
            $this->emit('alert', ['type' => 'error', 'message' => 'You set an invalid timing, please check properly.']);
            return;
        }
        //If record exists, then updates
        if(Availability::where('connect_id', $this->conn->id)->first())
        {
            Availability::where('connect_id', $this->conn->id)->update([
                'from_hour'     => $this->from_hour,
                'from_minute'   => $this->from_minute,
                'from_meridian' => $this->from_meridian,
                'to_hour'       => $this->to_hour,
                'to_minute'     => $this->to_minute,
                'to_meridian'   => $this->to_meridian,
            ]);
            $this->emit('alert', ['type' => 'success', 'message' => 'Availability updated successfully.']);
            return;
        }

        //If record doesn't exist, then create it
        Availability::create([
            'mentee_id'     => $this->conn->mentee_id,
            'mentor_id'     => Auth::user()->id,
            'connect_id'    => $this->conn->id,
            'from_hour'     => $this->from_hour,
            'from_minute'   => $this->from_minute,
            'from_meridian' => $this->from_meridian,
            'to_hour'       => $this->to_hour,
            'to_minute'     => $this->to_minute,
            'to_meridian'   => $this->to_meridian,
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Availability created.']);

    }

    public function validateTime()
    {
        $from_time = date(strtotime("$this->from_hour:$this->from_minute $this->from_meridian"));
        $to_time = date(strtotime("$this->to_hour:$this->to_minute $this->to_meridian"));
        if ($from_time >= $to_time) {
            return false;
        }
        return true;
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-availability');
    }
}
