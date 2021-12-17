<?php

namespace App\Http\Controllers;

use App\Http\Livewire\EventPatrons;
use App\Jobs\EventCustomNotificationEmail;
use App\Models\Event;
use App\Models\EventsPatron;
use App\Models\EventSubscription;
use App\Models\Setting;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $social;
    private $setting;


    public function __construct()
    {
        $this->social = Social::latest()->first(); //fetches the last record
        $this->setting = Setting::latest()->first(); //fetches the last record
    }

    public function home()
    {
        $data = [
            'title'         => 'Mozisha Events | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'mozisha events, events on mozisha, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Mozisha Events | The learning community dedicated to building responsible entrepreneurs',

            'sm_title'         => 'Events on Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'sm_description'   => 'The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('events'),

        ];
        return view('user/event/home' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }

    public function userPastEvents()
    {
        $data = [
            'title'         => 'Past Events on Mozisha | Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'Past Events on Mozisha, The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'Past Events on Mozisha, mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Past Events on Mozisha | Mozisha | The learning community dedicated to building respectful and responsible entrepreneurs',

            'sm_title'         => 'Past Events on Mozisha | The learning community dedicated to building responsible entrepreneurs|',
            'sm_description'   => 'The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('past.events'),
        ];
        return view('user/event/past_events' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data]);
    }


    public function addEvent()
    {
        return view('admin/new_event');
    }

    public function upcomingEvents()
    {
        return view('admin/upcoming_events');
    }

    public function pastEvents()
    {
        return view('admin/past_events');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin/edit_event', ['event' => $event]);
    }

    public function eventBookings($id)
    {
        $event = Event::find($id);
        return view('admin/event_subscribers', ['event' => $event]);
    }

    public function eventSubscriber($id)
    {
        $sub = EventSubscription::find($id);
        return view('admin/event_subscriber_info', ['sub' => $sub]);
    }

    public function eventPatron($id)
    {
        $sub = EventsPatron::find($id);
        return view('admin/event_patron_info', ['sub' => $sub]);
    }

    public function eventPatrons()
    {
        return view('admin/events_patrons');
    }

    public function mozishaSubscribers()
    {
        return view('admin/mozisha_subscribers');
    }

    public function viewEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $data = [
            'title'         => $event->theme,
            'description'   => Str::limit($event->details, $limit = 300, $end = '...'),
            'keywords'      => $event->theme.', mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => $event->theme,
            //Social media metadatas
            'sm_title'       => $event->theme,
            'sm_description' => Str::limit($event->details, $limit = 300, $end = '...'),
            'sm_image'       => $event->ImagePath,
            'sm_url'         => 'https://mozisha.com/event/'.$event->slug,
        ];
        return view('user/event/view_event' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'event' => $event]);
    }

    public function subscribeEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $data = [
            'title'         => $event->theme,
            'description'   => Str::limit($event->details, $limit = 300, $end = '...'),
            'keywords'      => $event->theme.',mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => $event->theme,

            //Social media metadata
            'sm_title'       => $event->theme,
            'sm_description' => Str::limit($event->content, $limit = 300, $end = '...'),
            'sm_image'       => $event->ImagePath,
            'sm_url'         => 'https://mozisha.com/event/subscribe/'.$slug,
        ];
        return view('user/event/subscribe_event' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data, 'event' => $event]);
    }

    public function joinPatron()
    {

        $data = [
            'title'         => 'Become Mozisha patron | The learning community dedicated to building responsible entrepreneurs|',
            'description'   => 'Become Mozisha patron | The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'keywords'      => 'Become Mozisha patron ,mozisha.net, mozisha.com, mozisha, mozisha international, mozisha official website, about mozisha, services of mozisha international,
                               The learning community dedicated to building responsible entrepreneurs and empowering all learners, learning platform',
            'dc_title'      => 'Become Mozisha patron | The learning community dedicated to buildingresponsible entrepreneurs',

            'sm_title'         => 'Become Mozisha patron | The learning community dedicated to building responsible entrepreneurs|',
            'sm_description'   => 'Become Mozisha patron |The events platform dedicated to building responsible entrepreneurs and empowering all learners and also get the support you need to achieve your professional goals with an Mozisha apprenticeship',
            'sm_image'         => 'https://mozisha.com/user/img/moz.jpg',
            'sm_url'           => route('events.patron')

        ];
        return view('user/event/event_patron' ,['setting' => $this->setting, 'social' => $this->social, 'data' => $data,]);
    }

    public function sendCustomNotification(Request $request, $event_id)
    {
        $rules = [
            'feedback_email' => 'required|email|max:255',
            'feedback_phone' => 'required|max:30',
            'subject'        => 'required|max:255',
            'mail_content'        => 'required|max:4000',
        ];

        $this->validate($request, $rules);

        //Mail the user concerning the event as a reminder.
        $subs = EventSubscription::where('event_id', $event_id)->get();
        $event = Event::findOrFail($event_id);
        if ($subs)
        {
            dispatch(new EventCustomNotificationEmail($request->feedback_phone, $request->feedback_email, $request->subject, $request->mail_content, $subs, $event));
        }

        session()->flash('message', 'Notification sent successfully!.'); //displays a flash message
        return redirect()->route('event.subscribers', $event_id);
    }
}
