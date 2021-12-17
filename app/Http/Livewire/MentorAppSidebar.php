<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\CompanyInfo;
use App\Models\Language;
use App\Models\PersonalInterest;
use App\Models\UserDetail;
use Livewire\Component;

class MentorAppSidebar extends Component
{
    public $user;
    public $aprD_c;
    public $aprH_c;
    public $details_c;
    public $company_c;
    public $language_c;
    public $interest_c;
    public $about_c;


    public $aprD_s;
    public $aprH_s;
    public $details_s;
    public $company_s;
    public $language_s;
    public $interest_s;
    public $about_s;
    public $conn;


    public $percentage_profile;

    public function mount($conn){
        $this->user = $conn->mentee;
        $this->conn = $conn;
        $this->aprD_s             = $this->apprenticeDuty();
        $this->aprH_s             = $this->apprenticeHelp();
        $this->details_s          = $this->details();
        $this->company_s          = $this->company();
        $this->language_s         = $this->language();
        $this->interest_s         = $this->interest();
        $this->about_s            = $this->about();
        $this->percentage_profile = ceil($this->calculatePercentProfile());

    }

    public function calculatePercentProfile(){
        $this->aprH_s     = $this->aprH_s     * 10;
        $this->aprD_s     = $this->aprD_s     * 10;
        $this->details_s  = $this->details_s  * 10;
        $this->company_s  = $this->company_s  * 10;
        $this->language_s = $this->language_s * 10;
        $this->interest_s = $this->interest_s * 10;
        $this->about_s    = $this->about_s    * 10;

        $total = $this->aprH_s + $this->aprD_s + $this->details_s +
            $this->company_s + $this->language_s + $this->interest_s + $this->about_s;
        $percentage = ($total / 70) * 100;

        return $percentage;

    }




    public function details(){
        return  UserDetail::where('user_id', $this->user->id)->count();
    }

    public function company(){
        return CompanyInfo::where('user_id', $this->user->id)->count();
    }

    public function apprenticeDuty(){
        return ApprenticeDuty::where('user_id', $this->user->id)->count();
    }

    public function apprenticeHelp(){
        return ApprenticeHelp::where('user_id', $this->user->id)->count();
    }

    public function language(){
        return Language::where('user_id', $this->user->id)->count();
    }

    public function interest(){
        return PersonalInterest::where('user_id', $this->user->id)->count();
    }

    public function about(){
        return About::where('user_id', $this->user->id)->count();
    }



    public function render()
    {
        return view('livewire.mentor.app.mentor-app-sidebar');
    }
}
