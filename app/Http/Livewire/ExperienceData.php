<?php

namespace App\Http\Livewire;

use App\Models\UserWorkExperience;
use Livewire\Component;

class ExperienceData extends Component
{
    public $user;
    public $title;
    public $type;
    public $company;
    public $location;
    public $description;
    public $start_month;
    public $start_year;
    public $end_month;
    public $end_year;
    public $status;
    public $experiences;



    public $new_title;
    public $new_type;
    public $new_company;
    public $new_location;
    public $new_description;
    public $new_start_month;
    public $new_start_year;
    public $new_end_month;
    public $new_end_year;
    public $new_status;
    public $new_experiences;
    public $experience_id;

    public $showNewForm  = true;
    public $showEditForm = false;




    public function editData($id){
        $this->showNewForm  = false;
        $this->showEditForm = true;

        //Fetch form data
        $experience = UserWorkExperience::where('id', $id)->first();
        $this->new_title         = $experience->title;
        $this->new_type          = $experience->type;
        $this->new_company       = $experience->company;
        $this->new_location      = $experience->location;
        $this->new_description   = $experience->description;
        $this->new_start_month   = $experience->start_month;
        $this->new_start_year    = $experience->start_year;
        $this->new_end_month     = $experience->end_month;
        $this->new_end_year      = $experience->end_year;
        $this->experience_id     = $experience->id;
        $this->status            = $experience->status;


        $this->emit('alert', ['type' => 'info', 'message' => 'Edit form now available.']);
    }


    public function updateInfo($id){
        $this->validate([
            'new_title'        => 'required|max:255',
            'new_type'         => 'required|max:255',
            'new_company'      => 'required|max:255',
            'new_location'     => 'required|max:255',
            'new_description'  => 'required|max:1000',
            'new_start_month'  => 'required|max:255',
            'new_start_year'   => 'required|max:255',
            'new_end_month'    => 'required|max:255',
            'new_end_year'     => 'required|max:255',
        ]);



        UserWorkExperience::where('id', $id)->update([
            'user_id'     => $this->user->id,
            'title'       => $this->new_title,
            'type'        => $this->new_type,
            'company'     => $this->new_company,
            'location'    => $this->new_location,
            'description' => $this->new_description,
            'start_month' => $this->new_start_month,
            'start_year'  => $this->new_start_year,
            'end_month'   => $this->new_end_month,
            'end_year'    => $this->new_end_year,
            'status'      => $this->new_status,
        ]);

        $this->refresh();
        $this->newData();
        $this->emitTo('mentee-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);


    }

    public function newData(){
        $this->showNewForm  = true;
        $this->showEditForm = false;
    }



    public function updated($field){
        $this->validateOnly($field, [
            'title'        => 'required|max:255',
            'type'         => 'required|max:255',
            'company'      => 'required|max:255',
            'location'     => 'required|max:255',
            'description'  => 'required|max:1000',
            'start_month'  => 'required|max:255',
            'start_year'   => 'required|max:255',
            'end_month'    => 'required|max:255',
            'end_year'     => 'required|max:255',
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'title'        => 'required|max:255',
            'type'         => 'required|max:255',
            'company'      => 'required|max:255',
            'location'     => 'required|max:255',
            'description'  => 'required|max:1000',
            'start_month'  => 'required|max:255',
            'start_year'   => 'required|max:255',
            'end_month'    => 'required|max:255',
            'end_year'     => 'required|max:255',
        ]);

        UserWorkExperience::create([
           'user_id' => $this->user->id,
            'title'  => $this->title,
            'type'   => $this->type,
            'company' => $this->company,
            'location' => $this->location,
            'description' => $this->description,
            'start_month' => $this->start_month,
            'start_year' => $this->start_year,
            'end_month'   => $this->end_month,
            'end_year'    => $this->end_year,
            'status'      => $this->status,
        ]);

        $this->emitTo('mentee-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
    }


    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function refresh(){
        $experiences = UserWorkExperience::where('user_id', $this->user->id)->get();
        if($experiences->count() > 0){
            $this->experiences = $experiences;
        }
    }


    public function render()
    {
        return view('livewire.mentee.experience-data');
    }
}
