<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEvent extends Component
{

    public $image;
    public $old_image;
    public $old_image_name;
    public $theme;

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
    public $event_id;
    use WithFileUploads;

    public $platform;
    public $link;

    public function mount($event)
    {
        $this->old_image        = $event->ImagePath;
        $this->old_image_name   = $event->image;
        $this->theme            = $event->theme;

        $this->start_minute     = $event->start_minute;
        $this->start_hour       = $event->start_hour;
        $this->start_meridian   = $event->start_meridian;
        $this->start_time_zone  = $event->start_time_zone;
        $this->start_date       = $event->start_date;

        $this->end_minute       = $event->end_minute;
        $this->end_hour         = $event->end_hour;
        $this->end_meridian     = $event->end_meridian;
        $this->end_date         = $event->end_date;
        $this->platform         = $event->platform;
        $this->link             = $event->link;

        $this->location         = $event->location;
        $this->details          = $event->details;
        $this->status           = $event->status;
        $this->event_id         = $event->id;

    }

    public function checkForExistingEvent()
    {
        $checkEvent = Event::where([
            ['id', '!=', $this->event_id],
            ['theme', '=', $this->theme]
        ])->first();

        if ($checkEvent){
            return false;
        }
        return true;
    }

    public function updated($field){
        if ($this->image){
            $this->old_image = null;
        }
        $this->validateOnly($field, [
            'image'          => 'nullable|image|max:3000',
            'theme'          => 'required|max:500',
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
            'platform'       => 'nullable|max:255',
            'link'           => 'nullable|max:1000'
        ]);
    }

    public function publish()
    {
        $this->validate([
            'image'          => 'nullable|image|max:3000',
            'theme'          => 'required|max:500',
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
            'platform'       => 'nullable|max:255',
            'link'           => 'nullable|max:1000'

        ]);

        //Check if the theme exists apart from this
        if(!$this->checkForExistingEvent()) {
            session()->flash('error', 'The theme exists, please modify it!.'); //displays a flash message
            return;
        }

        //Event Date and Time validation
//        if (!$this->validateTime()){
//            session()->flash('error', 'Date format error!.'); //displays a flash message
//            return;
//        }


        //set a default value for status
        if(empty($this->status)){$this->status = 'Active';}
        //Converting d scheduled date to timestamp
        $start_time = date(strtotime("$this->start_date $this->start_hour:$this->start_minute $this->start_meridian"));

        //store the image if supplied
        if ($this->image){
            $image = $this->storeFile();
            $image = $image['name'];
        }else{
            //else use d old one
            $image = $this->old_image_name;
        }

        //saving data in the database
        Event::where('id', $this->event_id)->update([
            'image'             => $image,
            'theme'             => $this->theme,
            'slug'              => Str::slug($this->theme),
            'details'           => $this->details,
            'location'          => $this->location,
            'status'            => $this->status,
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
            'platform'          => $this->platform,
            'link'              => $this->link
        ]);

        session()->flash('message', 'Event updated successfully!.'); //displays a flash message

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
        return view('livewire.admin.edit-event');
    }
}
