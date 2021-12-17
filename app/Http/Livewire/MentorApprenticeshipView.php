<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppRequestEmail;
use App\Mail\MentorAppRequestEmail;
use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\CompanyInfo;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalAccomplishment as MyAccomplishment;
use App\Models\PersonalInterest;
use App\Models\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserEducation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MentorApprenticeshipView extends Component
{
    public $app;
    public $user;
    public $details;
    public $company;
    public $appDuty;
    public $appHelp;
    public $language;
    public $interest;
    public $about;
    public $accomp;
    public $phone;

    public $app_user;
    public $status;

    public $profileStatus;


    public function mount($user, $app){
        $this->user = $user;
        $this->app  = $app;
        $this->app_user = User::find($app->user_id);
        $this->phone    = UserDetail::where('user_id', $app->user_id)->first()->phone;

        $this->details();
        $this->company();
        $this->apprenticeDuty();
        $this->apprenticeHelp();
        $this->language();
        $this->language();
        $this->interest();
        $this->about();
        $this->accomplishments();

        //Fetch if application has already been submitted
        $this->status = Request::where(['mentee_id' => Auth::user()->id, 'apprenticeship_id' => $this->app->id])->count();
    }

    public function details(){
        $this ->details =  UserDetail::where('user_id', $this->app_user->id)->first();
    }

    public function company(){
        $this->company = CompanyInfo::where('user_id', $this->app_user->id)->first();
    }

    public function apprenticeDuty(){
        $this->appDuty = ApprenticeDuty::where('user_id', $this->app_user->id)->get();
    }

    public function apprenticeHelp(){
        $this->appHelp = ApprenticeHelp::where('user_id', $this->app_user->id)->get();
    }

    public function language(){
        $this->language =  Language::where('user_id', $this->app_user->id)->get();
    }

    public function interest(){
        $this->interest =  PersonalInterest::where('user_id', $this->app_user->id)->get();
    }

    public function about(){
        $this->about = About::where('user_id', $this->app_user->id)->first();
    }

    public function accomplishments(){
        $this->accomp = MyAccomplishment::where('user_id', $this->app_user->id)->get();
    }



    public function render()
    {
        return view('livewire.mentor.mentor-apprenticeship-view');
    }
}
