<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\CompanyInfo;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MenteeSidebar extends Component
{
    public $user;

    public $details_s;
    public $about_s;
    public $biography_s;
    public $image_s;
    public $education_s;
    public $workExperience_s;
    public $tool_s;
    public $industry_s;
    public $language_s;
    public $neededExperience_s;
    public $interest_s;


    public $percentage_profile;

    public function mount($user){
        $this->user = $user;
        $this->refresh();

    }
    protected $listeners = ['refresh' => 'refresh'];

    public function updated(){
        if (Session::has('sidebarRefresh')){ //Checks if there's session that requests refresh
            $this->refresh();
            //Unset sidebarRefresh session
            Session::forget('sidebarRefresh');
        }
    }

    public function refresh(){
        $this->details_s          = $this->details();
        $this->biography_s        = $this->biography();
        $this->image_s            = $this->image();
        $this->language_s         = $this->language();
        $this->interest_s         = $this->interest();
        $this->about_s            = $this->about();
        $this->education_s        = $this->education();
        $this->workExperience_s   = $this->workExperience();
        $this->tool_s             = $this->tool();
        $this->industry_s         = $this->industry();
        $this->neededExperience_s = $this->neededExperience();
        $this->percentage_profile = ceil($this->calculatePercentProfile());
    }

    public function calculatePercentProfile(){

        $this->details_s             = $this->details_s  * 10;
        $this->biography_s           = $this->biography_s * 10;
        $this->image_s               = $this->image_s * 10;
        $this->language_s            = $this->language_s * 10;
        $this->interest_s            = $this->interest_s * 10;
        $this->about_s               = $this->about_s    * 10;
        $this->education_s           = $this->education_s * 10;
        $this->workExperience_s      = $this->workExperience_s * 10;
        $this->tool_s                = $this->tool_s * 10;
        $this->industry_s            = $this->industry_s * 10;
        $this->neededExperience_s    = $this->neededExperience_s * 10;


        $total = $this->details_s + $this->biography_s + $this->image_s + $this->language_s + $this->interest_s + $this->about_s
            + $this->education_s + $this->workExperience_s + $this->tool_s + $this->industry_s
            + $this->neededExperience_s;
        $percentage = ($total / 110) * 100;

        return $percentage;

    }



    public function education(){
        if(UserEducation::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function workExperience(){
        if(UserWorkExperience::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function tool(){
        if(FamiliarTool::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function industry(){
        if(NeededIndustry::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function biography()
    {
        if(About::where('user_id', Auth::user()->id)->first()){
            if (About::where('user_id', Auth::user()->id)->first()->biography){
                return 1;
            }
            return 0;
        }
       return 0;
    }

    public function neededExperience(){
        if(NeededExperience::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }


    public function details(){
        if(UserDetail::where('user_id', $this->user->id)->first()->age){
            return 1;
        }
        return 0;
    }

    public function language(){
        if(Language::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function interest(){
        if(PersonalInterest::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function image()
    {
        if(User::find(Auth::user()->id)->profile_photo_path){
            return 1;
        }
        return 0;
    }


    public function about(){
        if(About::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }


    public function render()
    {
        return view('livewire.mentee.mentee-sidebar');
    }
}
