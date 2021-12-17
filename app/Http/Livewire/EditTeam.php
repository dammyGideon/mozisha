<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\Team as MyTeam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTeam extends Component
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

    public $team;
    public $image;



    public $old_image;

    public function mount($team){
        $this->team = $team;
        $this->refresh();
    }


    public function updated($field){
        $this->validateOnly($field, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'image'      => 'nullable|image|max:1000',
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

    public function updateMember(){

        $this->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'image'      => 'nullable|image|max:1000',
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
        if($this->image){
            $this->deleteOldFile($this->team->image);
            $image = $this->storeFile();
        }else{
            $image = [
                'name' => $this->team->image,
            ];
        }
        $member = MyTeam::where('position', 'CEO')->first();
        if ($this->position == 'CEO' && $member && $member->id != $this->team->id){
            session()->flash('error', 'CEO already exist!.'); //displays a flash message
            return;
        }

        MyTeam::where('id', $this->team->id)->update([
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
        ]);

        $this->refresh(); // Clearing user inputs area
        session()->flash('message', 'Member updated successfully!.'); //displays a flash message

    }

    public function refresh(){
        $team = Team::find($this->team->id);
        $this->first_name   = $team->first_name;
        $this->last_name    = $team->last_name;
        $this->old_image    = $team->ImagePath;
        $this->gender       = $team->gender;
        $this->facebook     = $team->facebook;
        $this->linkedin     = $team->linkedin;
        $this->twitter      = $team->twitter;
        $this->position     = $team->position;
        $this->userTeam     = $team->team;
        $this->email        = $team->email;
        $this->behance      = $team->behance;
        $this->state        = $team->state;
        $this->country      = $team->country;
        $this->details      = $team->details;
    }


    public function storeFile()
    {

        $file =  $this->image;
        $original_filename = $file->getClientOriginalName();
        $filename = time() .Str::random(50).'_'.$original_filename;

        $file->storeAs('public', $filename); //stores the file in the public directory

        $fileData =
            [
                'name'          => $filename,
                'original_name' => $original_filename,
            ];

        return $fileData;
    }


    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }

    public function render()
    {
        return view('livewire.admin.edit-team');
    }
}
