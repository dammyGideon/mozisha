<?php

namespace App\Jobs;

use App\Mail\EventReminderMail;
use App\Mail\NewEventPostMail;
use App\Models\Event;
use App\Models\MozishaSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class SubscriberNotificationForNewEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $subscribers;
    private $event;

    /**
     * Create a new job instance.
     *
     * @param MozishaSubscription $mozishaSubscription
     * @param Event $event
     */
    public function __construct($mozishaSubscription, $event)
    {
        $this->subscribers = $mozishaSubscription;
        $this->event       = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Mail the user concerning the event as a reminder.
        $subs = MozishaSubscription::all();
        if ($subs) {
            foreach ($subs as $sub) {
                $data = [
                    'name' => $sub->name,
                    'id' => $this->event->id,
                    'slug' => $this->event->slug,
                    'theme' => strtoupper($this->event->theme),
                    'details' => Str::limit($this->event->details, 1000, $end = '...'),
                    'email' => $sub->email,
                    'date' => $this->event->created_at->format('d M Y') . ',' . $this->event->created_at->format('h:iA'),
                ];
                try {
                    Mail::to($sub->email)->send(new NewEventPostMail($data));
                } catch (\Exception $e) {
                    session()->flash('error', 'Notification Error.');
                }
            }


        }
    }
}
