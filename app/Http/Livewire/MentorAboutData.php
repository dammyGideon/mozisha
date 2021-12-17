<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use Livewire\Component;

class MentorAboutData extends Component
{


    public $user;
    public $biography;
    public $apprenticeship;
    public $help;


    //Live update tool
    // public $c_experiences;
    public $c_apprenticeships;
    public $c_helps;

    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function refresh(){
        $this->c_helps               = ApprenticeHelp::where('user_id',   $this->user->id)->get();
        $this->c_apprenticeships     = ApprenticeDuty::where('user_id',       $this->user->id)->get();
        $about                       = About::where('user_id',       $this->user->id)->first();

        //Fetch the biography data from the About model
        if($about) {$this->biography = $about->biography;}
    }

    public function updateAbout(){
        $this->validate([
            'biography'      => 'nullable|max:1000',
            'help'           => 'nullable|max:1000',
            'apprenticeship' => 'nullable|max:1000',
        ]);

        //Updating biography
        $this->updateBio();

        //Updating Industry
        $this->updateHelp();

        //Updating interest
        $this->updateApprenticeship();


        $this->refresh();
        $this->emitTo('mentor-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);

    }

    public function updated($field){
        $this->validateOnly($field, [
            'biography'      => 'nullable|max:1000',
            'help'           => 'nullable|max:255',
            'apprenticeship' => 'nullable|max:255',
        ]);
    }

    public function updateBio(){
        if (!empty($this->biography)) {
            $biography = About::where(['user_id' => $this->user->id])->get();
            if (count($biography) < 1) {
                About::create([
                    'user_id' => $this->user->id,
                    'biography' => $this->biography,
                ]);
            } else {
                About::where(['user_id' => $this->user->id])->update([
                    'biography' => $this->biography,
                ]);
            }
        }
    }

    public function updateHelp(){
        if (!empty($this->help)) {
            $help = ApprenticeHelp::where(['user_id' => $this->user->id, 'help' => $this->help])->get();
            if (count($help) < 1) {
                ApprenticeHelp::create([
                    'user_id' => $this->user->id,
                    'help' => $this->help,
                ]);
            }

//
//            else {
//                ApprenticeHelp::where(['user_id' => $this->user->id])->update([
//                    'help' => $this->help,
//                ]);
//            }
        }
    }

    public function updateApprenticeship(){
        if (!empty($this->apprenticeship)) {
            $apprenticeship = ApprenticeDuty::where(['user_id' => $this->user->id, 'duty' => $this->apprenticeship])->get();
            if ($apprenticeship->count() < 1) {
                ApprenticeDuty::create([
                    'user_id' => $this->user->id,
                    'duty' => $this->apprenticeship,
                ]);
            }
//            else {
//                ApprenticeDuty::where(['user_id' => $this->user->id])->update([
//                    'duty' => $this->apprenticeship,
//                ]);
//            }
        }
    }

    /*
     *
     *
     * Operational real time functions
     *
     *
     *
     */

    public function removeHelp($id){

        //Find if exist
        ApprenticeHelp::where(['id' => $id])->delete();

        $this->refresh();
        $this->emitTo('mentor-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Field removed successfully.']);

    }

    public function removeApprenticeship($id){

        //Find if exist
        ApprenticeDuty::where(['id' => $id])->delete();

        $this->refresh();
        $this->emitTo('mentor-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Apprenticeship removed successfully.']);

    }

    public function render()
    {
        return view('livewire.mentor.mentor-about-data');
    }
}
