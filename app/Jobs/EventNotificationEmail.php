<?php

namespace App\Jobs;

use App\Mail\EventReminderMail;
use App\Models\Event;
use App\Models\EventSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EventNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $subscribers;
    private $event;

    /**
     * Create a new job instance.
     *
     * @param EventSubscription $eventSubscription
     * @param Event $event
     */
    public function __construct($eventSubscription, Event $event)
    {
        $this->subscribers = $eventSubscription;
        $this->event       = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->subscribers as $sub){
            $data = [
                'name'      => $sub->name,
                'title'     => $this->event->theme,
                'email'     => $sub->email,
                'platform'  => $this->event->platform,
                'link'      => $this->event->link,
                'date'      => $this->event->start_date,
                'time'      => $this->event->start_hour.":".$this->event->start_minute.$this->event->start_meridian." - " . $this->event->start_time_zone
            ];

            try {
                Mail::to($sub->email)->send(new EventReminderMail($data));
            }catch (\Exception $e){
                session()->flash('error', 'Notification failed.'); //displays a flash message
            }
        }
    }
}
