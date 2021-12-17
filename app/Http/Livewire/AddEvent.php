<?php

namespace App\Http\Livewire;

use App\Jobs\EventCustomNotificationEmail;
use App\Jobs\SubscriberNotificationForNewEvent;
use App\Mail\NewBlogPostMail;
use App\Mail\NewEventPostMail;
use App\Models\Event;
use App\Models\EventSubscription;
use App\Models\MozishaSubscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEvent extends Component
{
    public $image;
    public $theme;
    public $organizer = 'Mozisha International';
    public $organizer_email = 'kene@mozisha.com';
    public $organizer_phone = '+234 905 651 6559';

    public $start_minute;
    public $start_hour;
    public $start_meridian;
    public $start_time_zone;
    public $start_date;


    public $end_minute;
    public $end_hour;
    public $end_meridian;
    public $end_date;

    public $location;
    public $details;
    public $status;
    use WithFileUploads;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'image'          => 'required|image|max:3000',
            'theme'          => 'required|max:500|unique:events,theme',
            'details'        => 'required|max:7000',
            'location'       => 'required|max:255',
            'start_minute'   => 'required|max:255',
            'start_hour'     => 'required|max:255',
            'start_meridian' => 'required|max:255',
            'start_time_zone'=> 'required|max:255',
            'start_date'     => 'required|max:255',
            'end_minute'     => 'required|max:255',
            'end_hour'       => 'required|max:255',
            'end_meridian'   => 'required|max:255',
            'end_date'       => 'required|max:255',
        ]);
    }

    public function publish()
    {
        $this->validate([
            'image'          => 'required|image|max:3000',
            'theme'          => 'required|max:500|unique:events,theme',
            'details'        => 'required|max:7000',
            'location'       => 'required|max:255',
            'start_minute'   => 'required|max:255',
            'start_hour'     => 'required|max:255',
            'start_meridian' => 'required|max:255',
            'start_time_zone'=> 'required|max:255',
            'start_date'     => 'required|max:255',
            'end_minute'     => 'required|max:255',
            'end_hour'       => 'required|max:255',
            'end_meridian'   => 'required|max:255',
            'end_date'       => 'required|max:255',
        ]);

//        if (!$this->validateTime()){
//            session()->flash('error', 'Date format error!.'); //displays a flash message
//            return;
//        }
        //set a default value for status
        if(empty($this->status)){$this->status = 'Active';}

        //Convertin date to timestamp
        $start_time = date(strtotime("$this->start_date $this->start_hour:$this->start_minute $this->start_meridian"));


        //store the image
        $image = $this->storeFile();
           //saving data in the database
        $event = Event::create([
            'image'             => $image['name'],
            'theme'             => $this->theme,
            'slug'              => Str::slug($this->theme),
            'details'           => $this->details,
            'location'          => $this->location,
            'organizer'         => $this->organizer,
            'status'            => $this->status,
            'organizer_email'   => $this->organizer_email,
            'organizer_phone'   => $this->organizer_phone,
            'start_minute'      => $this->start_minute,
            'start_hour'        => $this->start_hour,
            'start_meridian'    => $this->start_meridian,
            'start_time_zone'   => $this->start_time_zone,
            'start_date'        => $this->start_date,
            'start_time_stamp'  => $start_time,
            'end_minute'        => $this->end_minute,
            'end_hour'          => $this->end_hour,
            'end_meridian'      => $this->end_meridian,
            'end_date'          => $this->end_date,
        ]);

        $this->mailMozishaSubscribers($event);

//        $this->discard(); // Clearing user inputs area
        session()->flash('message', 'Event published successfully!.'); //displays a flash message

    }

    public function validateTime()
    {
        $start_time = date(strtotime("$this->start_date $this->start_hour:$this->start_minute $this->start_meridian"));
        $current_time = time();
        if ($start_time <= $current_time) {
            return false;
        }
        return true;
    }

    public function discard()
    {
        $this->image           = '';
        $this->theme           = '';
        $this->details         = '';
        $this->location        = '';
        $this->start_minute    = '';
        $this->start_hour      = '';
        $this->start_meridian  = '';
        $this->start_time_zone = '';
        $this->start_date      = '';
        $this->end_minute      = '';
        $this->end_hour        = '';
        $this->end_meridian    = '';
        $this->end_date        = '';
    }

    public function mailMozishaSubscribers($event)
    {
        //Mail all mozisha subscribers concerning the event.
        $subs = MozishaSubscription::all();
        if ($subs)
        {
            dispatch(new SubscriberNotificationForNewEvent($subs, $event));
        }

    }

    public function storeFile()
    {

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $original_filename = $this->image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);

//
//        $file =  $this->image;
//        $original_filename = $file->getClientOriginalName();
//        $filename = time() .Str::random(50).'_'.$original_filename;
//
//        $file->storeAs('public', $filename); //stores the file in the public directory

        $fileData =
            [
                'name'          => $name,
                'original_name' => $original_filename,
            ];

        return $fileData;
    }

    public function render()
    {
        return view('livewire.admin.add-event');
    }
}
