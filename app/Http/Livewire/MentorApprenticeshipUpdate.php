<?php

namespace App\Http\Livewire;

use App\Models\Apprenticeship;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MentorApprenticeshipUpdate extends Component
{
    public $user;
    public $company;
    public $apprenticeships;
    public $title;
    public $start_date;
    public $end_date;
    public $details;
    public $apprentice_period;
    public $mentorship_period;
    public $helps;
    public $type;
    public $price;
    public $how;
    public $requirement;
    public $motivation;
    public $experience;
    public $status;

    public $app;
    public function mount()
    {
        $this->app = Session::get('update_app');
        $this->refresh($this->app);
        $this->fetchCompany();
    }

    public function refresh($app)
    {
        $this->title = $app->title;
        $this->start_date = $app->start_date;
        $this->end_date = $app->end_date;
        $this->details = $app->details;
        $this->apprentice_period = $app->apprentice_period;
        $this->mentorship_period = $app->mentorship_period;
        $this->company  = $app->company;
        $this->helps = $app->helps;
        $this->type = $app->type;
        $this->price = $app->price;
        $this->how           = $app->how;
        $this->requirement   = $app->requirement;
        $this->motivation    = $app->motivation;
        $this->experience    = $app->experience;
        $this->status        = $app->status;
    }

    public function updated($field){
        $this->validateOnly($field, [
            'title'                 => 'required|max:255',
            'start_date'            => 'required|max:255',
            'end_date'              => 'required|max:255',
            'price'                 => 'nullable|numeric|min:1|max:10000',
            'type'                  => 'required|max:255',
            'status'                => 'required|max:255',
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

    public function fetchCompany(){
        $this->company = CompanyInfo::where('user_id', Auth::user()->id)->first();
    }

    public function update()
    {
        $this->validate([
            'title'                 => 'required|max:255',
            'start_date'            => 'required|max:255',
            'end_date'              => 'required|max:255',
            'price'                 => 'nullable|numeric|min:1|max:10000',
            'type'                  => 'required|max:255',
            'how'                   => 'required|max:2000',
            'status'                => 'required|max:255',
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
        if(Apprenticeship::where([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'type' => $this->type,
            ['id', '!=', $this->app->id]
        ])->count()){
            $this->emit('alert', ['type' => 'info', 'message' => 'Apprenticeship type already posted.']);
            return;
        }

        //Set the value of price to vary depending on the type of apprenticeship posted
        if ($this->type == 'Free')
        {
            $this->price = null;
        }

        Apprenticeship::where('id', $this->app->id)->update([
            'details'            => $this->details,
            'company'            => $this->company->name,
            'start_date'         => $this->start_date,
            'start_timestamp'    =>  date(strtotime("$this->start_date")),
            'end_date'           => $this->end_date,
            'end_timestamp'      =>  date(strtotime("$this->end_date")),
            'type'               => $this->type,
            'price'              => $this->price,
            'how'                => $this->how,
            'status'             => $this->status,
            'requirement'        => $this->requirement,
            'experience'         => $this->experience,
            'motivation'         => $this->motivation,
            'apprentice_period'  => $this->apprentice_period,
            'mentor_period'      => $this->mentorship_period,
            'apprentice_service' => 'Not needed',
            'mentor_name'        => Auth::user()->name,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship updated.']);
    }

    public function render()
    {
        return view('livewire.mentor.mentor-apprenticeship-update');
    }
}
