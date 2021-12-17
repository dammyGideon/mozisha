<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\Language;
use App\Models\CompanyInfo;
use App\Models\PersonalInterest;
use App\Models\UserDetail;
use Livewire\Component;

class CompanyProfile extends Component
{
    public $user;
    public $detail;
    public $about;
    public $education;
    public $duty;
    public $tool;
    public $industry;
    public $language;
    public $help;
    public $company;
    public $personalInterest;


    public function mount($user){
        $this->user = $user;
        $this->fetchDetails();
        $this->fetchAbout();
        $this->fetchApprenticeDuty();
        $this->fetchApprenticeHelp();
        $this->fetchLanguage();
        $this->fetchInterest();
        $this->fetchCompany();
    }

    public function fetchDetails(){
        $this->detail = UserDetail::where('user_id', $this->user->id)->first();
    }

    public function fetchCompany(){
        $this->company = CompanyInfo::where('user_id', $this->user->id)->first();
    }

    public function fetchApprenticeDuty(){
        $this->duty = ApprenticeDuty::where('user_id', $this->user->id)->get();
    }

    public function fetchApprenticeHelp(){
        $this->help = ApprenticeHelp::where('user_id', $this->user->id)->get();
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
























    public function render()
    {
        return view('livewire.mentor.company-profile');
    }
}
