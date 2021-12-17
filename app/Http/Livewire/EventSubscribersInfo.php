<?php

namespace App\Http\Livewire;

use App\Mail\EventReminderMail;
use App\Models\Event;
use App\Models\EventSubscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EventSubscribersInfo extends Component
{
    public $sub;
    public $event;

    public function mount($sub)
    {
        $this->sub = $sub;
        $this->fetchEvent();
    }

    public function fetchEvent()
    {
        $this->event = Event::find($this->sub->event_id);
    }
    public function remove()
    {
        EventSubscription::where('id', $this->sub->id)->delete();
        $link = "/event/".$this->sub->event_id."/subscribers";
        session()->flash('message', 'User removed successfully!.'); //displays a flash message
        return redirect($link);
    }

    public function remind()
    {
        //Mail the user concerning the event as a reminder.

        $data = [
            'name' => $this->sub->name,
            'title'  => $this->event->theme,
            'email' => $this->sub->email,
            'date' => $this->event->start_date,
            'time' => $this->event->start_hour.":".$this->event->start_minute.$this->event->start_meridian." - " . $this->event->start_time_zone
        ];
        try {
            Mail::to($this->sub->email)->send(new EventReminderMail($data));
        }catch (\Exception $e){
            $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
        }

        $this->emit('alert', ['type' => 'success', 'message' => 'Notification sent successfully.']);
        session()->flash('message', 'Notification sent successfully!.'); //displays a flash message

    }

    public function render()
    {
        return view('livewire.admin.event-subscribers-info');
    }
}
