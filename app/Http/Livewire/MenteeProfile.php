<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\UserDetail;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use Livewire\Component;

class MenteeProfile extends Component
{

    public $user;
    public $detail;
    public $about;
    public $education;
    public $educations;
    public $workExperience;
    public $tool;
    public $industry;
    public $language;
    public $neededExperience;
    public $personalInterest;


    public function mount($user){
        $this->user = $user;
        $this->fetchDetails();
        $this->fetchAbout();
        $this->fetchEducation();
        $this->fetchNeededExperience();
        $this->fetchWorkExperience();
        $this->fetchTool();
        $this->fetchIndustry();
        $this->fetchLanguage();
        $this->fetchInterest();
    }

    public function fetchDetails(){
        $this->detail = UserDetail::where('user_id', $this->user->id)->first();
    }

    public function fetchLanguage(){
        $this->language = Language::where('user_id', $this->user->id)->get();
    }

    public function fetchInterest(){
        $this->personalInterest = PersonalInterest::where('user_id', $this->user->id)->get();
    }

    public function fetchAbout(){
       $this->about = About::where('user_id', $this->user->id)->first();
    }

    public function fetchEducation(){
       $this ->education =  UserEducation::where('user_id', $this->user->id)->first();
        $this->educations =  UserEducation::orderBy('id', 'DESC')->where('user_id', $this->user->id)->get();
    }

    public function fetchWorkExperience(){
       $this->workExperience =  UserWorkExperience::where('user_id', $this->user->id)->get();
    }

    public function fetchTool(){
        $this->tool = FamiliarTool::where('user_id', $this->user->id)->get();
    }

    public function fetchIndustry(){
       $this->industry =  NeededIndustry::where('user_id', $this->user->id)->get();
    }

    public function fetchNeededExperience(){
        $this->neededExperience = NeededExperience::where('user_id', $this->user->id)->get();
    }


    public function render()
    {
        return view('livewire.mentee.mentee-profile');
    }
}
