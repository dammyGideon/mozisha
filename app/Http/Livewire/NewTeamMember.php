<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\Team as MyTeam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewTeamMember extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $gender;
    public $facebook;
    public $linkedin;
    public $twitter;
    public $position;
    public $userTeam;
    public $email;
    public $behance;
    public $state;
    public $country;
    public $details;
    public $image;


    public function updated($field){
        $this->validateOnly($field, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'image'      => 'required|image|max:1000',
            'gender'     => 'required|max:255',
            'facebook'   => 'required|max:255',
            'linkedin'   => 'required|max:255',
            'twitter'    => 'required|max:255',
            'position'   => 'required|max:255',
            'userTeam'   => 'required|max:255',
            'email'      => 'required|email|max:255',
            'behance'    => 'required|max:255',
            'state'      => 'required|max:255',
            'country'    => 'required|max:255',
            'details'    => 'required|max:4000',
        ]);
    }

    public function addMember(){
        $this->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'image'      => 'required|image|max:1000',
            'gender'     => 'required|max:255',
            'facebook'   => 'required|max:255',
            'linkedin'   => 'required|max:255',
            'twitter'    => 'required|max:255',
            'position'   => 'required|max:255',
            'userTeam'   => 'required|max:255',
            'email'      => 'required|email|max:255',
            'behance'    => 'required|max:255',
            'state'      => 'required|max:255',
            'country'    => 'required|max:255',
            'details'    => 'required|max:4000',
        ]);

        //Store the image and get the parameters
        $image = $this->storeFile();

        if ($this->position == 'CEO' && MyTeam::where('position', 'CEO')->first()){
            session()->flash('error', 'CEO already exist!.'); //displays a flash message
            return;
        }

        MyTeam::create([
           'first_name' => $this->first_name,
           'last_name'  => $this->last_name,
           'image'      => $image['name'],
           'gender'     => $this->gender,
           'facebook'   => $this->facebook,
           'linkedin'   => $this->linkedin,
           'twitter'    => $this->twitter,
           'position'   => $this->position,
           'team'       => $this->userTeam,
           'email'      => $this->email,
           'behance'    => $this->behance,
           'state'      => $this->state,
           'country'    => $this->country,
           'details'    => $this->details,
           'user_id'    => Auth::user()->id,
        ]);

        $this->discard(); // Clearing user inputs area
        session()->flash('message', 'Member added successfully!.'); //displays a flash message

    }

    public function discard(){
        $this->first_name   = '';
        $this->last_name    = '';
        $this->image        = '';
        $this->gender       = '';
        $this->facebook     = '';
        $this->linkedin     = '';
        $this->twitter      = '';
        $this->position     = '';
        $this->userTeam     = '';
        $this->email        = '';
        $this->behance      = '';
        $this->state        = '';
        $this->country      = '';
        $this->details      = '';
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
        return view('livewire.admin.new-team-member');
    }
}
