<?php

namespace App\Jobs;

use App\Mail\EventCustomMail;
use App\Mail\EventReminderMail;
use App\Models\Event;
use App\Models\EventSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EventCustomNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $feedback_phone;
    private $feedback_email;
    private $subject;
    private $content;
    private $subscribers;
    private $event;

    /**
     * Create a new job instance.
     *
     * @param $feedback_phone
     * @param $feedback_email
     * @param $subject
     * @param $content
     * @param EventSubscription $subscribers
     * @param Event $event
     */
    public function __construct($feedback_phone, $feedback_email, $subject, $content, $subscribers, $event)
    {
        $this->feedback_email = $feedback_email;
        $this->feedback_phone = $feedback_phone;
        $this->subject        = $subject;
        $this->content        = $content;
        $this->subscribers    = $subscribers;
        $this->event          = $event;
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
                'name'              => $sub->name,
                'title'             => $this->event->theme,
                'email'             => $sub->email,
                'platform'          => $this->event->platform,
                'link'              => $this->event->link,
                'date'              => $this->event->start_date,
                'time'              => $this->event->start_hour.":".$this->event->start_minute.$this->event->start_meridian." - " . $this->event->start_time_zone,
                'feedback_email'    => $this->feedback_email,
                'feedback_phone'    => $this->feedback_phone,
                'subject'           => $this->subject,
                'content'           => $this->content,
            ];

            try {
                Mail::to($sub->email)->send(new EventCustomMail($data));
                session()->flash('message', 'Notification sent successfully!.'); //displays a flash message
            }catch (\Exception $e){
                $this->emit('alert', ['type' => 'info', 'message' => 'Notification failed.']);
                session()->flash('error', 'Notification failed.'); //displays a flash message
            }
        }
    }
}
