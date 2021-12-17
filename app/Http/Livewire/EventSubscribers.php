<?php

namespace App\Http\Livewire;

use App\Jobs\EventCustomNotificationEmail;
use App\Jobs\EventNotificationEmail;
use App\Mail\EventReminderMail;
use App\Models\EventSubscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class EventSubscribers extends Component
{
    use WithPagination;
    public $event;
    public $count;


    public $feedback_email;
    public $feedback_phone;
    public $subject;
    public $content;


    public $customMailForm = false;

    public function showCustomMailForm()
    {
        $this->customMailForm =true;
    }

    public function hideCustomMailForm()
    {
        $this->customMailForm =false;
    }

    public function sendMail()
    {
        $this->validate([
           'feedback_email' => 'required|email|max:255',
           'feedback_phone' => 'required|max:30',
           'subject'        => 'required|max:255',
           'content'        => 'required|max:4000',
        ]);

        //Mail the user concerning the event as a reminder.
        $subs = EventSubscription::where('event_id', $this->event->id)->get();
        if ($subs)
        {
            dispatch(new EventCustomNotificationEmail($this->feedback_phone, $this->feedback_email, $this->subject, $this->content, $subs, $this->event));
        }

    }


    public function mount($event)
    {
        $this->event = $event;
        $this->countSubs();
    }

    public function countSubs()
    {
       $this->count =  EventSubscription::where('event_id', $this->event->id)->count();
    }

    public function remind()
    {
        //Mail the user concerning the event as a reminder.
        $subs = EventSubscription::where('event_id', $this->event->id)->get();
        if ($subs)
        {
            dispatch(new EventNotificationEmail($subs, $this->event));
        }
        session()->flash('message', 'Notification sent successfully!.'); //displays a flash message
    }

    public function render()
    {
        return view('livewire.admin.event-subscribers', [
            'subs' => EventSubscription::where('event_id', $this->event->id)->paginate(15)
        ]);
    }
}
