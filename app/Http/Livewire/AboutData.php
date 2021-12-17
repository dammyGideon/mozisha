<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\FamiliarTool;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\PersonlInterest;
use App\Models\UserWorkExperience;
use Livewire\Component;

class AboutData extends Component
{
    public $user;
    public $biography;
    public $experience; //drop down
    public $industry; //drop down
    public $interest;
    public $tool; //drop down
    public $preferred_skill; //drop down
    public $less_preferred_skill; //drop down
    public $expertise_in_preferred_skill; //drop down
    public $expertise_in_less_preferred_skill; //drop down


    //Live update tool
   // public $c_experiences;
    public $c_industries;
    public $c_interests;
    public $c_tools;
    public $c_neededExperiences;


    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function refresh(){
        $this->c_interests          = PersonalInterest::where('user_id',   $this->user->id)->get();
        //$this->c_experiences        = UserWorkExperience::where('user_id', $this->user->id)->get();
        $this->c_tools              = FamiliarTool::where('user_id',       $this->user->id)->get();
        $this->c_neededExperiences  = NeededExperience::where('user_id',   $this->user->id)->get();
        $this->c_industries         = NeededIndustry::where('user_id',     $this->user->id)->get();
//        $biography = About::where('user_id', $this->user->id)->count();
//        if($biography > 0){
//           $this->biography =  About::where('user_id', $this->user->id)->first()->biography;
//        }
    }

    public function updateAbout(){
        $this->validate([
            'biography' => 'nullable|max:1000',
            'interest' => 'nullable|max:255',
        ]);

        //Updating biography
        $this->updateBio();

        //Updating experience
        $this->updateExperience();

        //Updating Industry
        $this->updateIndustry();

        //Updating interest
        $this->updateInterest();

        //Updating tools
        $this->updateTool();

        $this->refresh();

        $this->tool = '';
        $this->emitTo('mentee-sidebar', 'refresh');

        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);

    }

    public function updated($field){
        $this->validateOnly($field, [
           'biography' => 'nullable|max:1000',
           'interest' => 'nullable|max:255',
        ]);
    }

    public function updateBio(){
        if (!empty($this->biography)) {
            $biography = About::where(['user_id' => $this->user->id])->get();
            if (count($biography) < 1) {
                About::create([
                    'user_id' => $this->user->id,
		    'preferred_skill' => $this->preferred_skill,
                    'less_preferred_skill' => $this->less_preferred_skill,
                    'expertise_in_preferred_skill' => $this->expertise_in_preferred_skill,
                    'expertise_in_less_preferred_skill' => $this->expertise_in_less_preferred_skill,
                ]);
            } else {
                About::where(['user_id' => $this->user->id])->update([
		    'preferred_skill' => $this->preferred_skill,
                    'less_preferred_skill' => $this->less_preferred_skill,
                    'expertise_in_preferred_skill' => $this->expertise_in_preferred_skill,
                    'expertise_in_less_preferred_skill' => $this->expertise_in_less_preferred_skill,
                ]);
            }
        }
    }

    public function updateExperience(){
        if (!empty($this->experience)) {
            $experience = NeededExperience::where(['user_id' => $this->user->id, 'experience' => $this->experience])->get();
            if (count($experience) < 1) {
                NeededExperience::create([
                    'user_id' => $this->user->id,
                    'experience' => $this->experience,
                ]);
            }
//            else {
//                NeededExperience::where(['user_id' => $this->user->id])->update([
//                    'experience' => $this->experience,
//                ]);
//            }
        }
    }

    public function updateIndustry(){
        if (!empty($this->industry)) {
            $industry = NeededIndustry::where(['user_id' => $this->user->id, 'industry' => $this->industry])->get();
            if (count($industry) < 1) {
                NeededIndustry::create([
                    'user_id' => $this->user->id,
                    'industry' => $this->industry,
                ]);
            }
//            else {
//                NeededIndustry::where(['user_id' => $this->user->id])->update([
//                    'industry' => $this->industry,
//                ]);
//            }
        }
    }

    public function updateInterest(){
        if (!empty($this->interest)) {
            $interest = PersonalInterest::where(['user_id' => $this->user->id, 'interest' => $this->interest])->get();
            if ($interest->count() < 1) {
                PersonalInterest::create([
                    'user_id' => $this->user->id,
                    'interest' => $this->interest,
                ]);
            }
//            else {
//                PersonalInterest::where(['user_id' => $this->user->id])->update([
//                    'interest' => $this->interest,
//                ]);
//            }
        }
    }

    public function updateTool(){
        if (!empty($this->tool)) {
            $tool = FamiliarTool::where(['user_id' => $this->user->id, 'tool' => $this->tool])->get();
            if (count($tool) < 1) {
                FamiliarTool::create([
                    'user_id' => $this->user->id,
                    'tool'    => $this->tool,
                ]);
            }
//            else {
//                FamiliarTool::where(['user_id' => $this->user->id])->update([
//                    'tool' => $this->tool,
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




    public function removeExperience($id){

        //Find if exist
        NeededExperience::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Experience removed successfully.']);

    }

    public function removeIndustry($id){

        //Find if exist
        NeededIndustry::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Industry removed successfully.']);

    }


    public function removeInterest($id){

        //Find if exist
        PersonalInterest::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Interest removed successfully.']);

    }

    public function removeTool($id){

        //Find if exist
        FamiliarTool::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Tool removed successfully.']);

    }


    public function render()
    {
        return view('livewire.mentee.about-data');
    }
}
