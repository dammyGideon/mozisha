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

class MentorSidebar extends Component
{
    public $user;

    public $aprD_s;
    public $aprH_s;
    public $details_s;
    public $company_s;
    public $language_s;
    public $interest_s;
    public $about_s;

    public $percentage_profile;

    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    protected $listeners = ['refresh' => 'refresh'];

     public function refresh(){
         $this->aprD_s             = $this->apprenticeDuty();
         $this->aprH_s             = $this->apprenticeHelp();
         $this->details_s          = $this->details();
         $this->company_s          = $this->company();
         $this->language_s         = $this->language();
         $this->interest_s         = $this->interest();
         $this->about_s            = $this->about();
         $this->percentage_profile = ceil($this->calculatePercentProfile());
         $this->emitTo('new-apprenticeship', 'refresh');
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
       if(UserDetail::where('user_id', $this->user->id)->count() > 0){
           return  1;
        }
       return 0;
    }

    public function company(){
        if(CompanyInfo::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function apprenticeDuty(){
        if(ApprenticeDuty::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }

    public function apprenticeHelp(){
        if(ApprenticeHelp::where('user_id', $this->user->id)->count() > 0){
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

    public function about(){
        if(About::where('user_id', $this->user->id)->count() > 0){
            return 1;
        }
        return 0;
    }



    public function render()
    {
        return view('livewire.mentor.mentor-sidebar');
    }
}


