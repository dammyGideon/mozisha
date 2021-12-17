<?php

namespace App\Http\Livewire;

use App\Models\UserEducation;
use Livewire\Component;

class OtherData extends Component
{
    public $user;
    public $school;
    public $degree;
    public $course;
    public $start_year;
    public $end_year;
    public $educations;
    public $showNewForm  = true;
    public $showEditForm = false;

    public $education_id;
    public $new_school;
    public $new_degree;
    public $new_course;
    public $new_start_year;
    public $new_end_year;

    public function editData($id){
        $this->showNewForm  = false;
        $this->showEditForm = true;

        //Fetch form data
        $education = UserEducation::where('id', $id)->first();
        $this->new_school     = $education->school;
        $this->new_degree     = $education->degree;
        $this->new_course     = $education->course;
        $this->new_start_year = $education->start_year;
        $this->new_end_year   = $education->end_year;
        $this->education_id   = $education->id;

        $this->emit('alert', ['type' => 'info', 'message' => 'Edit form now available.']);
    }

    public function newData(){
        $this->showNewForm  = true;
        $this->showEditForm = false;
    }

    public function updateData($id){
        $this->validate([
            'new_school'     => 'required|max:255',
            'new_degree'     => 'required|max:255',
            'new_course'     => 'required|max:255',
            'new_start_year' => 'required',
            'new_end_year'   => 'required',
        ]);
        UserEducation::where('id', $id)->update([
            'school'     => $this->new_school,
            'degree'     => $this->new_degree,
            'course'     => $this->new_course,
            'start_year' => $this->new_start_year,
            'end_year'   => $this->new_end_year,
        ]);
        $this->refresh();
        $this->newData();
        $this->emitTo('mentee-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
    }

    public function updated($field){
        $this->validateOnly($field, [
           'school'     => 'required|max:255',
           'degree'     => 'required|max:255',
           'course'     => 'required|max:255',
           'start_year' => 'required',
           'end_year'   => 'required',
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'school'     => 'required|max:255',
            'degree'     => 'required|max:255',
            'course'     => 'required|max:255',
            'start_year' => 'required',
            'end_year'   => 'required',
        ]);
        UserEducation::create([
           'user_id'    => $this->user->id,
           'school'     => $this->school,
           'degree'     => $this->degree,
           'course'     => $this->course,
           'start_year' => $this->start_year,
           'end_year'   => $this->end_year,
        ]);
        $this->discard();
        $this->refresh();
        $this->emitTo('mentee-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);

    }

    public function discard(){
        $this->school      = '';
        $this->degree      = '';
        $this->course      = '';
        $this->end_year    = '';
        $this->start_year  = '';
    }

    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function refresh(){
        $educations = UserEducation::where('user_id', $this->user->id)->get();
        if($educations->count() > 0){
            $this->educations = $educations;
        }
    }

    public function render()
    {
        return view('livewire.mentee.other-data');
    }
}
