<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\Apprenticeship;
use App\Models\CompanyInfo;
use App\Models\Language;
use App\Models\PersonalInterest;
use App\Models\UserDetail;
use Livewire\Component;

class NewApprenticeship extends Component
{
    public $user;
    public $apprenticeships;
    public $title;
    public $start_date;
    public $end_date;
    public $details;
    public $apprentice_period;
    public $mentorship_period;
    public $company;
    public $helps;
    public $type;
    public $price;
    public $how;
    public $requirement;
    public $motivation;
    public $experience;


    public $aprD_c;
    public $aprH_c;
    public $details_c;
    public $company_c;
    public $language_c;
    public $interest_c;
    public $about_c;


    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    protected $listeners = ['refresh' => 'refresh'];

    public function refresh(){
        $this->fetchApprenticeships();
        $this->fetchCompany();
        $this->fetchApprenticeHelp();
        $this->aprD_c       = $this->apprenticeDuty();
        $this->aprH_c       = $this->apprenticeHelp();
        $this->details_c    = $this->details();
        $this->company_c    = $this->company();
        $this->language_c   = $this->language();
        $this->interest_c   = $this->interest();
        $this->about_c      = $this->about();
    }

    public function fetchCompany(){
        $this->company = CompanyInfo::where('user_id', $this->user->id)->first();
    }

    public function fetchApprenticeships(){
        $this->apprenticeships = ApprenticeDuty::where('user_id', $this->user->id)->get();
    }

    public function fetchApprenticeHelp(){
        $helps = ApprenticeHelp::where('user_id', $this->user->id)->get();
        foreach ($helps as $help){
            $help = ' '. $help .', ';
        }
       // $this->helps = $help;
    }

    public function updated($field){
        $this->validateOnly($field, [
            'title'                 => 'required|max:255',
            'start_date'            => 'required|max:255',
            'end_date'              => 'required|max:255',
            'price'                 => 'nullable|numeric|min:1|max:10000',
            'type'                  => 'required|max:255',
            'how'                   => 'required|max:2000',
            'requirement'           => 'required|max:6000',
            'motivation'            => 'required|max:6000',
            'experience'            => 'required|numeric|min:1|max:255',
            'details'               => 'required|max:2000',
            'mentorship_period'     => 'required|max:255',
            'apprentice_period'     => 'required|max:255',
        ]);

        //Set the value of price to vary depending on the type of apprenticeship posted
        if ($this->type == 'Free')
        {
            $this->price = null;
        }

    }

    public function newApprenticeship(){
        $this->validate([
            'title'                 => 'required|max:255',
            'start_date'            => 'required|max:255',
            'end_date'              => 'required|max:255',
            'price'                 => 'nullable|numeric|min:1|max:10000',
            'type'                  => 'required|max:255',
            'how'                   => 'required|max:2000',
            'requirement'           => 'required|max:6000',
            'motivation'            => 'required|max:6000',
            'experience'            => 'required|numeric|min:1|max:255',
            'details'               => 'required|max:2000',
            'mentorship_period'     => 'required|max:255',
            'apprentice_period'     => 'required|max:255',
        ]);

        //Check if the ending date is less than the starting date
        if (date(strtotime("$this->start_date")) > date(strtotime("$this->end_date"))){
            $this->emit('alert', ['type' => 'error', 'message' => 'The Program starting date should be less ending date!']);
            return;
        }

        //Check if user Already has this apprenticeship with same type posted.
        if(Apprenticeship::where(['user_id' => $this->user->id, 'title' => $this->title, 'type' => $this->type])->count()){
            $this->emit('alert', ['type' => 'info', 'message' => 'Apprenticeship already posted.']);
            return;
        }

        //Set the value of price to vary depending on the type of apprenticeship posted
        if ($this->type == 'Free')
        {
            $this->price = null;
        }

        Apprenticeship::create([
            'title'              => $this->title,
            'details'            => $this->details,
            'company'            => $this->company->name,
            'start_date'         => $this->start_date,
            'start_timestamp'    =>  date(strtotime("$this->start_date")),
            'end_date'           => $this->end_date,
            'end_timestamp'      =>  date(strtotime("$this->end_date")),
            'type'               => $this->type,
            'price'              => $this->price,
            'how'                => $this->how,
            'requirement'        => $this->requirement,
            'experience'         => $this->experience,
            'motivation'         => $this->motivation,
            'apprentice_period'  => $this->apprentice_period,
            'mentor_period'      => $this->mentorship_period,
            'apprentice_service' => 'Not needed',
            'mentor_name'        => $this->user->name,
            'user_id'            => $this->user->id,
        ]);
        $this->discard();
        $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship posted.']);
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

    public function discard(){
        $this->title                = '';
        $this->details              = '';
        $this->start_date           = '';
        $this->end_date             = '';
        $this->apprentice_period    = '';
        $this->mentorship_period    = '';
        $this->type                 = '';
        $this->price                = '';
        $this->how                  = '';
        $this->requirement          = '';
        $this->motivation           = '';
        $this->experience           = '';
    }

    public function render()
    {
        if($this->aprD_c < 1 || $this->aprH_c < 1 || $this->details_c < 1 ||
            $this->company_c < 1 || $this->language_c < 1 || $this->interest_c < 1 ||
            $this->about_c > 1
        ){
            return view('livewire.mentor.update-request');
        }else{
            return view('livewire.mentor.new-apprenticeship');
        }

    }
}
